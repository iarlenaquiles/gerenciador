<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administradorcontroller extends CI_Controller {

    // Função que verifica a sessão
    public function Session_funcionario(){
        if($this->session->userdata('logado') == false){
            redirect('siteController/AreaFuncionario/5');
        }
    }

    // Função de chamada da página principal.
    public function index(){
        $this->Session_funcionario();
        $this->load->view('administrador/includes/header'); // chamada do topo da página.
        $this->load->view('administrador/includes/menu'); // chamada do menu.
        $this->load->view('administrador/administrador'); // chamada da página principal.
        $this->load->view('administrador/includes/footer'); // chamada do rodapé da página.

    }

    public function AtuDados($id=null){
        $this->Session_funcionario();
        $this->load->model('administradorModel','usuario');
        $this->load->model('administradorModel','dinamic');
        $data['atualiza'] = $this->usuario->AtuDados($id);
        $data['nivelAcesso'] = $this->dinamic->dinamicSelect();
        $data['usuario'][0]->idUsuario;
        $data['usuario'][0]->nomeUsuario;

        $this->session->set_userdata($dados);

        $this->load->view('administrador/configuracao/includes/header');
       // $this->load->view('administrador/configuracao/includes/menu');
        $this->load->view('administrador/configuracao/atualizaDados',$data);
        $this->load->view('administrador/configuracao/includes/footer');
    }

    public function AtualizarDados(){
        $this->Session_funcionario();
        
    }

    public function AtualizaSenha(){
        $this->Session_funcionario();
        $this->load->view('administrador/configuracao/includes/header');
        $this->load->view('administrador/configuracao/includes/menu');
        $this->load->view('administrador/configuracao/atualizaSenha');
        $this->load->view('administrador/configuracao/includes/footer');
    }

    // Função de chamada da página Usuário
    public function usuario($indice=null){
        $this->Session_funcionario();
        $this->load->model('administradorModel','usuario');
        $this->load->model('administradorModel','usuario');    

        $config = array(
            "base_url" => base_url('usuario/p'),
            "per_page" => 3,
            "num_links" => 3,
            "uri_segment" => 3,
            "total_rows" => $this->usuario->CountUsuario(),
            "full_tag_open" => "<ul class='pagination pull-right'>",
            "full_tag_close" => "</ul>",
            "first_link" => FALSE,
            "last_link" => FALSE,
            "first_tag_open" => "<li>",
            "first_tag_close" => "</li>",
            "prev_link" => "Anterior",
            "prev_tag_open" => "<li class='prev'>",
            "prev_tag_close" => "</li>",
            "next_link" => "Próximo",
            "next_tag_open" => "<li class='next'>",
            "next_tag_close" => "</li>",
            "last_tag_open" => "<li>",
            "last_tag_close" => "</li>",
            "cur_tag_open" => "<li class='active'><a href='#'>",
            "cur_tag_close" => "</a></li>",
            "num_tag_open" => "<li>",
            "num_tag_close" => "</li>"
        );

        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        $offset = ($this->uri->segment(3))?$this->uri->segment(3):0;

        $data['usuario'] = $this->usuario->listaUsuario();
        $data['usuario'] = $this->usuario->getUsuarios('nomeUsuario','ASC',$config['per_page'],$offset);

        $this->load->view('administrador/includes/header'); // chamada do topo da página.
        $this->load->view('administrador/includes/menu'); // chamada do menu.
        if($indice == 1){
            $msg['msg'] = "Usuário cadastrado com sucesso!";
            $this->load->view('administrador/msg/msg_success',$msg);
        }else if($indice == 2){
            $msg['msg'] = "Usuário não cadastrado. Desculpe, entre em contato com o administrador do sistema!";
            $this->load->view('administrador/msg/msg_erro',$msg);
        }else if($indice == 3){
            $msg['msg'] = "Usuário inativado com sucesso!";
            $this->load->view('administrador/msg/msg_success',$msg);
        }else if($indice == 4){
            $msg['msg'] = "Usuário não inativado. Desculpe, entre em contato com o administrado do sistema!";
            $this->load->view('administrador/msg/msg_erro',$msg);
        }else if($indice == 5){
            $msg['msg']= "Usuário Ativo com Sucesso!";
            $this->load->view('administrador/msg/msg_success',$msg);
        }else if($indice == 6){
            $msg['msg'] = "Usuário não ativo. Desculpe, entre em contato com o administrador do sistema!";
            $this->load->view('administrador/msg/msg_erro',$msg);
        }
        $this->load->view('administrador/usuarios/usuarios',$data); // chamada da página de Usuários.
        $this->load->view('administrador/includes/footer'); // chamada do rodapé da página.
    
    }

    // Função de chamada da página de Novo Usuário
    public function novoUsuario(){
        $this->Session_funcionario();
        $this->load->model('administradorModel','dinamic');
        $data['nivelAcesso'] = $this->dinamic->dinamicSelect();

        $this->load->view('administrador/includes/header');
        $this->load->view('administrador/includes/menu');
        $this->load->view('administrador/usuarios/novoUsuario',$data);
        $this->load->view('administrador/includes/footer');

    }

    // Função que chama a model, para salvar o usuario no banco de dados.
    public function salvaUsuario(){
        $this->Session_funcionario();
        $this->load->model('administradorModel','usuario');

        if($this->usuario->insereUsuario()){
            redirect('administradorController/usuario/1');
        }else{
            redirect('administradorController/usuario/2');
        }
    }

    // Função de inativar o usuário
    public function inatUsuario($id=null){
        $this->Session_funcionario();
        $this->load->model('administradorModel','usuario');

        if($this->usuario->inatUsuario($id)){
            redirect('administradorController/usuario/3');
        }else{
            redirect('administradorController/usuario/4');
        }
    }

    // Função de ativar o usuário
    public function atiUsuario($id=null){
        $this->Session_funcionario();
        $this->load->model('administradorModel','usuario');
        
        if($this->usuario->atiUsuario($id)){
            redirect('administradorController/usuario/5');
        }else{
            redirect('administradorController/usuario/6');
        }
    }

    // Função de logout do administrador
    public function LogoutUsuario(){
        $this->load->model('loginModel','usuarios');

        if($this->usuarios->LogoutUsuario()){
            redirect('siteController/AreaFuncionario/4');
        }
    }

    // Função de chamada da interface(view) de listagem de Clientes
    public function clientes($indice=null){
        $this->Session_funcionario();
        $this->load->model('administradorModel','cliente');
        $this->load->model('administradorModel','cliente');
        
        $config = array(
           "base_url" => base_url('clientes/p'),
           "per_page" => 3,
           "num_links" => 3,
           "uri_segment" => 3,
           "total_rows" => $this->cliente->CountCliente(),
           "full_tag_open" => "<ul class='pagination pull-right'>",
           "full_tag_close" => "</ul>",
           "first_link" => FALSE,
           "last_link" => FALSE,
           "first_tag_open" => "<li>",
           "first_tag_close" => "</li>",
           "prev_link" => "Anterior",
           "prev_tag_open" => "<li class='prev'>",
           "prev_tag_close" => "</li>",
           "next_link" => "Próximo",
           "next_tag_open" => "<li class='next'>",
           "next_tag_close" => "</li>",
           "last_tag_open" => "<li>",
           "last_tag_close" => "</li>",
           "cur_tag_open" => "<li class='active'><a href='#'>",
           "cur_tag_close" => "</a></li>",
           "num_tag_open" => "<li>",
           "num_tag_close" => "</li>"
        );
            
        $this->pagination->initialize($config);
            
        $data['pagination'] = $this->pagination->create_links();
            
        $offset = ($this->uri->segment(3))?$this->uri->segment(3):0;
        
        $data['cliente'] = $this->cliente->listaClientes();
        $data['cliente'] = $this->cliente->getCliente('nomeCliente','ASC',$config['per_page'],$offset);

        $this->load->view('administrador/includes/header');
        $this->load->view('administrador/includes/menu');
        if($indice == 1){
            $msg['msg'] = "Cliente Cadastrado com Sucesso!";
            $this->load->view('administrador/msg/msg_success',$msg);
        }else if($indice == 2){
            $msg['msg'] = "Cliente não Cadastrado, Desculpe!";
            $this->load->view('administrador/msg/msg_erro',$msg);
        }else if($indice == 3){
            $msg['msg'] = "Cliente desativado com sucesso!";
            $this->load->view('administrador/msg/msg_success',$msg);
        }else if($indice == 4){
            $msg['msg'] = "Cliente não desativado!";
            $this->load->view('administrador/msg/msg_erro',$msg);
        }else if($indice == 5){
            $msg['msg'] = "Cliente ativado com Sucesso!";
            $this->load->view('administrador/msg/msg_success',$msg);    
        }else if($indice == 6){
            $msg['msg'] = "Cliente não ativado, entre em contato com o administrador do sistema!";
            $this->load->view('administrador/msg/msg_erro',$msg);
        }else if($indice == 7){
            $msg['msg'] = "Cliente atualizado com sucesso!";
            $this->load->view('administrador/msg/msg_success',$msg);
        }else if($indice == 8){
            $msg['msg'] = "Cliente não atualizado, favor tente novamente!";
            $this->load->view('administrador/msg/msg_erro',$msg);
        }
        $this->load->view('administrador/clientes/list-clientes',$data);
        $this->load->view('administrador/includes/footer');
    }

    // Função de inativar o cliente
    public function inativaCliente($id=null){
        $this->Session_funcionario();
        $this->load->model('administradorModel','cliente');

        if($this->cliente->inativaCliente($id)){
            redirect('clientes/3');
        }else{
            redirect('clientes/4');
        }
    }

    // Função de ativar o cliente
    public function atiCliente($id=null){
        $this->Session_funcionario();
        $this->load->model('administradorModel','cliente');

        if($this->cliente->atiCliente($id)){
            redirect('clientes/5');
        }else{
            redirect('clientes/6');
        }
    }

    // Função de chamada da interface(view) de cadastro de um novo cliente.
    public function novoCliente(){
        $this->Session_funcionario();
        $this->load->view('administrador/includes/header');
        $this->load->view('administrador/includes/menu');
        $this->load->view('administrador/clientes/novoCliente');
        $this->load->view('administrador/includes/footer');

    }

    // Função que chama o model de inserção do cliente
    public function insereCliente(){
        $this->Session_funcionario();
        $this->load->model('administradorModel','novoCliente');

        if($this->novoCliente->insereCliente()){
            redirect('clientes/1');
        }else{
            redirect('clientes/2');
        }
    }

    // Função de chamada da view pra tela de atualizar cliente
    public function atualizaCliente($id=null){
        $this->Session_funcionario();
        $this->load->model('administradorModel','atCliente');
        $data['cliente'] = $this->atCliente->atCliente($id);

        // Carrega as views
        $this->load->view('administrador/includes/header');
        $this->load->view('administrador/includes/menu');
        $this->load->view('administrador/clientes/atualizaCliente',$data);
        $this->load->view('administrador/includes/footer');
    }

    // Função de atualizar o cliente
    public function atCliente($id=null){
        $this->Session_funcionario();
        $this->load->model('administradorModel','atCliente');
        
        if($this->atCliente->atualizaCliente($id)){
            redirect('clientes/7');
        }else{
            redirect('clientes/8');
        }
    }

    // Função de chamada da página de Fornecedores
    public function fornecedores($indice=null){
        $this->Session_funcionario();
        $this->load->model('administradorModel','fornecedor');
        $this->load->model('administradorModel','fornecedor');
        
        $config = array(
           "base_url" => base_url('fornecedores/p'),
           "per_page" => 3,
           "num_links" => 3,
           "uri_segment" => 3,
           "total_rows" => $this->fornecedor->CountFornecedor(),
           "full_tag_open" => "<ul class='pagination pull-right'>",
           "full_tag_close" => "</ul>",
           "first_link" => FALSE,
           "last_link" => FALSE,
           "first_tag_open" => "<li>",
           "first_tag_close" => "</li>",
           "prev_link" => "Anterior",
           "prev_tag_open" => "<li class='prev'>",
           "prev_tag_close" => "</li>",
           "next_link" => "Próximo",
           "next_tag_open" => "<li class='next'>",
           "next_tag_close" => "</li>",
           "last_tag_open" => "<li>",
           "last_tag_close" => "</li>",
           "cur_tag_open" => "<li class='active'><a href='#'>",
           "cur_tag_close" => "</a></li>",
           "num_tag_open" => "<li>",
           "num_tag_close" => "</li>"
        );
            
        $this->pagination->initialize($config);
            
        $data['pagination'] = $this->pagination->create_links();
            
        $offset = ($this->uri->segment(3))?$this->uri->segment(3):0;
        
        $data['fornecedor'] = $this->fornecedor->ListaFornecedores();
        $data['fornecedor'] = $this->fornecedor->getFornecedor('nomeFantasia','ASC',$config['per_page'],$offset);

        $this->load->view('administrador/includes/header');
        $this->load->view('administrador/includes/menu');
        if($indice == 1){
            $msg['msg'] = "Fornecedor cadastrado com sucesso!";
            $this->load->view('administrador/msg/msg_success',$msg);
        }else if($indice == 2){
            $msg['msg'] = "Fornecedor não cadastrado. Desculpe, entre em contato com o administrador do sistema!";
            $this->load->view('administrador/msg/msg_erro',$msg);
        }else if($indice == 3){
            $msg['msg'] = "Fornecedor Atualizado com Sucesso!";
            $this->load->view('administrador/msg/msg_success',$msg);
        }else if($indice == 4){
            $msg['msg'] = "Fornecedor não atualizado, favor tente novamente!";
            $this->load->view('administrador/msg/msg_erro',$msg);
        }else if($indice == 5){
            $msg['msg'] = "Fornecedor inativado com sucesso!";
            $this->load->view('administrador/msg/msg_success',$msg);
        }else if($indice == 6){
            $msg['msg'] = "Ops.. Fornecedor não inativado!";
            $this->load->view('administrador/msg/msg_erro',$msg);
        }else if($indice == 7){
            $msg['msg'] = "Fornecedor ativado com sucesso!";
            $this->load->view('administrador/msg/msg_success',$msg);
        }else if($indice == 8){
            $msg['msg'] = "Ops.. Fornecedor não ativado!";
            $this->load->view('administrador/msg/msg_erro',$msg);
        }
        $this->load->view('administrador/fornecedores/listfornecedores',$data);
        $this->load->view('administrador/includes/footer');

    }

    // Função de chamada da interface(view) de novos Fornecedores
    public function novoFornecedor(){
        $this->Session_funcionario();
        // Carrega as views
        $this->load->view('administrador/includes/header');
        $this->load->view('administrador/includes/menu');
        $this->load->view('administrador/fornecedores/novoFornecedor');
        $this->load->view('administrador/includes/footer');

    }

    // Função de chamada da função de inserção
    public function insereFornecedor(){
        $this->Session_funcionario();
        $this->load->model('administradorModel','fornecedor');

        if($this->fornecedor->insereFornecedor()){
            redirect('fornecedores/1');
        }else{
            redirect('fornecedores/2');
        }
    }

    public function atualizaForn($id=null){
        $this->Session_funcionario();
        $this->load->model('administradorModel','atualForn');
        $forn['fornecedor'] = $this->atualForn->atualizaForn($id);

        // Carrega as views
        $this->load->view('administrador/includes/header');
        $this->load->view('administrador/includes/menu');
        $this->load->view('administrador/fornecedores/atualizaFornecedor', $forn);
        $this->load->view('administrador/includes/footer');
    }

    // Função de atualizar o fornecedor
    public function atualizaFornecedor($id=null){
        $this->Session_funcionario();
        $this->load->model('administradorModel','atualForn');

        if($this->atualForn->atualizaFornecedor($id)){
            redirect('fornecedores/3');
        }else{
            redirect('fornecedores/4');
        }
    }

    public function inatForn($id=null){
        $this->Session_funcionario();
        $this->load->model('administradorModel','inatForn');

        if($this->inatForn->inatForn($id)){
            redirect('fornecedores/5');
        }else{
            redirect('fornecedores/6');
        }
    }

    public function atForne($id=null){
        $this->Session_funcionario();
        $this->load->model('administradorModel','forn');

        if($this->forn->atForne($id)){
            redirect('fornecedores/7');
        }else{
            redirect('fornecedores/8');
        }
    }

    // Função de chamada da interface(view) de Venda
    public function Vendas(){
        $this->Session_funcionario();
        // Carrega as views
        $this->load->view('administrador/includes/header');
        $this->load->view('administrador/includes/menu');
        $this->load->view('administrador/venda/vendas');
        $this->load->view('administrador/includes/footer');

    }

    // Função de chamada da interface(view) de Nova Venda
    public function novaVenda(){
        $this->Session_funcionario();
        $this->load->model('administradorModel','searchCliente');
        $busca['searchCliente'] = $this->searchCliente->SearchCliente();

        // Carrega as views
        $this->load->view('administrador/includes/header');
        $this->load->view('administrador/includes/menu');
        $this->load->view('administrador/venda/novaVenda',$busca);
        $this->load->view('administrador/includes/footer');
    }

    // Função de chamada da página de listagem de Produtos
    public function produtos($indice=null){
        $this->Session_funcionario();
        $this->load->model('administradorModel','produtos');
        $this->load->model('administradorModel','produtos');    
        
        $config = array(
                    "base_url" => base_url('produtos/p'),
                    "per_page" => 3,
                    "num_links" => 3,
                    "uri_segment" => 3,
                    "total_rows" => $this->produtos->CountProduto(),
                    "full_tag_open" => "<ul class='pagination pull-right'>",
                    "full_tag_close" => "</ul>",
                    "first_link" => FALSE,
                    "last_link" => FALSE,
                    "first_tag_open" => "<li>",
                    "first_tag_close" => "</li>",
                    "prev_link" => "Anterior",
                    "prev_tag_open" => "<li class='prev'>",
                    "prev_tag_close" => "</li>",
                    "next_link" => "Próximo",
                    "next_tag_open" => "<li class='next'>",
                    "next_tag_close" => "</li>",
                    "last_tag_open" => "<li>",
                    "last_tag_close" => "</li>",
                    "cur_tag_open" => "<li class='active'><a href='#'>",
                    "cur_tag_close" => "</a></li>",
                    "num_tag_open" => "<li>",
                    "num_tag_close" => "</li>"
        );
        
        $this->pagination->initialize($config);
        
        $data['pagination'] = $this->pagination->create_links();
        
        $offset = ($this->uri->segment(3))?$this->uri->segment(3):0;
        
        $data['produtos'] = $this->produtos->listProduto();
        $data['produtos'] = $this->produtos->getProduto('nomeProduto','ASC',$config['per_page'],$offset);

        $this->load->view('administrador/includes/header');
        $this->load->view('administrador/includes/menu');
        if($indice == 1){
            $msg['msg'] = "Produto Cadastrado com Sucesso!";
            $this->load->view('administrador/msg/msg_success',$msg);
        }else if($indice == 2){
            $msg['msg'] = "Produto não Cadastrado, Desculpe!";
            $this->load->view('administrador/msg/msg_erro',$msg);
        }else if($indice == 3){
            $msg['msg'] = "Produto Excluido com Sucesso!";
            $this->load->view('administrador/msg/msg_success',$msg);
        }else if($indice == 4){
            $msg['msg'] = "Produto não excluido, desculpe!";
            $this->load->view('administrador/msg/msg_erro',$msg);
        }else if($indice == 5){
            $msg['msg'] = "Produto atualizado com sucesso!";
            $this->load->view('administrador/msg/msg_success',$msg);
        }else if($indice == 6){
            $msg['msg'] = "Produto não atualizado, tente novamente!";
            $this->load->view('administrador/msg/msg_erro',$msg);
        }
        
        $this->load->view('administrador/produtos/list-produto',$data); // chamada da página de listagem!
        $this->load->view('administrador/includes/footer'); // Chamada do rodapé da página!
    
    }

    // Função de chamada que carrega a interface(view) de cadastro de um novo produto
    public function novoProduto(){
        $this->Session_funcionario();
        $this->load->model('administradorModel','dinamic');
        $this->load->model('administradorModel','fornecedor');
        $data['categoria'] = $this->dinamic->dinamicCategoria();
        $data['fornecedor'] = $this->fornecedor->dinamicFornecedor();

        // Carrega as views
        $this->load->view('administrador/includes/header');
        $this->load->view('administrador/includes/menu');
        $this->load->view('administrador/produtos/novoProduto',$data);
        $this->load->view('administrador/includes/footer');
    
    }

    // Carrega a função, chamando a model de inserção, para inserir o produto no banco.
    public function insereProduto(){
        $this->Session_funcionario();
        $this->load->model('administradorModel','produto');

        if($this->produto->InsereProduto()){
            redirect('produtos/1');
        }else{
            redirect('produtos/2');
        }
    }

    // Carrega a função, chamando a model, para executar a exclusão do produto.
    public function delProduto($id=null){
        $this->Session_funcionario();
        $this->load->model('administradorModel','exproduto');

        if($this->exproduto->delProduto($id)){
            redirect('produtos/3');
        }else{
            redirect('produtos/4');
        }
    }
    
    // Função que recebe os dados no formulário para atualizar
    public function AtualizaProduto($id=null){
        $this->Session_funcionario();
        $this->load->model('administradorModel','uproduto');
        $this->load->model('administradorModel','dinamic');
        $this->load->model('administradorModel','fornecedor');
        $data['categoria'] = $this->dinamic->dinamicCategoria();
        $data['fornecedor'] = $this->fornecedor->dinamicFornecedor();
        $data['produto'] = $this->uproduto->AtualizaProd($id);

        // Carrega as views
        $this->load->view('administrador/includes/header');
        $this->load->view('administrador/includes/menu');
        $this->load->view('administrador/produtos/atualizaProduto',$data);
        $this->load->view('administrador/includes/footer');
    }

    // Função de atualização dos produtos
    public function AtualizaProd($id=null){
        $this->Session_funcionario();
        $this->load->model('administradorModel','atualiza');

        if($this->atualiza->AtualizaProduto($id)){
            redirect('produtos/5');
        }else{
            redirect('produtos/6');
        }
    }

    // carrega a view de categorias
    public function categorias($indice=null){
        $this->Session_funcionario();
        $this->load->model('administradorModel','categorias');
        $this->load->model('administradorModel','categorias');

        $config = array(
            "base_url" => base_url('categorias/p'),
            "per_page" => 3,
            "num_links" => 3,
            "uri_segment" => 3,
            "total_rows" => $this->categorias->CountCategoria(),
            "full_tag_open" => "<ul class='pagination pull-right'>",
            "full_tag_close" => "</ul>",
            "first_link" => FALSE,
            "last_link" => FALSE,
            "first_tag_open" => "<li>",
            "first_tag_close" => "</li>",
            "prev_link" => "Anterior",
            "prev_tag_open" => "<li class='prev'>",
            "prev_tag_close" => "</li>",
            "next_link" => "Próximo",
            "next_tag_open" => "<li class='next'>",
            "next_tag_close" => "</li>",
            "last_tag_open" => "<li>",
            "last_tag_close" => "</li>",
            "cur_tag_open" => "<li class='active'><a href='#'>",
            "cur_tag_close" => "</a></li>",
            "num_tag_open" => "<li>",
            "num_tag_close" => "</li>"
        );

        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        $offset = ($this->uri->segment(3))?$this->uri->segment(3):0;

        $data['categorias'] = $this->categorias->selectCategoria();
        $data['categorias'] = $this->categorias->getCategoria('nomeCategoria','ASC',$config['per_page'],$offset);

        $this->load->view('administrador/includes/header');
        $this->load->view('administrador/includes/menu');
        if($indice == 1){
            $msg['msg'] = "Categoria Cadastrado com Sucesso!";
            $this->load->view('administrador/msg/msg_success',$msg);
        }else if($indice == 2){
            $msg['msg'] = "Categoria não cadastrada. Desculpe, entre em contato com o administrador do sistema!";
            $this->load->view('administrador/msg/msg_erro',$msg);
        }else if($indice == 3){
            $msg['msg'] = "Categoria atualizada com sucesso!";
            $this->load->view('administrador/msg/msg_success',$msg);
        }else if($indice == 4){
            $msg['msg'] = "Ops.. Categoria não atualizada!";
            $this->load->view('administrador/msg/msg_erro',$msg);
        }else if($indice == 5){
            $msg['msg'] = "Categoria inativada com sucesso!";
            $this->load->view('administrador/msg/msg_success',$msg);
        }else if($indice == 6){
            $msg['msg'] = "Ops.. Categoria não inativada!";
            $this->load->view('administrador/msg/msg_erro',$msg);
        }else if($indice == 7){
            $msg['msg'] = "Categoria ativada com sucesso!";
            $this->load->view('administrador/msg/msg_success',$msg);
        }else if($indice == 8){
            $msg['msg'] = "ops.. Categoria não ativada!";
            $this->load->view('administrador/msg/msg_erro',$msg);
        }
        $this->load->view('administrador/categoria/categorias', $data);
        $this->load->view('administrador/includes/footer');
    }

    // Carrega a view de nova categoria
    public function novaCategoria(){
        $this->Session_funcionario();
        // Carrega as views
        $this->load->view('administrador/includes/header');
        $this->load->view('administrador/includes/menu');
        $this->load->view('administrador/categoria/NovaCategoria');
        $this->load->view('administrador/includes/footer');
    }

    // Função que insere a categoria no banco de dados
    public function InsereCategoria(){
        $this->Session_funcionario();
        $this->load->model('administradorModel','categoria');

        if($this->categoria->InsereCategoria()){
            redirect('categorias/1');
        }else{
            redirect('categorias/2');
        }
    }

    public function atualizaCategoria($id=null){
        $this->Session_funcionario();
        $this->load->model('administradorModel','categoria');
        $data['categoria'] = $this->categoria->atualCategoria($id);

        // Carrega as views
        $this->load->view('administrador/includes/header');
        $this->load->view('administrador/includes/menu');
        $this->load->view('administrador/categoria/atualizaCategoria', $data);
        $this->load->view('administrador/includes/footer');
    }

    public function atualCategoria($id=null){
        $this->Session_funcionario();
        $this->load->model('administradorModel','categoria');

        if($this->categoria->atualizaCategoria($id)){
            redirect('categorias/3');
        }else{     
            redirect('categorias/4');
        }
    }

    public function inativaCategoria($id=null){
        $this->Session_funcionario();
        $this->load->model('administradorModel','categoria');

        if($this->categoria->inativaCategoria($id)){
            redirect('categorias/5');
        }else{
            redirect('categorias/6');
        }
    }

    public function ativarCategoria($id=null){
        $this->Session_funcionario();
        $this->load->model('administradorModel','categoria');

        if($this->categoria->ativarCategoria($id)){
            redirect('categorias/7');
        }else{
            redirect('categorias/8');
        }
    }

    // Carrega a função, chamando a view(interface) de relatório de Clientes
    public function relatorioCliente(){
        $this->Session_funcionario();
        // Carrega as views
        $this->load->view('administrador/includes/header');
        $this->load->view('administrador/includes/menu');
        $this->load->view('administrador/relatorios/relatorioCliente');
        $this->load->view('administrador/includes/footer');
    }

    public function GerarCliente(){
        $mpdf = new mPDF();


    }

    // Carrega a função, chamando a view(interface) de relatório de vendas
    public function relatorioVendas(){
        $this->Session_funcionario();
        // Carrega as views
        $this->load->view('administrador/includes/header');
        $this->load->view('administrador/includes/menu');
        $this->load->view('administrador/relatorios/relatorioVendas');
        $this->load->view('administrador/includes/footer');
    }

    // Carrega a função, chamando a interface(view) de relatório de Estoque
    public function relatorioEstoque(){
        $this->Session_funcionario();
        // Carrega as views
        $this->load->view('administrador/includes/header');
        $this->load->view('administrador/includes/menu');
        $this->load->view('administrador/relatorios/relatorioEstoque');
        $this->load->view('administrador/includes/footer');
    }
}
?>
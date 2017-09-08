<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administradorcontroller extends CI_Controller {
    
    // Função de chamada da página principal.
    public function index(){

        $this->load->view('administrador/includes/header'); // chamada do topo da página.
        $this->load->view('administrador/includes/menu'); // chamada do menu.
        $this->load->view('administrador/administrador'); // chamada da página principal.
        $this->load->view('administrador/includes/footer'); // chamada do rodapé da página.

    }

    // Função de chamada da página Usuário
    public function usuario($indice=null){
        $this->load->model('administradorModel','usuario');
        $lista['usuario'] = $this->usuario->listaUsuario();

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
        $this->load->view('administrador/usuarios/usuarios',$lista); // chamada da página de Usuários.
        $this->load->view('administrador/includes/footer'); // chamada do rodapé da página.
    
    }

    // Função de chamada da página de Novo Usuário
    public function novoUsuario(){
        $this->load->model('administradorModel','dinamic');
        $data['nivelAcesso'] = $this->dinamic->dinamicSelect();

        $this->load->view('administrador/includes/header');
        $this->load->view('administrador/includes/menu');
        $this->load->view('administrador/usuarios/novoUsuario',$data);
        $this->load->view('administrador/includes/footer');

    }

    // Função que chama a model, para salvar o usuario no banco de dados.
    public function salvaUsuario(){
        $this->load->model('administradorModel','usuario');

        if($this->usuario->insereUsuario()){
            redirect('usuario/1');
        }else{
            redirect('usuario/2');
        }
    }

    public function inatUsuario($id=null){
        $this->load->model('administradorModel','usuario');

        if($this->usuario->inatUsuario($id)){
            redirect('usuario/3');
        }else{
            redirect('usuario/4');
        }
    }

    public function atiUsuario($id=null){
        $this->load->model('administradorModel','usuario');
        
        if($this->usuario->atiUsuario($id)){
            redirect('usuario/5');
        }else{
            redirect('usuario/6');
        }
    }

    // Função de chamada da interface(view) de listagem de Clientes
    public function clientes($indice=null){

        $this->load->model('administradorModel','cliente');
        $lista['cliente'] = $this->cliente->listaClientes();

        $this->load->view('administrador/includes/header');
        $this->load->view('administrador/includes/menu');
        if($indice == 1){
            $msg['msg'] = "Cliente Cadastrado com Sucesso!";
            $this->load->view('administrador/msg/msg_success',$msg);
        }else if($indice == 2){
            $msg['msg'] = "Cliente não Cadastrado, Desculpe!";
            $this->load->view('administrador/msg/msg_erro',$msg);
        }
        $this->load->view('administrador/clientes/list-clientes',$lista);
        $this->load->view('administrador/includes/footer');
    }

    // Função de chamada da interface(view) de cadastro de um novo cliente.
    public function novoCliente(){

        $this->load->view('administrador/includes/header');
        $this->load->view('administrador/includes/menu');
        $this->load->view('administrador/clientes/novoCliente');
        $this->load->view('administrador/includes/footer');

    }

    // Função que chama o model de inserção do cliente
    public function insereCliente(){
        $this->load->model('administradorModel','novoCliente');

        if($this->novoCliente->insereCliente()){
            redirect('clientes/1');
        }else{
            redirect('clientes/2');
        }
    }

    // Função de chamada da página de Fornecedores
    public function fornecedores(){
        
        $this->load->view('administrador/includes/header');
        $this->load->view('administrador/includes/menu');
        $this->load->view('administrador/fornecedores/listfornecedores');
        $this->load->view('administrador/includes/footer');

    }

    // Função de chamada da interface(view) de novos Fornecedores
    public function novoFornecedor(){

        $this->load->view('administrador/includes/header');
        $this->load->view('administrador/includes/menu');
        $this->load->view('administrador/fornecedores/novoFornecedor');
        $this->load->view('administrador/includes/footer');

    }

    // Função de chamada da interface(view) de Venda
    public function Vendas(){
        // Carrega as views
        $this->load->view('administrador/includes/header');
        $this->load->view('administrador/includes/menu');
        $this->load->view('administrador/venda/vendas');
        $this->load->view('administrador/includes/footer');

    }

    // Função de chamada da interface(view) de Nova Venda
    public function novaVenda(){
        // Carrega as views
        $this->load->view('administrador/includes/header');
        $this->load->view('administrador/includes/menu');
        $this->load->view('administrador/venda/novaVenda');
        $this->load->view('administrador/includes/footer');
    }

    // Função de chamada da página de listagem de Produtos
    public function produtos($indice=null){
        $this->load->model('administradorModel','produtos');
        $lista['produtos'] = $this->produtos->listProduto();

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
        }
        
        $this->load->view('administrador/produtos/list-produto',$lista); // chamada da página de listagem!
        $this->load->view('administrador/includes/footer'); // Chamada do rodapé da página!
    
    }

    // Função de chamada que carrega a interface(view) de cadastro de um novo produto
    public function novoProduto(){
        $this->load->model('administradorModel','dinamic');
        $data['categoria'] = $this->dinamic->dinamicCategoria();

        $this->load->view('administrador/includes/header');
        $this->load->view('administrador/includes/menu');
        $this->load->view('administrador/produtos/novoProduto',$data);
        $this->load->view('administrador/includes/footer');
    
    }

    // Carrega a função, chamando a model de inserção, para inserir o produto no banco.
    public function insereProduto(){
        $this->load->model('administradorModel','produto');

        if($this->produto->InsereProduto()){
            //echo "cadastrou";
            redirect('produtos/1');
        }else{
            //echo "deu erro";
            redirect('produtos/2');
        }
    }

    // Carrega a função, chamando a model, para executar a exclusão do produto.
    public function delProduto($id=null){
        $this->load->model('administradorModel','exproduto');

        if($this->exproduto->delProduto($id)){
            redirect('produtos/3');
        }else{
            redirect('produtos/4');
        }
    }

    // carrega a view de categorias
    public function categorias($indice=null){
        $this->load->model('administradorModel','categorias');
        $categoria['categorias'] = $this->categorias->selectCategoria();

        $this->load->view('administrador/includes/header');
        $this->load->view('administrador/includes/menu');
        if($indice == 1){
            $msg['msg'] = "Categoria Cadastrado com Sucesso!";
            $this->load->view('administrador/msg/msg_success',$msg);
        }else if($indice == 2){
            $msg['msg'] = "Categoria não cadastrada. Desculpe, entre em contato com o administrador do sistema!";
            $this->load->view('administrador/msg/msg_erro',$msg);
        }
        $this->load->view('administrador/categoria/categorias', $categoria);
        $this->load->view('administrador/includes/footer');
    }

    // Carrega a view de nova categoria
    public function novaCategoria(){
        $this->load->view('administrador/includes/header');
        $this->load->view('administrador/includes/menu');
        $this->load->view('administrador/categoria/NovaCategoria');
        $this->load->view('administrador/includes/footer');
    }

    // Função que insere a categoria no banco de dados
    public function InsereCategoria(){
        $this->load->model('administradorModel','categoria');

        if($this->categoria->InsereCategoria()){
            redirect('categorias/1');
        }else{
            redirect('categorias/2');
        }
    }

    // Carrega a função, chamando a view(interface) de relatório de Clientes
    public function relatorioCliente(){
        $this->load->view('administrador/includes/header');
        $this->load->view('administrador/includes/menu');
        $this->load->view('administrador/relatorios/relatorioCliente');
        $this->load->view('administrador/includes/footer');
    }

    // Carrega a função, chamando a view(interface) de relatório de vendas
    public function relatorioVendas(){
        $this->load->view('administrador/includes/header');
        $this->load->view('administrador/includes/menu');
        $this->load->view('administrador/relatorios/relatorioVendas');
        $this->load->view('administrador/includes/footer');
    }

    // Carrega a função, chamando a interface(view) de relatório de Estoque
    public function relatorioEstoque(){
        $this->load->view('administrador/includes/header');
        $this->load->view('administrador/includes/menu');
        $this->load->view('administrador/relatorios/relatorioEstoque');
        $this->load->view('administrador/includes/footer');
    }
}
?>
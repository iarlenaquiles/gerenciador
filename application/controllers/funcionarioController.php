<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Funcionariocontroller extends CI_Controller {

   public function __construct(){
                
        parent::__construct();
    
    }
    
    public function Session_funcionario(){
        if($this->session->userdata('logado') == false){
            redirect('siteController/AreaFuncionario');
        }
    }

    // Função de chamada da página principal
    public function index(){
        $this->Session_funcionario();
        $this->load->view('funcionario/includes/header');
        $this->load->view('funcionario/includes/menu');
        $this->load->view('funcionario/funcionario');
        $this->load->view('funcionario/includes/footer');
    
    }

    // Função de chamada da página de Clientes
    public function clientes(){
        $this->Session_funcionario();
        $this->load->view('funcionario/includes/header');
        $this->load->view('funcionario/includes/menu');
        $this->load->view('funcionario/clientes/list-clientes');
        $this->load->view('funcionario/includes/footer');
    }

    public function novoCliente(){
        $this->Session_funcionario();
        $this->load->view('funcionario/includes/header');
        $this->load->view('funcionario/includes/menu');
        $this->load->view('funcionario/clientes/novoCliente');
        $this->load->view('funcionario/includes/footer');

    }

    // Função de chamada da página de Fornecedores
    public function fornecedores(){
        $this->Session_funcionario();
        $this->load->view('funcionario/includes/header');
        $this->load->view('funcionario/includes/menu');
        $this->load->view('funcionario/fornecedores/listfornecedores');
        $this->load->view('funcionario/includes/footer');

    }

    // Função de chamada da página de Produtos
    public function produtos($indice=null){
        $this->Session_funcionario();
        $this->load->model('funcionarioModel','produtos');
        $lista['produtos'] = $this->produtos->listProduto(); 

        $this->load->view('funcionario/includes/header');
        $this->load->view('funcionario/includes/menu');
        if($indice == 1){
            $msg['msg'] = "Produto Cadastrado com Sucesso!";
            $this->load->view('funcionario/msg/msg_success',$msg);
        }else if($indice == 2){
            $msg['msg'] = "Produto não Cadastrado, Desculpe!";
            $this->load->view('funcionario/msg/msg_erro',$msg);
        }else if($indice == 3){
            $msg['msg'] = "Produto Excluido com Sucesso!";
            $this->load->view('funcionario/msg/msg_success',$msg);
        }else if($indice == 4){
            $msg['msg'] = "Produto não excluido, desculpe!";
            $this->load->view('funcionario/msg/msg_erro',$msg);
        }
        
        $this->load->view('funcionario/produtos/list-produto',$lista); // chamada da página de listagem!
        $this->load->view('funcionario/includes/footer'); // Chamada do rodapé da página!
    
    }

    public function novoProduto(){
        $this->Session_funcionario();
        $this->load->view('funcionario/includes/header');
        $this->load->view('funcionario/includes/menu');
        $this->load->view('funcionario/produtos/novoProduto');
        $this->load->view('funcionario/includes/footer');
    
    }

    public function insereProduto(){
        $this->Session_funcionario();
        $this->load->model('funcionarioModel','produto');

        if($this->produto->InsereProduto()){
            //echo "cadastrou";
            redirect('produtos/1');
        }else{
            //echo "deu erro";
            redirect('produtos/2');
        }
    }

    public function delProduto($id=null){
        $this->Session_funcionario();
        $this->load->model('funcionarioModel','exproduto');

        if($this->exproduto->delProduto($id)){
            redirect('produtos/3');
        }else{
            redirect('produtos/4');
        }
    }

    public function LogoutUsuario(){
        $this->load->model('loginModel','usuarios');

        if($this->usuarios->LogoutUsuario()){
            redirect('siteController/AreaFuncionario/3');
        }
    }

}
?>
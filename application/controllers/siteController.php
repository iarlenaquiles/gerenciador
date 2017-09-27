<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitecontroller extends CI_Controller {

    public function Session_cliente(){
        if($this->session->userdata('logado') == false){
            redirect('siteController/LoginCliente');
        }
    }

    public function Session_funcionario(){
        if($this->session->userdata('logado') == false){
            redirect('siteController/LoginCliente');
        }
    }

    // Carrega a página incial do site!
    public function index(){
        $this->load->view('site/includes/header');
        $this->load->view('site/includes/menu');
        $this->load->view('site/inicial');
        $this->load->view('site/includes/footer');
    }

    // Carrega a incial do cliente
    public function Cliente(){
        $this->load->view('site/AreaCliente/includes/header');
        $this->load->view('site/AreaCliente/includes/menu');
        $this->load->view('site/AreaCliente/cliente');
        $this->load->view('site/AreaCliente/includes/footer');
    }

    // Carrega a Área do Cliente
    public function Area(){
        $this->load->view('site/AreaCliente/includes/header');
        $this->load->view('site/AreaCliente/includes/menu');
        $this->load->view('site/AreaCliente/cliente');
        $this->load->view('site/AreaCliente/includes/footer');
    }

    // Carrega o Login do Cliente
    public function LoginCliente($indice=null){
        $this->load->view('site/AreaCliente/includes/header');
        $this->load->view('site/AreaCliente/includes/menu');
        if($indice == 1){
            $msg['msg'] = "Usuário cadastrado com sucesso!";
            $this->load->view('site/AreaCliente/msg/msg_success',$msg);
        }else if($indice == 2){
            $msg['msg'] = "Ops.. Não Cadastrado, por favor entre em contato com o Administrador do Sistema!";
            $this->load->view('site/AreaCliente/msg/msg_erro',$msg);
        }else if($indice == 3){
            $msg['msg'] = "Nova senha cadastrada com sucesso!";
            $this->load->view('site/AreaCliente/msg/msg_success',$msg);
        }else if($indice == 4){
            $msg['msg'] = "Ops.. Tente novamente, caso contrario, entre em contato com o Administrador do Sistema!";
            $this->load->view('site/AreaCliente/msg/msg_erro',$msg);
        }
        $this->load->view('site/AreaCliente/login/LoginCliente');
        if($indice == 6){
            $msg['msg'] = "Login/Senha erradas, tente novamente!";
            $this->load->view('site/AreaCliente/restrito/msg/msg_erro',$msg);
        }else if($indice == 7){
            $msg['msg'] = "Deslogado com Sucesso!";
            $this->load->view('site/AreaCliente/restrito/msg/msg_success',$msg);
        }

        $this->load->view('site/AreaCliente/includes/footer');
    }
    // Area Restrita do Cliente
    public function AreaCliente(){
        $this->Session_cliente();
        $this->load->view('site/AreaCliente/restrito/includes/header');
        $this->load->view('site/AreaCliente/restrito/includes/menu');
        $this->load->view('site/AreaCliente/restrito/restrito');
        $this->load->view('site/AreaCliente/restrito/includes/footer');
    }

    // Função que Carrega a model de Logar
    public function LogarCliente(){
        $this->load->model('loginModel','cliente');

        if($this->cliente->LogarCliente()){
            redirect('siteController/AreaCliente');
        }else{
            redirect('siteController/LoginCliente/6');
        }
    }

    // Função que carrega a model de logout
    public function logoutCliente(){
        $this->load->model('loginModel','cliente');

        if($this->cliente->logoutCliente()){
            redirect('siteController/LoginCliente/7');
        }
    }

    // Carrega o novo Usuario(Cliente)
    public function NovoUsuario(){
        $this->load->view('site/AreaCliente/includes/header');
        $this->load->view('site/AreaCliente/includes/menu');
        $this->load->view('site/AreaCliente/novoCliente/novoUsuario');
        $this->load->view('site/AreaCliente/includes/footer');
    }

    // Função que carrega a model de salvar o cliente!
    public function salvaCliente(){
        $this->load->model('siteModel','cliente');

        if($this->cliente->novoCliente()){
            redirect('LoginCliente/1');
        }else{
            redirect('LoginCliente/2');
        }
    }

    // Função que atualiza a senha do cliente.
    public function novaSenha(){
        $this->load->model('siteModel','novaSenha');

        if($this->novaSenha->novaSenha()){
            redirect('LoginCliente/3');
        }else{
            redirect('LoginCliente/4');
        }
    }

      // Carrega a Área do Funcionário
      public function AreaFuncionario($indice=null){
        $this->load->view('site/AreaFuncionario/includes/header');
        $this->load->view('site/AreaFuncionario/includes/menu');
        $this->load->view('site/AreaFuncionario/login/LoginFuncionario');
        if($indice == 1){
            $msg['msg'] = "Login/Senha incorretas, por favor tente novamente!";
            $this->load->view('site/AreaFuncionario/msg/msg_erro',$msg);
        }else if($indice == 2){ // Desloga o gestor
            $msg['msg'] = "Gestor Deslogado com Sucesso!";
            $this->load->view('site/AreaFuncionario/msg/msg_success',$msg);
        }else if($indice == 3){ // Desloga o Funcionário
            $msg['msg'] = "Funcionário Deslogado com Sucesso!";
            $this->load->view('site/AreaFuncionario/msg/msg_success',$msg);
        }else if($indice == 4){
            $msg['msg'] = "Administrador Deslogado com Sucesso!";
            $this->load->view('site/AreaFuncionario/msg/msg_success',$msg);
        }else if($indice == 5){
            $msg['msg'] = "Área restrita, por favor utilize seu Login e senha para acessar!";
            $this->load->view('site/AreaFuncionario/msg/msg_erro',$msg);
        }
        $this->load->view('site/AreaFuncionario/includes/footer');
    }
}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Classe Gestor, onde vai controlador todo o sistema.

class Gestorcontroller extends CI_Controller {
    
    // Função que verifica a sessão do usuário
    public function Session_funcionario(){
        if($this->session->userdata('logado') == false){
            redirect('siteController/AreaFuncionario');
        }
    }

    // Carrega a view inicial do Gestor
    public function index(){
        $this->Session_funcionario();
        $this->load->view('gestor/includes/header');
        $this->load->view('gestor/includes/menu');
        $this->load->view('gestor/gestor');
        $this->load->view('gestor/includes/footer');
    }

    // Carrega a view dos produtos
    public function produto(){
        $this->Session_funcionario();
        $this->load->view('gestor/includes/header');
        $this->load->view('gestor/includes/menu');
        $this->load->view('gestor/produtos/list-produto');
        $this->load->view('gestor/includes/footer');
    }

    public function LogoutUsuario(){
        $this->load->model('loginModel','usuarios');

        if($this->usuarios->LogoutUsuario()){
            redirect('siteController/AreaFuncionario/2');
        }
    }
}
?>
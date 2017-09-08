<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitecontroller extends CI_Controller {
    
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
    public function AreaCliente(){
        $this->load->view('site/AreaCliente/includes/header');
        $this->load->view('site/AreaCliente/includes/menu');
        $this->load->view('site/AreaCliente/login/LoginCliente');
        $this->load->view('site/AreaCliente/includes/footer');
    }

    // Carrega a Área do Fornecedor
    public function AreaFornecedor(){
        $this->load->view('site/AreaFornecedor/includes/header');
        $this->load->view('site/AreaFornecedor/includes/menu');
        $this->load->view('site/AreaFornecedor/login/LoginFornecedor');
        $this->load->view('site/AreaFornecedor/includes/footer');
    }

      // Carrega a Área do Funcionário
      public function AreaFuncionario(){
        $this->load->view('site/AreaFuncionario/includes/header');
        $this->load->view('site/AreaFuncionario/includes/menu');
        $this->load->view('site/AreaFuncionario/login/LoginFuncionario');
        $this->load->view('site/AreaFuncionario/includes/footer');
    }
}
?>
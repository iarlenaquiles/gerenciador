<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Classe Gestor, onde vai controlador todo o sistema.

class Gestorcontroller extends CI_Controller {
    
    public function index(){
        $this->load->view('gestor/includes/header');
        $this->load->view('gestor/includes/menu');
        $this->load->view('gestor/gestor');
        $this->load->view('gestor/includes/footer');
    }

    public function produto(){
        $this->load->view('gestor/includes/header');
        $this->load->view('gestor/includes/menu');
        $this->load->view('gestor/produtos/list-produto');
        $this->load->view('gestor/includes/footer');
    }

}
?>
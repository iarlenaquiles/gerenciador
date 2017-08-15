<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Classe Login, onde vai controlador todo o sistema.

class Logincontroller extends CI_Controller {
    
    public function index(){
        $this->load->view('login/includes/header');
        $this->load->view('login/login');
        $this->load->view('gestor/includes/footer');
    }
}
?>
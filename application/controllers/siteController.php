<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Classe Gestor, onde vai controlador todo o sistema.

class Sitecontroller extends CI_Controller {
    
    public function index(){
        $this->load->view('site/includes/header');
        $this->load->view('site/includes/menu');
        $this->load->view('site/inicial');
        $this->load->view('site/includes/footer');
    }
}
?>
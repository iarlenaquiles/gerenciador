<?php
    class Funcionariomodel extends CI_model{
        
        function __construct(){
           parent::__construct();
        }

        public function listProduto(){
            $this->db->select('*');
        	return $this->db->get('produto')->result();
        }

        public function insereProduto(){
            $dado['cod_produto']    = $this->input->post('cod_produto');
            $dado['nomeProduto']    = $this->input->post('nomeProduto');
            $dado['cadastro']       = $this->input->post('cadastro');
            $dado['validade']       = implode('-',array_reverse(explode('/',$this->input->post('validade'))));
            $dado['quantidade']     = $this->input->post('quantidade');
            $dado['descricao']      = $this->input->post('descricao');

            return $this->db->insert('produto',$dado);
        }

        public function delProduto($id=null){
            $this->db->where('idProduto',$id);
            return $this->db->delete('produto');
        }
    }
?>
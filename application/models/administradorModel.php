<?php
    class Administradormodel extends CI_model{
        
        function __construct(){
           parent::__construct();
        }

        public function listaUsuario(){
            $this->db->select('*');
            return $this->db->get('usuarios')->result();
        }

        public function insereUsuario(){
            $dado['nomeUsuario'] = $this->input->post('nomeUsuario');
            $dado['cpfUsuario'] = $this->input->post('cpfUsuario');
            $dado['email'] = $this->input->post('email');
            $dado['senha'] = md5($this->input->post('senha'));
            $dado['nivelAcesso'] = $this->input->post('nivelAcesso');
            $dado['ativo'] = $this->input->post('ativo');
            $dado['cadastro'] = $this->input->post('cadastro');

            if($dado['cpfUsuario'] == 11){
                $dado['cpfUsuario'] = $this->input->post('cpfUsuario');
            }else{
                echo "error";
            }

            return $this->db->insert('usuarios',$dado);
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
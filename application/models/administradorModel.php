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
            // date('Y-m-d',strtotime($this->input->post('validade')));

            return $this->db->insert('produto',$dado);
        }

        public function delProduto($id=null){
            $this->db->where('idProduto',$id);
            return $this->db->delete('produto');
        }

        // Função de inserção de clientes no banco de dados
        public function insereCliente(){
            $insere['nomeCliente']          = $this->input->post('nomeCliente');
            $insere['rg']                   = $this->input->post('rg');
            $insere['CpfCnpj']              = $this->input->post('CpfCnpj');
            $insere['nascimentoCliente']    = implode('-',array_reverse(explode('/',$this->input->post('nascimentoCliente'))));
            $insere['email']                = $this->input->post('email');
            $insere['telefone']             = $this->input->post('telefone');
            $insere['sexo']                 = $this->input->post('sexo');
            $insere['endereco']             = $this->input->post('endereco');
            $insere['numero']               = $this->input->post('numero');
            $insere['complemento']          = $this->input->post('complemento');
            $insere['cep']                  = $this->input->post('cep');
            $insere['uf']                   = $this->input->post('uf');
            $insere['cidade']               = $this->input->post('cidade');
            $insere['bairro']               = $this->input->post('bairro');

            return $this->db->insert('cliente',$insere);
        }

        // Função de listagem de clientes
        public function listaClientes(){
            $this->db->select('*');
        	return $this->db->get('cliente')->result();
        }
    }
?>
<?php
    class Sitemodel extends CI_model{
        
        function __construct(){
           parent::__construct();
        }

        // Função de inserção de um novo cliente!
        public function novoCliente(){
            $novo['nomeCliente']          = $this->input->post('nomeCliente');
            $novo['rg']                   = $this->input->post('rg');
            $novo['CpfCnpj']              = $this->input->post('CpfCnpj');
            $novo['nascimentoCliente']    = implode('-',array_reverse(explode('/',$this->input->post('nascimentoCliente'))));
            $novo['email']                = $this->input->post('email');
            $novo['senha']                = md5($this->input->post('senha'));
            $novo['telefone']             = $this->input->post('telefone');
            $novo['sexo']                 = $this->input->post('sexo');
            $novo['endereco']             = $this->input->post('endereco');
            $novo['numero']               = $this->input->post('numero');
            $novo['complemento']          = $this->input->post('complemento');
            $novo['cep']                  = $this->input->post('cep');
            $novo['uf']                   = $this->input->post('uf');
            $novo['cidade']               = $this->input->post('cidade');
            $novo['bairro']               = $this->input->post('bairro');

            return $this->db->insert('cliente',$novo);
        }

        public function novaSenha(){
            $email = $this->input->post('email');
            $senha_nova = md5($this->input->post('NovaSenha'));

            $this->db->select('email');
            $this->db->where('email',$email);
            $data['email'] = $this->db->get('cliente')->result();
            $dados['senha'] = $senha_nova;

            if($data['email'][0]->email == $email){
                $this->db->where('email',$email);
                $this->db->update('cliente',$dados);
                return true;
            }else{
                return false;
            }
        }
    }
?>
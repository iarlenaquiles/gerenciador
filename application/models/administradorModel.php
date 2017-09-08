<?php
    class Administradormodel extends CI_model{
        
        function __construct(){
           parent::__construct();
        }

        public function listaUsuario(){
            $this->db->select('*');
            //$this->db->WHERE('ativo',1);
            return $this->db->get('usuarios')->result();
        }

        // Função de select dinâmico da tabela Nivel de Acesso
        public function dinamicSelect(){
            $this->db->select('*');
            return $this->db->get('nivelAcesso')->result();
        }

        public function insereUsuario(){
            $dado['nomeUsuario'] = $this->input->post('nomeUsuario');
            $dado['cpfUsuario'] = $this->input->post('cpfUsuario');
            $dado['email'] = $this->input->post('email');
            $dado['senha'] = md5($this->input->post('senha'));
            $dado['id_nivel'] = $this->input->post('id_nivel');
            $dado['ativo'] = $this->input->post('ativo');
            $dado['cadastro'] = $this->input->post('cadastro');

            if($dado['cpfUsuario'] == 11){
                $dado['cpfUsuario'] = $this->input->post('cpfUsuario');
            }else{
                echo "error";
            }

            return $this->db->insert('usuarios',$dado);
        }

        public function inatUsuario($id=null){
            $this->db->set('ativo','0');
            $this->db->where('idUsuario',$id);
            $this->db->update('usuarios');
            return $this->db->get('usuarios')->result();
        }

        public function atiUsuario($id=null){
            $this->db->set('ativo','1');
            $this->db->where('idUsuario',$id);
            $this->db->update('usuarios');
            return $this->db->get('usuarios')->result();
        }

        public function listProduto(){
            $this->db->select('*');
            $this->db->join('categoria','id_categoria = idcategoria','inner');
        	return $this->db->get('produto')->result();
        }

        // Função de inserção de produto no banco de dados
        public function insereProduto(){
            $dado['cod_produto']    = $this->input->post('cod_produto');
            $dado['nomeProduto']    = $this->input->post('nomeProduto');
            $dado['validade']       = implode('-',array_reverse(explode('/',$this->input->post('validade'))));
            $dado['quantidade']     = $this->input->post('quantidade');
            $dado['descricao']      = $this->input->post('descricao');
            $dado['id_categoria']   = $this->input->post('id_categoria');
            // date('Y-m-d',strtotime($this->input->post('validade')));

            return $this->db->insert('produto',$dado);
        }

        // Função de Deletar produto do banco de dados (Temporario, vai mudar para um update)
        public function delProduto($id=null){
            $this->db->where('idProduto',$id);
            return $this->db->delete('produto');
        }

        // Função de Inserir Categoria no banco de dados.
        public function InsereCategoria(){
            $categoria['nomeCategoria']  = $this->input->post('nomeCategoria');
            $categoria['descricao']      = $this->input->post('descricao');

            return $this->db->insert('categoria',$categoria);
        }

        // Função que lista as categorias
        public function selectCategoria(){
            $this->db->select('*');
        	return $this->db->get('categoria')->result();
        }

        public function dinamicCategoria(){
            $this->db->select('*');
            return $this->db->get('categoria')->result();
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
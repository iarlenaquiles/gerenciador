<?php
    class Administradormodel extends CI_model{
        
        function __construct(){
           parent::__construct();
           $this->load->database();
        }

        // Função para buscar usuários no banco e fazer a paginação e fazer o campo de busca!
        public function getUsuarios($shor = 'id',$order = 'asc', $limit = null, $offset = null){
            $termo = $this->input->post('busca');

            $this->db->select('*');
            $this->db->like('nomeUsuario',$termo);
            $this->db->or_like('cpfUsuario',$termo);
            $this->db->order_by($shor,$order);
            $this->db->limit($limit,$offset);

            return $this->db->get('usuarios')->result();
        }

        // Função de contar os usuários do banco de dados.
        public function CountUsuario(){
            return $this->db->count_all('usuarios');
        }

        // Função de listagem de usuarios
        public function listaUsuario(){
            $this->db->select('*');
            return $this->db->get('usuarios')->result();
        }

        // Função de select dinâmico da tabela Nivel de Acesso
        public function dinamicSelect(){
            $this->db->select('*');
            $this->db->order_by('nivel');
            return $this->db->get('nivelacesso')->result();
        }

        // Função de inserção do usuário no banco de dados
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

        // Função de inativar o usuário
        public function inatUsuario($id=null){
            $this->db->set('ativo','0');
            $this->db->where('idUsuario',$id);
            $this->db->update('usuarios');
            return $this->db->get('usuarios')->result();
        }

        // Função de ativar o usuário
        public function atiUsuario($id=null){
            $this->db->set('ativo','1');
            $this->db->where('idUsuario',$id);
            $this->db->update('usuarios');
            return $this->db->get('usuarios')->result();
        }

        public function AtuDados($id=null){
            $this->db->where('idUsuario',$id);
            return $this->db->get('usuarios')->result();
        }

        // Função de atualizar dados
        public function atualizaDados(){
            $data = array('idUsuario'       => $this->input->post('idUsuario'),
                          'nomeUsuario'     => $this->input->post('nomeUsuario'),
                          'rg'              => $this->input->post('rg'),
                          'cpfUsuario'      => $this->input->post('cpfUsuario'),
                          'email'           => $this->input->post('email'),
                          'id_nivel'        => $this->input->post('id_nivel'),
                          'ativo'           => $this->input->post('ativo'));
            $this->db->where('idUsuario',$data['idUsuario']);

            return $this->db->update('usuarios',$data);
        }

        // Função de listar os produtos
        public function listProduto(){
            $this->db->select('*');
            $this->db->join('categoria','id_categoria = idcategoria','inner');
            $this->db->join('fornecedor','id_fornecedor = idfornecedor','inner');
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
            $dado['id_fornecedor']  = $this->input->post('id_fornecedor');

            return $this->db->insert('produto',$dado);
        }

        // Função de Deletar produto do banco de dados (Temporario, vai mudar para um update)
        public function delProduto($id=null){
            $this->db->where('idProduto',$id);
            return $this->db->delete('produto');
        }

        // Função que traz os dados dos produtos no formulário para ser atualizado
        public function AtualizaProd($id=null){
            $this->db->where('idProduto',$id);
            return $this->db->get('produto')->result();
        }

        // Função que recebe os dados em um array para serem atualizados na tabela produto
        public function AtualizaProduto(){
            $data = array('idProduto'     => $this->input->post('idProduto'),
                          'cod_produto'   => $this->input->post('cod_produto'),
                          'nomeProduto'   => $this->input->post('nomeProduto'),
                          'validade'      => date('Y-m-d',strtotime(str_replace('/', '-', $this->input->post('validade')))),
                          'quantidade'    => $this->input->post('quantidade'),
                          'descricao'     => $this->input->post('descricao'),
                          'id_categoria'  => $this->input->post('id_categoria'),
                          'id_fornecedor' => $this->input->post('id_fornecedor'));
            
            $this->db->where('idProduto',$data['idProduto']);
            
            return $this->db->update('produto',$data);
        }

        public function getProduto($shor = 'id',$order = 'asc', $limit = null, $offset = null){
            $busca = $this->input->post('busca');

            $this->db->select('*');
            $this->db->join('categoria','id_categoria = idcategoria','inner');
            $this->db->join('fornecedor','id_fornecedor = idfornecedor','inner');
            $this->db->like('nomeProduto',$busca);
            $this->db->order_by($shor,$order);
            $this->db->limit($limit,$offset);

            return $this->db->get('produto')->result();
        }

        public function CountProduto(){
            return $this->db->count_all('produto');
        }

        // Função de Inserir Categoria no banco de dados.
        public function InsereCategoria(){
            $categoria['nomeCategoria']  = $this->input->post('nomeCategoria');
            $categoria['descricao']      = $this->input->post('descricao');
            $categoria['ativo']          = $this->input->post('ativo'); 

            return $this->db->insert('categoria',$categoria);
        }

        // Função que lista as categorias
        public function selectCategoria(){
            $this->db->select('*');
        	return $this->db->get('categoria')->result();
        }

        // Função de um select dinâmico de categoria
        public function dinamicCategoria(){
            $this->db->select('*');
            $this->db->where('ativo','1');
            $this->db->order_by('nomeCategoria');
            return $this->db->get('categoria')->result();
        }

        public function atualCategoria($id=null){
            $this->db->where('idcategoria',$id);
            return $this->db->get('categoria')->result();
        }

        public function atualizaCategoria(){
            $data = array('idcategoria'     => $this->input->post('idcategoria'),
                          'nomeCategoria'   => $this->input->post('nomeCategoria'),
                          'descricao'       => $this->input->post('descricao'),
                          'ativo'           => $this->input->post('ativo'));

            $this->db->where('idcategoria',$data['idcategoria']);
            
            return $this->db->update('categoria',$data);
        }

        public function inativaCategoria($id=null){
            $this->db->set('ativo','0');
            $this->db->where('idcategoria',$id);
            $this->db->update('categoria');

            return $this->db->get('categoria')->result();
        }

        public function ativarCategoria($id=null){
            $this->db->set('ativo','1');
            $this->db->where('idcategoria',$id);
            $this->db->update('categoria');

            return $this->db->get('categoria')->result();
        }

        public function getCategoria($shor = 'id',$order = 'asc', $limit = null, $offset = null){
            $busca = $this->input->post('busca');

            $this->db->select('*');
            $this->db->like('nomeCategoria',$busca);
            $this->db->order_by($shor,$order);
            $this->db->limit($limit,$offset);

            return $this->db->get('categoria')->result();
        }

        public function CountCategoria(){
            return $this->db->count_all('categoria');
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
            $insere['ativo']                = $this->input->post('ativo');

            return $this->db->insert('cliente',$insere);
        }

        // Função de listagem de clientes
        public function listaClientes(){
            $this->db->select('*');
        	return $this->db->get('cliente')->result();
        }

        // Função para inativar o cliente
        public function inativaCliente($id=null){
            $this->db->set('ativo','0');
            $this->db->where('idcliente',$id);
            $this->db->update('cliente');
            return $this->db->get('cliente')->result();
        }

        // Função para ativar o cliente
        public function atiCliente($id=null){
            $this->db->set('ativo','1');
            $this->db->where('idcliente',$id);
            $this->db->update('cliente');

            return $this->db->get('cliente')->result();
        }

        // Função que traz todos os dados no formulário para ser atualizado
        public function atCliente($id=null){
            $this->db->where('idcliente',$id);
            return $this->db->get('cliente')->result();
        }

        // Função que recebe um array, trazendo os dados para serem atualizados
        public function atualizaCliente(){
            $data = array('idcliente'           => $this->input->post('idcliente'),
                          'nomeCliente'         => $this->input->post('nomeCliente'),
                          'rg'                  => $this->input->post('rg'),
                          'CpfCnpj'             => $this->input->post('CpfCnpj'),
                          'nascimentoCliente'   => date('Y-m-d',strtotime(str_replace('/', '-', $this->input->post('nascimentoCliente')))),
                          'email'               => $this->input->post('email'),
                          'telefone'            => $this->input->post('telefone'),
                          'sexo'                => $this->input->post('sexo'),
                          'endereco'            => $this->input->post('endereco'),
                          'numero'              => $this->input->post('numero'),
                          'complemento'         => $this->input->post('complemento'),
                          'cep'                 => $this->input->post('cep'),
                          'uf'                  => $this->input->post('uf'),
                          'cidade'              => $this->input->post('cidade'),
                          'bairro'              => $this->input->post('bairro'),
                          'ativo'               => $this->input->post('ativo'));
            $this->db->where('idcliente',$data['idcliente']);

            return $this->db->update('cliente',$data);
        }

        public function getCliente($shor = 'id',$order = 'asc', $limit = null, $offset = null){
            $termo = $this->input->post('busca');

            $this->db->select('*');
            $this->db->like('nomeCliente',$termo);
            $this->db->or_like('CpfCnpj',$termo);
            $this->db->order_by($shor,$order);
            $this->db->limit($limit,$offset);

            return $this->db->get('cliente')->result();
        }

        public function CountCliente(){
            return $this->db->count_all('cliente');
        }

        // Função de Inserção de fornecedores no banco de dados
        public function insereFornecedor(){
            $forn['nomeFantasia']           = $this->input->post('nomeFantasia');
            $forn['razaoSocial']            = $this->input->post('razaoSocial');
            $forn['cnpj']                   = $this->input->post('cnpj');
            $forn['dataCriacao']            = implode('-',array_reverse(explode('/',$this->input->post('dataCriacao'))));
            $forn['email']                  = $this->input->post('email');
            $forn['telefone']               = $this->input->post('telefone');
            $forn['endereco']               = $this->input->post('endereco');
            $forn['numero']                 = $this->input->post('numero');
            $forn['complemento']            = $this->input->post('complemento');
            $forn['cep']                    = $this->input->post('cep');
            $forn['uf']                     = $this->input->post('uf');
            $forn['cidade']                 = $this->input->post('cidade');
            $forn['bairro']                 = $this->input->post('bairro');
            $forn['ativo']                  = $this->input->post('ativo');

            return $this->db->insert('fornecedor',$forn);
        }

        // Função de Listagem dos fornecedores
        public function ListaFornecedores(){
            $this->db->select('*');
            return $this->db->get('fornecedor')->result();
        }
        
        // Função que traz todos os dados no formulário para ser atualizado
        public function atualizaForn($id=null){
            $this->db->where('idfornecedor',$id);
            return $this->db->get('fornecedor')->result();
        }
        
        // Função que recebe um array, trazendo os dados para serem atualizados
        public function atualizaFornecedor(){
            $data = array('idfornecedor'         => $this->input->post('idfornecedor'),
                          'nomeFantasia'        => $this->input->post('nomeFantasia'),
                          'razaoSocial'         => $this->input->post('razaoSocial'),
                          'cnpj'                => $this->input->post('cnpj'),
                          'dataCriacao'         => date('Y-m-d',strtotime(str_replace('/','-',$this->input->post('dataCriacao')))),
                          'email'               => $this->input->post('email'),
                          'telefone'            => $this->input->post('telefone'),
                          'endereco'            => $this->input->post('endereco'),
                          'numero'              => $this->input->post('numero'),
                          'complemento'         => $this->input->post('complemente'),
                          'cep'                 => $this->input->post('cep'),
                          'uf'                  => $this->input->post('uf'),
                          'cidade'              => $this->input->post('cidade'),
                          'bairro'              => $this->input->post('bairro'),
                          'ativo'               => $this->input->post('ativo'));

            $this->db->where('idfornecedor',$data['idfornecedor']);

            return $this->db->update('fornecedor',$data);
        }

        // Função de ativar o fornecedor!
        public function atForne($id=null){
            $this->db->set('ativo','1');
            $this->db->where('idfornecedor',$id);
            $this->db->update('fornecedor');

            return $this->db->get('fornecedor')->result();
        }

        // Função de inativar o fornecedor!
        public function inatForn($id=null){
            $this->db->set('ativo','0');
            $this->db->where('idfornecedor',$id);
            $this->db->update('fornecedor');
            return $this->db->get('fornecedor')->result();
        }

        // Função select dinâmico pra tela de produtos, trazendo todos os fornecedores!
        public function dinamicFornecedor(){
            $this->db->select('*');
            $this->db->order_by('nomeFantasia');
            return $this->db->get('fornecedor')->result();
        }
        
        public function getFornecedor($shor = 'id',$order = 'asc', $limit = null, $offset = null){
            $termo = $this->input->post('busca');

            $this->db->select('*');
            $this->db->like('nomeFantasia',$termo);
            $this->db->or_like('razaoSocial',$termo);
            $this->db->or_like('cnpj',$termo);
            $this->db->order_by($shor,$order);
            $this->db->limit($limit,$offset);

            return $this->db->get('fornecedor')->result();
        }

        public function CountFornecedor(){
            return $this->db->count_all('fornecedor');
        }

        // Função de Busca de cliente na tela de venda
        public function SearchCliente(){
            $busca = $this->input->post('busca');
            $this->db->select('*');
            $this->db->like('nomeCliente',$busca);
            $this->db->like('CpfCnpj',$busca);
            //$this->db->order('nome');

            return $this->db->get('cliente')->result();
        }
    }
?>
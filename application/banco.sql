-- CRIA O BANCO
CREATE DATABASE gerenciador;

-- USA O BANCO
USE gerenciador;

CREATE TABLE usuarios(
    idUsuario int not null auto_increment primary key,
    nomeUsuario varchar(255) not null,
    cpfUsuario varchar(14) UNIQUE not null,
    email varchar(255) UNIQUE not null,
    senha varchar(200) not null,
    id_nivel int not null,
    ativo char(1) not null,
    cadastro TIMESTAMP not null on update current_timestamp
);

-- Adicionando Regra na tabela usuarios
ALTER TABLE usuarios ADD CONSTRAINT CK_ativo CHECK(ativo in('1','0'));

insert into gerenciador.usuarios(nomeUsuario,cpfUsuario,email,senha,id_nivel,ativo)values('admin','722.113.896-60','admin@gmail.com',md5('admin123'),'1','1');
insert into gerenciador.usuarios(nomeUsuario,cpfUsuario,email,senha,id_nivel,ativo)values('gestor','432.932.377-03','gestor@gmail.com',md5('gestor123'),'2','1');
insert into gerenciador.usuarios(nomeUsuario,cpfUsuario,email,senha,id_nivel,ativo)values('funcionario','613.368.458-56','funcionario@gmail.com',md5('funcionario123'),'3','1');

/*
Login: 722.113.896-60
senha: admin123

login: 432.932.377-03
senha: gestor123

login: 613.368.458-56
senha: funcionario123
*/

-- TABELA DE NÍVEL DE ACESSO, TABELA ESTÁTICA JÁ POPULADA
CREATE TABLE nivelacesso(
    idnivel int not null primary key auto_increment,
    nivel char(1) not null,
    descricao varchar(100) not null
);

-- ALTERANDO A TABELA ACRESENTANDO A CONSTRAINT E A FOREING KEY
ALTER TABLE usuarios ADD CONSTRAINT FK_Usuario_Nivel
FOREIGN KEY(id_nivel) REFERENCES nivelacesso(idnivel);

-- Adicionando Regra na tabela nivelacesso
ALTER TABLE nivelacesso ADD CONSTRAINT CK_nivel CHECK(nivel in('A','G','F'));

-- Populando a tabela Nível
INSERT INTO nivelacesso(nivel,descricao)VALUES('A','Administrador');
INSERT INTO nivelacesso(nivel,descricao)VALUES('G','Gestor');
INSERT INTO nivelacesso(nivel,descricao)VALUES('F','Funcionário');

CREATE TABLE produto(
    idProduto int not null auto_increment primary key,
    cod_produto varchar(8) not null UNIQUE,
    nomeProduto varchar(255) not null,
    validade date not null,
    quantidade varchar(255) not null,
    descricao varchar(255) not null,
    id_categoria int not null,
    id_fornecedor int not null,
    dtcadastro datetime DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE categoria(
    idcategoria int not null primary key auto_increment,
    nomeCategoria varchar(255) not null,
    descricao varchar(150) not null,
    ativo char(1) not null,
    dtcadastro datetime not null DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE categoria ADD CONSTRAINT CK_Ativo CHECK(ativo in('1','0'));

ALTER TABLE produto ADD CONSTRAINT FK_Produto_Categoria 
FOREIGN KEY(id_categoria) REFERENCES categoria(idcategoria);

CREATE TABLE cliente(
    idcliente int not null primary key auto_increment,
    nomeCliente varchar(255) not null,
    rg varchar(10),
    CpfCnpj varchar(20) not null UNIQUE,
    nascimentoCliente date not null,
    email varchar(255) UNIQUE not null,
    senha varchar(200),
    telefone varchar(15) not null,
    sexo char(1) not null,
    endereco varchar(255) not null,
    numero varchar(10) not null,
    complemento varchar(200) null DEFAULT NULL comment 'Complemento',
    cep varchar(11) not null,
    uf char(2) not null,
    cidade varchar(150) not null,
    bairro varchar(150) not null,
    dtcadastro datetime not null DEFAULT CURRENT_TIMESTAMP,
    ativo char(1) DEFAULT '1'
);

-- Adiciona a constraint com a restrição de M ou F
ALTER TABLE cliente ADD CONSTRAINT CK_SEXO CHECK(sexo in('M','F'));

-- Adicionando Regras na tabela cliente de ativo
ALTER TABLE cliente ADD CONSTRAINT CK_ativo CHECK(ativo in('1','0'));

CREATE TABLE carrinho(
    idcompras int not null primary key auto_increment,
    nomeProduto varchar(255),
    quantidade varchar(100),
    preco float(10,2),
    id_produto int,
    id_cliente int,
    dtcadastro datetime not null DEFAULT CURRENT_TIMESTAMP
);

-- Adicionando a Constraint e a foreign key
ALTER TABLE carrinho ADD CONSTRAINT FK_Carrinho_Cliente 
FOREIGN KEY(id_cliente) REFERENCES cliente(idcliente);

-- Adicionando a Constraint e a foreign key
ALTER TABLE carrinho ADD CONSTRAINT FK_Carrinho_Produto 
FOREIGN KEY(id_produto) REFERENCES produto(idProduto);

CREATE TABLE fornecedor(
    idfornecedor int not null primary key auto_increment,
    nomeFantasia varchar(255) not null,
    razaoSocial varchar(255) not null,
    cnpj varchar(20) not null,
    dataCriacao date not null,
    email varchar(150) not null UNIQUE,
    telefone varchar(15),
    endereco varchar(100) not null,
    numero char(3) not null,
    complemento varchar(150),
    cep varchar(11) not null,
    uf char(2) not null,
    cidade varchar(100) not null,
    bairro varchar(100) not null,
    ativo char(1) not null,
    dtcadastro datetime DEFAULT CURRENT_TIMESTAMP
);

-- Adicionando Restrição ao campo ativo na tabela fornecedor
ALTER TABLE fornecedor ADD CONSTRAINT CK_ativo CHECK(ativo in('1','0'));

ALTER TABLE produto ADD CONSTRAINT FK_fornecedor_produto 
FOREIGN KEY(id_fornecedor) REFERENCES fornecedor(idfornecedor);

CREATE TABLE vendas(
    idvendas int not null primary key auto_increment,
    id_produto int,
    id_cliente int,
    valor float(10,2) not null,
    formaPagamento varchar(150) not null
);

ALTER TABLE vendas ADD CONSTRAINT FK_vendas_produto 
FOREIGN KEY(id_produto) REFERENCES produto(idproduto);

ALTER TABLE vendas ADD CONSTRAINT FK_vendas_cliente 
FOREIGN KEY(id_cliente) REFERENCES cliente(idcliente);
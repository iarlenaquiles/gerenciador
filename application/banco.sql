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
    ativo enum('1','0') not null,
    cadastro TIMESTAMP not null on update current_timestamp
);

-- TABELA DE NÍVEL DE ACESSO, TABELA ESTÁTICA JÁ POPULADA
CREATE TABLE nivelAcesso(
    idnivel int not null primary key auto_increment,
    nivel char(1) not null 
    CHECK(nivel in('A','G','F')),
    descricao varchar(100) not null
);

-- ALTERANDO A TABELA ACRESENTANDO A CONSTRAINT E A FOREING KEY
ALTER TABLE usuarios ADD CONSTRAINT FK_Usuario_Nivel
FOREIGN KEY(id_nivel) REFERENCES nivelAcesso(idnivel);

-- Populando a tabela Nível
INSERT INTO nivelAcesso(nivel,descricao)VALUES('A','Administrador');
INSERT INTO nivelAcesso(nivel,descricao)VALUES('G','Gestor');
INSERT INTO nivelAcesso(nivel,descricao)VALUES('F','Funcionário');

CREATE TABLE produto(
    idProduto int not null auto_increment primary key,
    cod_produto varchar(8) not null UNIQUE,
    nomeProduto varchar(255) not null,
    validade date not null,
    quantidade varchar(255) not null,
    descricao varchar(255) not null,
    id_categoria int not null,
    dtcadastro datetime not null DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE categoria(
    idcategoria int not null primary key auto_increment,
    nomeCategoria varchar(255) not null,
    descricao varchar(150) not null,
    dtcadastro datetime not null DEFAULT CURRENT_TIMESTAMP
);

ALTER TABLE produto ADD CONSTRAINT FK_Produto_Categoria 
FOREIGN KEY(id_categoria) REFERENCES categoria(idcategoria);

CREATE TABLE cliente(
    idcliente int not null primary key auto_increment,
    nomeCliente varchar(255) not null,
    rg varchar(10),
    CpfCnpj varchar(20) not null UNIQUE,
    nascimentoCliente date not null,
    email varchar(255) UNIQUE not null,
    telefone varchar(15) not null,
    sexo char(1) not null,
    endereco varchar(255) not null,
    numero varchar(10) not null,
    complemento varchar(200),
    cep varchar(11) not null,
    uf char(2) not null,
    cidade varchar(150) not null,
    bairro varchar(150) not null,
    dtcadastro datetime not null DEFAULT CURRENT_TIMESTAMP,
    dtAlteraCad datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- campo provisório
);

ALTER TABLE cliente ADD CONSTRAINT CK_SEXO CHECK(sexo in('M','F')); -- Adiciona a constraint com a restrição de M ou F

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
    dtcadastro datetime DEFAULT CURRENT_TIMESTAMP
);


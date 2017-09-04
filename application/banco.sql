-- CRIA O BANCO
CREATE DATABASE gerenciador;

-- USA O BANCO
USE gerenciador;

CREATE TABLE usuarios(
    idUsuario int not null auto_increment primary key,
    nomeUsuario varchar(255) not null,
    cpfUsuario varchar(11) UNIQUE not null,
    email varchar(255) UNIQUE not null,
    senha varchar(200) not null,
    nivelAcesso ENUM('A','G','F') not null,
    ativo enum('1','0') not null,
    cadastro TIMESTAMP not null on update current_timestamp
);


CREATE TABLE produto(
    idProduto int not null auto_increment primary key,
    cod_produto varchar(8) not null UNIQUE,
    nomeProduto varchar(255) not null,
    cadastro timestamp not null on update current_timestamp,
    validade date not null,
    quantidade varchar(255) not null,
    descricao varchar(255) not null
);

CREATE TABLE cliente(
    idcliente int not null primary key auto_increment,
    nomeCliente varchar(255) not null,
    rg varchar(10),
    CpfCnpj varchar(20) not null UNIQUE,
    nascimentoCliente date not null,
    email varchar(255) UNIQUE not null,
    telefone varchar(12) not null,
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

ALTER TABLE cliente ADD CONSTRAINT CK_SEXO CHECK(sexo in('M','F'));
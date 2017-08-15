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
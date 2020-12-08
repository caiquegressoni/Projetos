drop database if exists projetoArnaldo;
create database projetoArnaldo;
use projetoArnaldo;

create table Produtos(
    id_prod integer not null auto_increment,
    nome varchar(40) not null,
    descricao varchar(200) not null,
    preco decimal(6,2) not null,
    quantidade integer not null,
    primary key(id_prod) 
);
create table Compras(
    numComp integer auto_increment not null,
    nome varchar(40) not null,
    codProd integer not null,
    data Date not null,
    quantidade integer not null,
    preco decimal(6,2) not null,
    primary key(numComp)
);
create table Vendas(
    numVenda integer auto_increment not null,
    nome varchar(40) not null,
    codProd integer auto_increment not null,
    data Date not null,
    quantidade integer not null,
    preco decimal(6,2) not null,
)
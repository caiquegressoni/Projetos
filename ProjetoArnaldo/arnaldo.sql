drop database if exists projetoArnaldo;
create database projetoArnaldo;
use projetoArnaldo;

create table Produtos(
    id_prod integer not null auto_increment,
    nome varchar(40) not null,
    descricao varchar(200) not null,
    preco decimal(6,2) not null,
    estoque integer not null,
    primary key(id_prod) 
);
create table Compras(
    numComp integer auto_increment not null,
    data Date not null,
    nome varchar(40) not null,
    descricao varchar(200) not null,
    codProd integer not null,
    custo decimal(6,2) not null,
    quantidade integer not null,
    primary key(numComp),
    constraint fk_cod_prod foreign key (codProd)
    references Produtos(id_prod)
);
create table Vendas(
    numVenda integer auto_increment not null,
    nome varchar(40) not null,
    codProd integer not null,
    data Date not null,
    quantidade integer not null,
    preco decimal(6,2) not null,
    primary key(numVenda),
    constraint fk_cod_vendas
    foreign key (codProd)
    references Produtos(id_prod)
);

insert into Produtos values
(default,"Camiseta","Camiseta polo",50, 100),
(default,"Bermuda","Bermuda jeans",30, 60),
(default,"Calça","Calça moleton",41.90, 30),
(default,"Calça","Calça jeans",55, 70),
(default,"Blusa","Blusa moleton",90, 110);

insert into Compras values
(default,Now(),"Calça","Calça moleton",3,20.95,40),
(default,Now(),"Calça","Calça moleton",4,27.50,20),

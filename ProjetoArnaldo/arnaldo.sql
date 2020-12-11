drop database if exists arnaldo;
create database arnaldo;
use arnaldo;

create table Produtos(
    cod integer primary key auto_increment not null,
    nome varchar(40) not null,
    descricao varchar(200) not null,
    valor decimal(6,2) not null,
    quantidade integer not null
);

create table Compras(
    cod integer auto_increment not null,
    data timestamp not null,
    codProduto integer not null,
    custo decimal(6,2) not null,
    quantidade integer not null,
    primary key(cod)
);

create table Vendas(
    cod integer auto_increment not null,
    codProduto integer not null,
    preco decimal(6,2) not null,
    quantidade integer not null,
    primary key(cod),
    constraint fk_cod_vendas 
    foreign key (codProduto)
    references Produtos(cod)
);

describe Produtos;
describe Compras;
describe Vendas;
show tables;

insert into Produtos values
(default,"Camiseta","Camiseta polo",50, 100),
(default,"Bermuda","Bermuda jeans",30, 60),
(default,"Calça","Calça moleton",41.90, 30),
(default,"Calça","Calça jeans",55, 70),
(default,"Blusa","Blusa moleton",90, 110);


insert into Compras values (default,NOW(),1, (select valor from Produtos where cod = 1) ,10);
insert into Compras values (default,NOW(),2, (select valor from Produtos where cod = 2) ,10);
insert into Compras values (default,NOW(),3, (select valor from Produtos where cod = 3) ,2);
insert into Compras values (default,NOW(),4, (select valor from Produtos where cod = 4) ,2);
insert into Compras values (default,NOW(),5, (select valor from Produtos where cod = 5) ,2);


insert into Vendas values (default,1, (select 1.5*custo from Compras where cod = 1) ,10);
insert into Vendas values (default,2, (select 1.5*custo from Compras where cod = 2) ,5);
insert into Vendas values (default,3, (select 1.5*custo from Compras where cod = 3) ,1);


Select * from Vendas;
Select * from Compras;
Select * from Produtos;
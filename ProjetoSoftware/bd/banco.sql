create database ProjetoSoftware;
use ProjetoSoftware;
create table cadastro(
id int primary key not null auto_increment,
nome varchar(100) not null,
email varchar(100) not null,
senha varchar(50) not null,
cpf varchar(14) not null,
rua varchar(100) not null,
numero int not null,
bairro varchar(100) not null,
cidade varchar(100) not null
);
drop database if exists arcofesta;

create database arcofesta character set utf8 collate utf8_general_ci;

use arcofesta;

create table funcionario (
	idcolaborador integer primary key auto_increment,
    nome varchar(60)not null,
    telefone varchar(15)not null,
    cep char(9) not null,
    email varchar(100)not null,
    função varchar(100)not null,
    senha varchar(255)not null,
    pix varchar (50)not null,
    cpf varchar (50)not null,
	foto varchar (255) not null);
    
create table Cliente
(
	Cpf char(12) primary key,
    nome varchar(60)not null,
    Nascimento date not null,
    telefone varchar(15)not null,
    email varchar(100)not null,
    senha varchar (100)not null);
   

create table Contrato 
(
   Numerocontrato integer primary key auto_increment,
   Dataevento date not null,
   preco double not null,	
   Tipoevento varchar(15)not null,
    cep char(9) not null,
    numero integer not null,
    complemento varchar(40)not null,
    cpf char (12) not null,
    cor_uniforme varchar (40) not null,
    Tempo_evento varchar (9) not null,
        foreign key(Cpf)references cliente(Cpf),
		foreign key(idcolaborador)references funcionario (idcolaborador));

 create table Item

 (
iditem integer primary key,
Idcolaborador integer not null,
Quantidade integer  not null,
Numerocontrato int not null,
preco double not null;
foreign key(idcolaborador)references funcionario (idcolaborador),
foreign key(Numerocontrato)references Contrato (Numerocontrato);

)

insert into funcionario(nome,telefone,cep,email,função,senha,pix,cpf,foto)VALUES
('Jhon Lennon Ribeiro','21981454753','23058002','jlennon1989.jrl@gmail.com','garçom','123','12345678910','123456789'),
insert into Cliente (Cpf,nome,nascimento,telefone,email,senha)VALUES
('05841983709','Marina','12/10/1990','21972122211','prof.marina.geo@gmail.com','123')

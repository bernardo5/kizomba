drop table if exists organizado;
drop table if exists constituido;
drop table if exists Promove;
drop table if exists toca;
drop table if exists Aula_aberta;
drop table if exists aula;
drop table if exists festa;
drop table if exists Entidade_organizadora;
drop table if exists festival;
drop table if exists RP;
drop table if exists DJ;
drop table if exists Professor;
drop table if exists Pessoa;
drop table if exists Escola_danca;


create table Escola_danca(
	nome varchar(255),
	morada varchar(255),
	cidade varchar(255),
	primary key(nome));

create table Pessoa(
	nome varchar(255),
	primary key(nome));

create table Professor(
	nome varchar(255),
	pais varchar(255),
	estilo varchar(255),
	primary key(nome),
	foreign key(nome) references Pessoa(nome));

create table DJ(
	nome varchar(255),
	primary key(nome),
	foreign key(nome) references Pessoa(nome));

create table RP(
	nome varchar(255),
	contacto integer,
	primary key(nome),
	foreign key(nome) references Pessoa(nome));
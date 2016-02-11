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

create table festival(
	nome varchar(255),
	pais varchar(255),
	cidade varchar(255),
	preco decimal(5,2),
	inicio date,
	fim date,
	check(start<=end),
	primary key(nome));

create table Entidade_organizadora(
	nome varchar(255),
	descricao varchar(255),
	primary key(nome));

create table festa(
	nome_entidade varchar(255),
	nome_festa varchar(255),
	data_inicio timestamp,
	data_fim timestamp,
	local varchar(255),
	descricao varchar(255),
	custo decimal(5,2),
	primary key(nome_entidade, nome_festa),
	foreign key(nome_entidade) references Entidade_organizadora(nome));

create table aula(
	nome_escola varchar(255),
	nome_prof varchar(255),
	dia_semana varchar(255),
	estilo varchar(255),
	preco decimal(5,2),
	nivel varchar(255),
	primary key(nome_escola, nome_prof),
	foreign key(nome_escola) references Escola_danca(nome),
	foreign key(nome_prof) references Professor(nome));

create table Aula_aberta(
	nome_prof varchar(255),
	nome_entidade varchar(255),
	nome_festa varchar(255),
	primary key(nome_prof, nome_entidade, nome_festa),
	foreign key(nome_prof) references Professor(nome),
	foreign key(nome_entidade, nome_festa) references festa(nome_entidade, nome_festa));

create table toca(
	nome_dj varchar(255),
	nome_entidade varchar(255),
	nome_festa varchar(255),
	primary key(nome_dj, nome_entidade, nome_festa),
	foreign key(nome_entidade, nome_festa) references festa(nome_entidade, nome_festa),
	foreign key(nome_dj) references DJ(nome));

create table Promove(
	nome_rp varchar(255),
	nome_entidade varchar(255),
	nome_festa varchar(255),
	primary key(noma_rp, nome_entidade, nome_festa),
	foreign key(noma_rp) references RP(nome),
	foreign key(nome_entidade, nome_festa) references festa(nome_entidade, nome_festa));

create table constituido(
	nome_pessoa varchar(255),
	nome_festival varchar(255),
	primary key(nome_pessoa, nome_festival),
	foreign key(nome_pessoa) references Pessoa(nome),
	foreign key(nome_festival) references festival(nome));

create table organizado(
	nome_festival varchar(255),
	nome_entidade varchar(255),
	primary key(nome_festival, nome_entidade),
	foreign key(nome_festival) references festival(nome),
	foreign key(nome_entidade) references Entidade_organizadora(nome));
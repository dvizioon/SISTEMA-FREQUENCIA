create database sistema_frequencia;
use sistema_frequencia;

create table Administrador(
id_admin int not null auto_increment primary key,
Nome_adm varchar (50) not null,
Cpf_adm varchar(50) not null,
senha_adm varchar(50)not null,
setor_adm varchar(60)not null,
sesao_adm varchar(60)not null,
Ativo varchar(50) not null
);
create table professor(
id_proff int not null auto_increment primary key,
Nome_proff varchar (50) not null,
Cpf_proff varchar(50) not null,
senha_proff varchar(50)not null,
Ativo_proff varchar(60)not null,
curso varchar(50) not null,
sala varchar(50) not null,
Turno varchar(50) not null,
sessao varchar(50) not null
);
create table aluno(
id_aluno int not null auto_increment primary key,
Nome_aluno varchar (50) not null,
Cpf_aluno varchar(50) not null,
Ativo_aluno varchar(60)not null,
curso varchar(50) not null,
sala varchar(50) not null,
senha_aluno varchar(50) not null,
Turno varchar(50) not null,
sessao_aluno varchar(50) not null
);


create table frequencia(
id_aluno int not null auto_increment primary key,
Nome_aluno varchar (50) not null,
Cpf_aluno varchar(50) not null,
curso varchar(50) not null,
datafr varchar(50) not null,
hora varchar(50) not null,
sala varchar(50) not null,
Turno varchar(50) not null,
presenca varchar(50) default 'F'
);

INSERT INTO Administrador(Nome_adm, Cpf_adm,senha_adm, setor_adm, sesao_adm, Ativo)  VALUES('admin','00011100011','12345678','administracao','Inativo',CURRENT_TIMESTAMP());


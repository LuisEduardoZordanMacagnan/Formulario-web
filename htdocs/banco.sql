create database web;

use web;

create table usuario ( id int primary key auto_increment, email varchar(30) not null, senha varchar(200) not null, nome varchar(20) not null);
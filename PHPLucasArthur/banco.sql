create database BDteste2;


use BDteste2;

create table Tbteste(
codi_t int primary key auto_increment,
name_t varchar(40) not null,
email_t varchar(30) not null,
senha_t varchar(8) not null,
sexo_t char(1),
data_t date
);

select * from Tbteste;

Alter table Tbteste
add column data_t datetime;


drop table Tbteste;

describe Tbteste;



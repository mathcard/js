create table cliente (
id integer AUTO_INCREMENT,
nome varchar(50) not null,
profissao varchar(35) not null,
rg varchar(7) not null,
cpf varchar(11) not null,
fone1 varchar(15) not null,
fone2 varchar(15) not null,
email varchar(80) not null,
cep integer not null,
logradouro varchar(60) not null,
numero integer not null,
complemento varchar(60) null,
bairro varchar(40) not null,
cidade varchar(50) not null,
PRIMARY KEY(id)
);

create table contrato(
num varchar(12) not null,
idcliente integer not null,
dataassinatura date not null,
dataevento date not null,
pessoascont integer not null,
pessoaspres integer not null,
valor double(10,2) not null,
parcelascadastradas boolean not null,
PRIMARY KEY (num)
);

create table parcelas(
registro integer AUTO_INCREMENT,
numcont varchar(12) not null,
parcela integer not null,
dataemissao date not null,
datavenc date not null,
valorparc double(10,2) not null,
formapg varchar(20) not null,
datapg date,
valorreb double(10,2),
userid integer,
PRIMARY KEY (registro)
);

create table usuario (
id integer AUTO_INCREMENT,
login varchar(20) not null unique,
nome varchar(50) not null,
senha varchar(80) not null,
tipo char(1) not null, 
primary key (id)
);

create table acrescimo (
id integer AUTO_INCREMENT,
numcont varchar(12) not null,
valorparc double(10,2) not null,
descricao varchar(50),
primary key (id)
);

create table fornecedor (
id integer AUTO_INCREMENT,
nome varchar(50) not null,
atendente varchar(40) not null,
descricao varchar(60) not null,
fone1 varchar(15) not null,
fone2 varchar(15) not null,
email varchar(80) not null,
cep integer not null,
logradouro varchar(60) not null,
numero integer not null,
complemento varchar(60) null,
bairro varchar(40) not null,
cidade varchar(50) not null,
PRIMARY KEY(id)
);

create table bem (
id integer AUTO_INCREMENT,
nome varchar(50) not null,
descricao varchar(80) not null,
dtaquisicao date not null,
valor double(10,2) not null,
PRIMARY KEY(id)
);

create table servicos(
id integer AUTO_INCREMENT,
numcont varchar(12) not null,
idforn integer not null,
idbem integer not null,
descricao varchar(80) not null,
dataexec date not null,
valor double(10,2) not null,
PRIMARY KEY(id)
);

create table contasapagar(
registro integer AUTO_INCREMENT,
numcont varchar(12) not null,
idforn integer not null,
parcela integer not null,
dataemissao date not null,
datavenc date not null,
valorparc double(10,2) not null,
formapg varchar(20) not null,
datapg date,
valorreb double(10,2),
userid integer,
PRIMARY KEY (registro)
);


alter table servicos add constraint serv_bem_fk
foreign key (idbem)
references bem(id);

alter table servicos add constraint serv_forn_fk
foreign key (idforn)
references fornecedor(id);

alter table acrescimo add constraint acrescimo_contrato_fk
foreign key (numcont)
references contrato(num);

alter table parcelas add constraint parcelas_contrato_fk
foreign key (numcont)
references contrato(num);

alter table contrato add constraint contrato_cliente_fk
foreign key(idcliente)
references cliente(id);

alter table parcelas add constraint parcelas_user_fk
foreign key (userid)
references usuario(id);

insert into usuario values
(DEFAULT, 'admin', 'admin', md5('123'), 'A');

insert into cliente values
(DEFAULT, 'Joao Leite', 'Empresario', 8780600, 80021322205, '(62)99276-1418', '(62)993780010', 'teste@hotmail.com', 76170000, 'Rua 10', 23, 'Qd10 Lt10', 'Marista', 'Goiania'),
(DEFAULT, 'Math Crack', 'Empresario', 8788990, 80093322245, '(62)99276-1448', '(62)992542014', 'teste@hotmail.com', 76170000, 'Rua 10', 20, 'Qd10 Lt10', 'Jd New World', 'Goiania'),
(DEFAULT, 'Juca Tais', 'Professor', 8780990, 80093322205, '(62)99386-1411', '(62)992682014', 'teste@hotmail.com', 76170000, 'Rua 10', 23, 'Qd10 Lt10', 'Marista', 'Goiania'),
(DEFAULT, 'Paula Catita', 'Medica', 8780990, 80093322205, '(62)99386-1442', '(62)993754014', 'teste@hotmail.com', 76170000, 'Rua 10', 20, 'Qd10 Lt10', 'Jd New World', 'Goiania');

insert into contrato values
('0012018', 2, '2018-05-04', '2019-10-03', 300, 280, 25000.00, true),
('0022018', 1, '2018-05-04', '2022-10-03', 300, 280, 33000.00, true),
('0032018', 4, '2018-07-19', '2019-11-23', 300, 280, 10000.00, true),
('0042018', 3, '2018-06-02', '2022-11-15', 300, 280, 100000.00, true),
('0052018', 1, '2018-05-04', '2019-10-03', 1300, 1280, 95000.00, false);

insert into parcelas values
(DEFAULT, '0012018', 1, '2018-05-10', '2018-10-10', 10000.00, 'cheque', NULL, NULL, NULL),
(DEFAULT, '0012018', 2, '2018-05-10', '2018-10-10', 10000.00, 'cheque', NULL, NULL, NULL),
(DEFAULT, '0012018', 3, '2018-05-10', '2018-10-10', 5000.00, 'cheque', NULL, NULL, NULL),
(DEFAULT, '0022018', 1, '2018-04-10', '2018-10-10', 10000.00, 'cheque', NULL, NULL, NULL),
(DEFAULT, '0022018', 2, '2018-04-10', '2019-02-10', 10000.00, 'cheque', NULL, NULL, NULL),
(DEFAULT, '0022018', 3, '2018-04-10', '2019-05-10', 13000.00, 'cheque', NULL, NULL, NULL),
(DEFAULT, '0032018', 1, '2018-03-10', '2018-05-10', 1000.00, 'Dinheiro', NULL, NULL, NULL),
(DEFAULT, '0032018', 2, '2018-03-10', '2018-06-10', 1000.00, 'Dinheiro', NULL, NULL, NULL),
(DEFAULT, '0032018', 3, '2018-03-10', '2018-07-10', 1000.00, 'Dinheiro', NULL, NULL, NULL),
(DEFAULT, '0032018', 4, '2018-03-10', '2018-08-10', 1000.00, 'Dinheiro', NULL, NULL, NULL),
(DEFAULT, '0032018', 5, '2018-03-10', '2018-09-10', 1000.00, 'Dinheiro', NULL, NULL, NULL),
(DEFAULT, '0032018', 6, '2018-03-10', '2018-10-10', 1000.00, 'Dinheiro', NULL, NULL, NULL),
(DEFAULT, '0032018', 7, '2018-03-10', '2018-11-10', 1000.00, 'Dinheiro', NULL, NULL, NULL),
(DEFAULT, '0032018', 8, '2018-03-10', '2018-12-10', 1000.00, 'Dinheiro', NULL, NULL, NULL),
(DEFAULT, '0032018', 9, '2018-03-10', '2019-01-10', 1000.00, 'Dinheiro', NULL, NULL, NULL),
(DEFAULT, '0032018', 10, '2018-03-10', '2019-02-10', 1000.00, 'Dinheiro', NULL, NULL, NULL),
(DEFAULT, '0042018', 1, '2018-03-10', '2018-05-10', 10000.00, 'Dinheiro', NULL, NULL, NULL),
(DEFAULT, '0042018', 2, '2018-03-10', '2018-06-10', 10000.00, 'Dinheiro', NULL, NULL, NULL),
(DEFAULT, '0042018', 3, '2018-03-10', '2018-07-10', 10000.00, 'Dinheiro', NULL, NULL, NULL),
(DEFAULT, '0042018', 4, '2018-03-10', '2018-08-10', 10000.00, 'Dinheiro', NULL, NULL, NULL),
(DEFAULT, '0042018', 5, '2018-03-10', '2018-09-10', 10000.00, 'Dinheiro', NULL, NULL, NULL),
(DEFAULT, '0042018', 6, '2018-03-10', '2018-10-10', 10000.00, 'Dinheiro', NULL, NULL, NULL),
(DEFAULT, '0042018', 7, '2018-03-10', '2018-11-10', 10000.00, 'Dinheiro', NULL, NULL, NULL),
(DEFAULT, '0042018', 8, '2018-03-10', '2018-12-10', 10000.00, 'Dinheiro', NULL, NULL, NULL),
(DEFAULT, '0042018', 9, '2018-03-10', '2019-01-10', 10000.00, 'Dinheiro', NULL, NULL, NULL),
(DEFAULT, '0042018', 10, '2018-03-10', '2019-02-10', 10000.00, 'Dinheiro', NULL, NULL, NULL);

insert into fornecedor values
(DEFAULT, 'Celg', 'JuJu', 'Energia', '(62)99276-1418', '(62)993780010', 'teste@hotmail.com', 76170000, 'Rua 10', 23, 'Qd10 Lt10', 'Marista', 'Goiania'),
(DEFAULT, 'Casa de Carne Olibera', 'Marta', 'Frios', '(62)99276-1448', '(62)992542014', 'teste@hotmail.com', 76170000, 'Rua 10', 20, 'Qd10 Lt10', 'Jd New World', 'Goiania'),
(DEFAULT, 'X-Machine', 'Mauricio', 'Camara Fria', '(62)99386-1411', '(62)992682014', 'teste@hotmail.com', 76170000, 'Rua 10', 23, 'Qd10 Lt10', 'Marista', 'Goiania');

insert into bem values
(DEFAULT, 'Camara Fria', 'Lugar onde é guardado os frios', '2018-05-10', 15000.00),
(DEFAULT, 'Caixa de Som', 'Equipamentos de Som', '2018-05-04', 6700.000);
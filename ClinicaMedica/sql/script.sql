create table clinicamedica.funcionario(
	Id integer(5) auto_increment,
    Nome varchar(40),
    DataNasc date,
    Sexo integer,
    EstadoCivil varchar(20),
    Cargo varchar(30),
    Especialidade varchar(30),
    CPF char(11),
    RG varchar(14),
    Outro varchar(20),
    primary key (Id, CPF)
)

create table clinicamedica.EnderecoFunc(
	CodEndereco integer(5) auto_increment primary key,
    CEP char(8),
    TipoLogradouro varchar(15),
    Logradouro varchar(60),
    Numero integer,
    Complemento varchar(100),
    Bairro varchar(30),
    Cidade varchar(30),
    Estado varchar(30),
    Id integer(5),
    foreign key (Id) references clinicamedica.funcionario (Id)
)

create table clinicamedica.contato(
	Id integer(5) auto_increment primary key,
    Nome varchar(30),
    Email varchar(60),
    Motivo varchar(25),
    Mensagem varchar(200)
)

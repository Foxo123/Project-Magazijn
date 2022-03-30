drop database Magazijn;

create database Magazijn;
use Magazijn;

create table Category (
	category varchar(255) not null,
    PRIMARY KEY (category)
);

create table Artikel (
		artikelid int not null AUTO_INCREMENT,
        omschrijving varchar(255) not null,
        category varchar(255) not null,
        aantal int not null,
        kosten float,
        locatie varchar(255),
        geleend bit,
        PRIMARY KEY (artikelid),
        FOREIGN KEY (category) REFERENCES Category(category)
        
 );

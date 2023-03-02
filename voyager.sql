drop database if exists voyager;
create database voyager charset utf8mb4;
use voyager;

create table operator
(
    sifra   int         not null primary key auto_increment,
    ime     varchar(50) not null,
    prezime varchar(50) not null,
    email   varchar(50) not null,
    lozinka char(61)    not null
);

create table department
(
    odjel_id  int         not null auto_increment primary key,
    naziv     varchar(50) not null,
    broj_soba int
);

create table patient
(
    pacijent_id int not null auto_increment primary key,
    ime         varchar(50),
    prezime     varchar(50),
    adresa      varchar(255),
    oib         char(11),
    doktor_id   int
);

create table doctor
(
    doktor_id       int not null auto_increment primary key,
    ime             varchar(50),
    prezime         varchar(50),
    specijalizacija varchar(50),
    oib             char(11),
    odjel_id        int
);

create table medical_record
(
    medicinski_karton_id int not null auto_increment primary key,
    datum_pregleda       datetime,
    dijagnoza            varchar(255),
    pacijent_id          int
);

create table patient_visitor
(
    posjeta_id          int not null auto_increment primary key,
    datum               datetime,
    pacijent_id         int,
    posjetitelj_id      int,
    max_trajanje_minute int
);

create table visitor
(
    posjetitelj_id  int not null auto_increment primary key,
    ime             varchar(50),
    prezime         varchar(50),
    adresa          varchar(50),
    telefonski_broj int
);

alter table patient
    add foreign key (doktor_id) references doctor (doktor_id);

alter table patient_visitor
    add foreign key (pacijent_id) references patient (pacijent_id);
alter table patient_visitor
    add foreign key (posjetitelj_id) references visitor (posjetitelj_id);

alter table medical_record
    add foreign key (pacijent_id) references patient (pacijent_id);

alter table doctor
    add foreign key (odjel_id) references department (odjel_id);


insert into operator (ime, prezime, email, lozinka)
values ('Luka', 'Operator', 'luka@gmail.com',
        '$2y$10$vlnbKWhdDvVDIkR1R8PAseVYQK8ZwbrcwUCTChjFp6zsR3vLKkCoe');

insert into department (naziv, broj_soba)
values ('Kardiologija', 15);
insert into department (naziv, broj_soba)
values ('Psihijatrija', 1);
insert into department (naziv, broj_soba)
values ('Neurologija', 5);



insert into doctor (ime, prezime, specijalizacija, oib, odjel_id)
values ('Imzo', 'Prezimic', 'Kardiologija', 45798462514, 1);
insert into doctor (ime, prezime, specijalizacija, oib, odjel_id)
values ('Hrvoje', 'Samic', 'Psihijatrija', 45798212514, 2);
insert into doctor (ime, prezime, specijalizacija, oib, odjel_id)
values ('Gojka', 'Prezimic', 'Neurologija', 45298462514, 3);

insert into patient (ime, prezime, adresa, oib, doktor_id)
values ('Marko', 'Marulic', 'Trosinska 21, Silas 31011', 15487569851, 1);
insert into patient (ime, prezime, adresa, oib, doktor_id)
values ('Jovica', 'Jovic', 'B.B. Billmayera 41, Osijek 31000', 15487569851, 3);
insert into patient (ime, prezime, adresa, oib, doktor_id)
values ('Sinan', 'Sakic', ' 21, Ernestinovo 31456', 15487239851, 2);

insert into medical_record (datum_pregleda, dijagnoza, pacijent_id)
values ('2022-09-09',
        "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley",
        1);
insert into medical_record (datum_pregleda, dijagnoza, pacijent_id)
values ('2022-08-08',
        "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard",
        2);
insert into medical_record (datum_pregleda, dijagnoza, pacijent_id)
values ('2022-12-12',
        "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.",
        3);

insert into visitor (ime, prezime, adresa, telefonski_broj)
values ('Posjet', 'Kasnic', 'Ul. Inatise 76, Zupanja 32260', '098784652');
insert into visitor (ime, prezime, adresa, telefonski_broj)
values ('Lakomisl', 'Trazic', 'Idarisa Sadrisa 2, Osijek 31000', '098782352');
insert into visitor (ime, prezime, adresa, telefonski_broj)
values ('Butro', 'Rasnic', 'Trg Slobode 1, Zupanja 32260', '098784642');

insert into patient_visitor (datum, pacijent_id, posjetitelj_id, max_trajanje_minute)
values ('2022-12-09', 1, 1, 15);
insert into patient_visitor (datum, pacijent_id, posjetitelj_id, max_trajanje_minute)
values ('2022-12-08', 2, 2, 15);
insert into patient_visitor (datum, pacijent_id, posjetitelj_id, max_trajanje_minute)
values ('2022-12-07', 3, 3, 15);
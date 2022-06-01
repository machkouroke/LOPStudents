
CREATE DATABASE IF NOT EXISTS `LOPSTUDENTS`;

USE `LOPSTUDENTS`;

# la table user
CREATE TABLE IF NOT EXISTS `users`(
    `login` varchar(10) primary key ,
    `name` varchar(20),
    `surname` varchar(20),
    `password` varchar(8),
    `city` varchar(20),
    `zipCode` int,
    `country` varchar(20),
    `role` varchar(15)
) ;

#la table classe
CREATE TABLE IF NOT EXISTS `classe`(
    `faculty` varchar(5),
    `facultyYear` int,
    constraint pk_classe primary key (faculty, facultyYear)
);


# la table etudiant
CREATE TABLE IF NOT EXISTS `etudiants`(
    `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT primary key ,
    `cv` varchar(30),
    `photo` varchar(30),
    `birthDate` date,
    `faculty` varchar(5),
    `facultyYear` int,
    `login` varchar(10),
    constraint fk1_etudiant foreign key (login) references users(login),
    constraint fk2_etudiant foreign key (faculty, facultyYear) references classe(faculty, facultyYear)
) ;

#la table professeur
CREATE TABLE IF NOT EXISTS `professeur`(
    `matricule` varchar(10) primary key ,
    `login` varchar(10),
    constraint fk1_prof foreign key (login) references users(login)
);

#la table des modules provenant de la combinaison de la table prof et la table classe
CREATE TABLE IF NOT EXISTS `module`(
    `faculty` varchar(5),
    `facultyYear` int,
    `matricule` varchar(20),
    `name` varchar(20),
    constraint fk1_module foreign key (faculty, facultyYear) references classe(faculty, facultyYear),
    constraint fk2_module foreign key (matricule) references professeur(matricule)
);

INSERT INTO classe values
    ('API',1), ('API',2),('IID',1),('IID',2),('IID',3),('GI',1),('GI',2),('GI',3),('GE',1),
    ('GE',2),('GE',3),('GPEE',1),('GPEE',2),('GPEE',3),('IRIC',1),('GRT',2),('GRT',3);





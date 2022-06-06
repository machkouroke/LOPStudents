
CREATE DATABASE IF NOT EXISTS `LOPSTUDENTS`;

USE `LOPSTUDENTS`;

# la table user
CREATE TABLE IF NOT EXISTS `users`(
    `login` varchar(100) primary key ,
    `name` varchar(20),
    `surname` varchar(100),
    `password` varchar(20),
    `city` varchar(20),
    `zipCode` int,
    `country` varchar(20),
    `photo` varchar(200),
    `role` enum('admin', 'teacher', 'student')
) ;

#la table classe
CREATE TABLE IF NOT EXISTS `classe`(
    `faculty` varchar(10),
    `facultyYear` int,
    constraint pk_classe primary key (faculty, facultyYear)
);


# la table étudiant
CREATE TABLE IF NOT EXISTS `etudiants`(
    `id` int unique auto_increment,
    `cne` varchar(20)  primary key ,
    `cv` varchar(200),
    `email` varchar(100),
    `birthDate` date,
    `faculty` varchar(10),
    `facultyYear` int,
    `login` varchar(100),
    constraint fk1_etudiant foreign key (login) references users(login),
    constraint fk2_etudiant foreign key (faculty, facultyYear) references classe(faculty, facultyYear)
) ;

#la table professeur
CREATE TABLE IF NOT EXISTS `professeur`(
    `id` int unique auto_increment,
    `matricule` varchar(10) primary key ,
    `email` varchar(100),
    `login` varchar(100),
    constraint fk1_prof foreign key (login) references users(login)
);

#la table des modules provenant de la combinaison de la table prof et la table classe
CREATE TABLE IF NOT EXISTS `module`(
    `faculty` varchar(10),
    `facultyYear` int,
    `matricule` varchar(10),
    `name` varchar(20),
    constraint pkmodule primary key (faculty,facultyYear,matricule),
    constraint fk1_module foreign key (faculty, facultyYear) references classe(faculty, facultyYear),
    constraint fk2_module foreign key (matricule) references professeur(matricule)
);

INSERT INTO classe values
    ('API',1), ('API',2),('IID',1),('IID',2),('IID',3),('GI',1),('GI',2),('GI',3),('GE',1),
    ('GE',2),('GE',3),('GPEE',1),('GPEE',2),('GPEE',3),('IRIC',1),('GRT',2),('GRT',3);





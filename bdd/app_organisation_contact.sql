CREATE DATABASE app_organisation_contacts ;
USE app_organisation_contacts;

CREATE TABLE `Contacts` (
	`id_contacts` INT NOT NULL AUTO_INCREMENT,
	`nom` varchar(20) NOT NULL,
	`prenom` varchar(20) NOT NULL,
	`email` varchar(50) NOT NULL,
	`age` INT NOT NULL,
	PRIMARY KEY (`id_contacts`)
);



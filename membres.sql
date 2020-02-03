DROP TABLE COMMENTAIRES;
DROP TABLE MEMBRES;

CREATE TABLE MEMBRES (
	id int(11) NOT NULL AUTO_INCREMENT,
	pseudo varchar(20) NOT NULL,
	mail varchar(50) NOT NULL,
	password varchar(255) NOT NULL,
    rang varchar(20)  NOT NULL DEFAULT "Membre",
    dateInscription datetime NOT NULL,
    PRIMARY KEY (id)
)ENGINE = InnoDB AUTO_INCREMENT =1 DEFAULT CHARSET = utf8;

CREATE TABLE COMMENTAIRES(
    idComm int(11)  NOT NULL AUTO_INCREMENT,
    textComm TEXT NOT NULL,
    idMembre int(11) NOT NULL,
    dateComm datetime NOT NULL,
    PRIMARY KEY (idComm),
    FOREIGN KEY (idMembre) REFERENCES MEMBRES(id)
)ENGINE = InnoDB AUTO_INCREMENT =1 DEFAULT CHARSET = utf8;
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
DROP USER Agence Cascade;
CREATE USER Agence IDENTIFIED BY immo;
GRANT DBA TO Agence;
CONNECT Agence/immo;

-- User
CREATE TABLE Utilisateur(
=======
DROP USER Agence CASCADE;
CREATE USER Agence IDENTIFIED BY Agence;
GRANT CREATE TABLE TO Agence IDENTIFIED BY Agence;
GRANT CREATE SEQUENCE TO Agence IDENTIFIED BY Agence;
GRANT CREATE VIEW TO Agence IDENTIFIED BY Agence;
GRANT CONNECT,RESOURCE,UNLIMITED TABLESPACE TO Agence IDENTIFIED BY Agence;
ALTER USER Agence DEFAULT TABLESPACE USERS;
ALTER USER Agence TEMPORARY TABLESPACE TEMP;

CONNECT Agence/Agence;

-- User
CREATE TABLE Users(
>>>>>>> cc79a8e8a2def5e6c3d9b375e80623418f9c7e05
=======
CREATE USER Agence identified BY immo;
GRANT dba to Agence;
Connect Agence/immo; 
=======
CREATE USER Agence identified by immo;
GRANT dba TO Agence;
CONNECT Agence/immo;
>>>>>>> Arena

-- User
CREATE TABLE Utilisateur(
>>>>>>> Arena
    id_U INTEGER PRIMARY KEY,
    email VARCHAR(30),
    nom VARCHAR(30),
    mdp   VARCHAR(30),
    num   VARCHAR(30)
);
<<<<<<< HEAD
<<<<<<< HEAD
CREATE OR REPLACE VIEW id_utilisateur  AS SELECT COUNT(*)+1 c FROM Utilisateur;

INSERT INTO Utilisateur VALUES((SELECT *FROM id_utilisateur),'Arena','arena@gmail.com','arena1','032 41 456 89');
INSERT INTO Utilisateur VALUES((SELECT *FROM id_utilisateur),'Nancy','nancy@gmail.com','nancy','032 42 456 89');
INSERT INTO Utilisateur VALUES((SELECT *FROM id_utilisateur),'David','david@gmail.com','david','032 43 456 89');
INSERT INTO Utilisateur VALUES((SELECT *FROM id_utilisateur),'Johan','johan@gmail.com','johan','032 44 456 89');
=======
DROP VIEW id_user;
CREATE VIEW id_user  AS SELECT (COUNT(*)+1) AS id_U FROM Users;

INSERT INTO Users VALUES((SELECT *FROM id_user),'Arena','arena@gmail.com','arena','032 41 456 89');
INSERT INTO Users VALUES((SELECT *FROM id_user),'Nancy','nancy@gmail.com','nancy','032 42 456 89');
INSERT INTO Users VALUES((SELECT *FROM id_user),'David','david@gmail.com','david','032 43 456 89');
INSERT INTO Users VALUES((SELECT *FROM id_user),'Johan','johan@gmail.com','johan','032 44 456 89');
>>>>>>> cc79a8e8a2def5e6c3d9b375e80623418f9c7e05
=======

CREATE OR REPLACE VIEW id_utilisateur  AS SELECT COUNT(*)+1 c FROM Utilisateur;

INSERT INTO Utilisateur VALUES((SELECT *FROM id_utilisateur),'Arena','arena@gmail.com','arena','032 41 456 89');
INSERT INTO Utilisateur VALUES((SELECT *FROM id_utilisateur),'Nancy','nancy@gmail.com','nancy','032 42 456 89');
INSERT INTO Utilisateur VALUES((SELECT *FROM id_utilisateur),'David','david@gmail.com','david','032 43 456 89');
INSERT INTO Utilisateur VALUES((SELECT *FROM id_utilisateur),'Johan','johan@gmail.com','johan','032 44 456 89');
>>>>>>> Arena


-- SuperUser
CREATE TABLE SuperUser(
    id_Su INTEGER PRIMARY KEY,
    email VARCHAR(30),
    nom VARCHAR(30),
    mdp   VARCHAR(30),
    num  VARCHAR(30)  
);
<<<<<<< HEAD
<<<<<<< HEAD

CREATE OR REPLACE VIEW id_SuperUser  AS SELECT COUNT(*)+1 c FROM SuperUser;

=======
DROP VIEW id_SuperUser;
CREATE VIEW id_SuperUser  AS SELECT (COUNT(*)+1) AS id_Su FROM SuperUser;

>>>>>>> cc79a8e8a2def5e6c3d9b375e80623418f9c7e05
=======

CREATE OR REPLACE VIEW id_SuperUser  AS SELECT COUNT(*)+1 c FROM SuperUser;

>>>>>>> Arena
INSERT INTO SuperUser VALUES((SELECT *FROM id_SuperUser),'Mimi','mimi@gmail.com','mimi','034 12 123 45');

-- Type Habitations
CREATE TABLE Type_h(
    id_t INTEGER PRIMARY KEY,
    nom VARCHAR(30)    
);
<<<<<<< HEAD
<<<<<<< HEAD

CREATE OR REPLACE VIEW id_type AS SELECT COUNT(*)+1 c FROM Type_h;

=======
DROP VIEW id_type;
CREATE VIEW id_type AS SELECT (COUNT(*)+1) AS id_t FROM Type_h;

>>>>>>> cc79a8e8a2def5e6c3d9b375e80623418f9c7e05
=======

CREATE OR REPLACE VIEW id_type AS SELECT COUNT(*)+1 c FROM Type_h;

>>>>>>> Arena
INSERT INTO Type_h VALUES((SELECT *FROM id_type),'Maison');
INSERT INTO Type_h VALUES((SELECT *FROM id_type),'Studio');
INSERT INTO Type_h VALUES((SELECT *FROM id_type),'Appartements');

-- Habitations
CREATE TABLE Habitation(
    id_h INTEGER PRIMARY KEY,
    id_t INTEGER,
    nb_chambre INTEGER,
    quartier VARCHAR(50),
    FOREIGN KEY (id_t) REFERENCES Type_h(id_t) 
);
<<<<<<< HEAD
<<<<<<< HEAD

CREATE OR REPLACE VIEW id_habit AS SELECT COUNT(*)+1 c FROM Habitation;

=======
DROP VIEW id_habit;
CREATE VIEW id_habit AS SELECT (COUNT(*)+1) AS id_h FROM Habitation;

>>>>>>> cc79a8e8a2def5e6c3d9b375e80623418f9c7e05
=======

CREATE OR REPLACE VIEW id_habit AS SELECT COUNT(*)+1 c FROM Habitation;

>>>>>>> Arena
INSERT INTO Habitation VALUES((SELECT *FROM id_habit),1,2,'Antananarivo');
INSERT INTO Habitation VALUES((SELECT *FROM id_habit),3,4,'Antsirabe');

-- Photo habitation
CREATE TABLE Photo_h(
    id_h INTEGER,
    nom_p VARCHAR(30),
    FOREIGN KEY (id_h) REFERENCES Habitation(id_h)
);

CREATE TABLE Loyer(
    id_h INTEGER,
    montant DECIMAL(7,2),
    daty Date,
    FOREIGN KEY (id_h) REFERENCES Habitation(id_h)
);

CREATE TABLE description_h(
    id_h INTEGER,
    descriptions VARCHAR(200),
    FOREIGN KEY (id_h) REFERENCES Habitation(id_h)
);

CREATE TABLE Reservation(
    id_r INTEGER PRIMARY KEY,
    id_h INTEGER,
    arriver TIMESTAMP,
    depart TIMESTAMP,
    nb_personne INTEGER
<<<<<<< HEAD
);
=======
);



COMMIT;

>>>>>>> cc79a8e8a2def5e6c3d9b375e80623418f9c7e05

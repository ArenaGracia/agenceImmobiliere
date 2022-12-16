DROP DATABASE Agence;
CREATE DATABASE Agence;
USE Agence;

-- User
CREATE TABLE User(
    id_U INTEGER PRIMARY KEY,
    nom VARCHAR(30),
    email VARCHAR(30),
    mdp   VARCHAR(30),
    num  VARCHAR(30)
);
DROP VIEW id_user;
CREATE VIEW id_user  AS SELECT COUNT(*)+1 c FROM User;

INSERT INTO User VALUES((SELECT *FROM id_user),"Arena","arena@gmail.com","arena","032 41 456 89");
INSERT INTO User VALUES((SELECT *FROM id_user),"Nancy","nancy@gmail.com","nancy","032 42 456 89");
INSERT INTO User VALUES((SELECT *FROM id_user),"David","david@gmail.com","david","032 43 456 89");
INSERT INTO User VALUES((SELECT *FROM id_user),"Johan","johan@gmail.com","johan","032 44 456 89");


-- SuperUser
CREATE TABLE SuperUser(
    id_Su INTEGER PRIMARY KEY,
    nom VARCHAR(30),
    email VARCHAR(30),
    mdp   VARCHAR(30),
    num  VARCHAR(30)  
);
DROP VIEW id_SuperUser;
CREATE VIEW id_SuperUser  AS SELECT COUNT(*)+1 c FROM SuperUser;

INSERT INTO SuperUser VALUES((SELECT *FROM id_SuperUser),"Mimi","mimi@gmail.com","mimi","034 12 123 45");

-- Type Habitations
CREATE TABLE Type_h(
    id_t INTEGER PRIMARY KEY,
    nom VARCHAR(30)    
);
DROP VIEW id_type;
CREATE VIEW id_type AS SELECT COUNT(*)+1 c FROM Type_h;

INSERT INTO Type_h VALUES((SELECT *FROM id_type),"Maison");
INSERT INTO Type_h VALUES((SELECT *FROM id_type),"Studio");
INSERT INTO Type_h VALUES((SELECT *FROM id_type),"Appartements");

-- Habitations
CREATE TABLE Habitation(
    id_h INTEGER PRIMARY KEY,
    id_t INTEGER,
    nb_chambre INTEGER,
    quartier VARCHAR(50),
    FOREIGN KEY (id_t) REFERENCES Habitation(id_t) 
);
DROP VIEW id_habit;
CREATE VIEW id_habit AS SELECT COUNT(*)+1 c FROM Habitation;

INSERT INTO Habitation VALUES((SELECT *FROM id_habit),1,2,"Antananarivo");
INSERT INTO Habitation VALUES((SELECT *FROM id_habit),3,4,"Antsirabe");

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
DELETE FROM Loyer;
INSERT INTO Loyer VALUES(1,10000,'2022-10-10');
INSERT INTO Loyer VALUES(1,10000,'2022-10-11');
INSERT INTO Loyer VALUES(1,10000,'2022-10-12');
INSERT INTO Loyer VALUES(1,10000,'2022-10-13');
INSERT INTO Loyer VALUES(1,10000,'2022-10-14');

INSERT INTO Loyer VALUES(2,30000,'2022-10-10');
INSERT INTO Loyer VALUES(2,30000,'2022-10-11');

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
);
CREATE OR REPLACE VIEW id_r AS SELECT COUNT(*)+1 c FROM Reservation;

DELETE FROM reservation;
INSERT INTO reservation VALUES((SELECT *FROM id_r),2,'2022-10-10','2023-12-20',12);
INSERT INTO reservation VALUES((SELECT *FROM id_r),1,'2022-01-10','2022-12-20',12);
INSERT INTO reservation VALUES((SELECT *FROM id_r),1,'2022-01-10','2022-12-20',12);
INSERT INTO reservation VALUES((SELECT *FROM id_r),1,'2022-01-10','2022-12-20',12);
INSERT INTO reservation VALUES((SELECT *FROM id_r),1,'2022-01-10','2022-12-20',12);
INSERT INTO reservation VALUES((SELECT *FROM id_r),2,'2022-01-10','2022-12-20',12);
INSERT INTO reservation VALUES((SELECT *FROM id_r),2,'2022-01-10','2022-12-20',12);
INSERT INTO reservation VALUES((SELECT *FROM id_r),2,'2022-01-10','2022-12-20',12);
INSERT INTO reservation VALUES((SELECT *FROM id_r),2,'2022-01-10','2022-12-20',12);
INSERT INTO reservation VALUES((SELECT *FROM id_r),1,'2022-01-10','2023-12-20',12);
INSERT INTO reservation VALUES((SELECT *FROM id_r),1,'2022-01-10','2023-12-20',12);
INSERT INTO reservation VALUES((SELECT *FROM id_r),1,'2022-01-10','2023-12-20',12);
INSERT INTO reservation VALUES((SELECT *FROM id_r),1,'2022-01-10','2024-12-20',12);
INSERT INTO reservation VALUES((SELECT *FROM id_r),1,'2022-01-10','2024-12-20',12);
INSERT INTO reservation VALUES((SELECT *FROM id_r),1,'2022-01-10','2024-12-20',12);

INSERT INTO Photo_h VALUES(1,"image1.jpg");
INSERT INTO Photo_h VALUES(1,"image2.jpg");
INSERT INTO Photo_h VALUES(1,"image3.jpg");

INSERT INTO Photo_h VALUES(2,"antsirabe1.jpg");
INSERT INTO Photo_h VALUES(2,"antsirabe2.jpg");
INSERT INTO Photo_h VALUES(2,"antsirabe3.jpg");

INSERT INTO Loyer VALUES(1,230.50,'2022-09-12');
INSERT INTO Loyer VALUES(2,150.50,'2022-09-12');

INSERT INTO description_h VALUES(1,"Maison avec une vue en plein air");
INSERT INTO description_h VALUES(2,"Appartement avec un acces piscine");



CREATE OR REPLACE View ListeHabitat AS
SELECT t.nom,ph.nom_p,h.quartier,h.id_h,l.montant,d.descriptions
    FROM Habitation h 
    JOIN Photo_h ph ON ph.id_h=h.id_h
    JOIN Type_h t ON h.id_t=t.id_t
    JOIN Loyer l ON h.id_h=l.id_h
    JOIN description_h d ON h.id_h=d.id_h
GROUP BY h.id_h;


DROP FUNCTION is_In;
DELIMITER $$
CREATE FUNCTION is_In(arriver TIMESTAMP,depart TIMESTAMP,months INTEGER,years INTEGER)
    RETURNS 
        VARCHAR(2) DETERMINISTIC
    BEGIN 
        DECLARE  a_year INTEGER;
        DECLARE  d_year INTEGER;
        DECLARE a_month INTEGER;
        DECLARE d_month INTEGER;
        DECLARE  answer INTEGER;
        SET a_year = years-EXTRACT(YEAR FROM arriver); 
        SET d_year = years-EXTRACT(YEAR FROM depart); 
        SET a_month = months-EXTRACT(MONTH FROM arriver); 
        SET d_month = months-EXTRACT(MONTH FROM depart);
        IF a_year*d_year>0 THEN
            SET answer = 0;
        ELSEIF a_year=0 AND a_month<0 THEN
            SET answer = 0;
        ELSEIF d_year=0  AND d_month>0 THEN
            SET answer = 0;
        ELSE 
            SET answer = 1;
        END IF;
        RETURN answer;
    END$$
DELIMITER ;



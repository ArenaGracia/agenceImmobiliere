DROP DATABASE Agence;
CREATE DATABASE Agence;
USE Agence;

-- User
CREATE TABLE Utilisateur(
    id_U INTEGER PRIMARY KEY,
    email VARCHAR(30),
    nom VARCHAR(30),
    mdp   VARCHAR(30),
    num   VARCHAR(30)
);
CREATE OR REPLACE VIEW id_utilisateur  AS SELECT COUNT(*)+1 c FROM Utilisateur;

INSERT INTO Utilisateur VALUES((SELECT *FROM id_utilisateur),'Arena','arena@gmail.com','arena1','032 41 456 89');
INSERT INTO Utilisateur VALUES((SELECT *FROM id_utilisateur),'Nancy','nancy@gmail.com','nancy','032 42 456 89');
INSERT INTO Utilisateur VALUES((SELECT *FROM id_utilisateur),'David','david@gmail.com','david','032 43 456 89');
INSERT INTO Utilisateur VALUES((SELECT *FROM id_utilisateur),'Johan','johan@gmail.com','johan','032 44 456 89');


-- SuperUser
CREATE TABLE SuperUser(
    id_Su INTEGER PRIMARY KEY,
    email VARCHAR(30),
    nom VARCHAR(30),
    mdp   VARCHAR(30),
    num  VARCHAR(30)  
);

CREATE OR REPLACE VIEW id_SuperUser  AS SELECT COUNT(*)+1 c FROM SuperUser;

INSERT INTO SuperUser VALUES((SELECT *FROM id_SuperUser),'Mimi','mimi@gmail.com','mimi','034 12 123 45');

-- Type Habitations
CREATE TABLE Type_h(
    id_t INTEGER PRIMARY KEY,
    nom VARCHAR(30)    
);

CREATE OR REPLACE VIEW id_type AS SELECT COUNT(*)+1 c FROM Type_h;

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

CREATE OR REPLACE VIEW id_habit AS SELECT COUNT(*)+1 c FROM Habitation;

INSERT INTO Habitation VALUES((SELECT *FROM id_habit),1,2,'Antananarivo');
INSERT INTO Habitation VALUES((SELECT *FROM id_habit),3,4,'Antsirabe');

-- Photo habitation
CREATE TABLE Photo_h(
    id_h INTEGER,
    nom_p VARCHAR(30),
    FOREIGN KEY (id_h) REFERENCES Habitation(id_h)
);

------------------------------------ Statistic montant loyer -----------------------------

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

-- SELECT SUM(montant) AS montant , daty FROM Loyer 
--     WHERE EXTRACT(MONTH FROM daty)=10 AND EXTRACT(YEAR FROM daty)=2022
--     GROUP BY daty;

---------------------------------------------------------------------------------------------------

CREATE TABLE description_h(
    id_h INTEGER,
    descriptions VARCHAR(200),
    FOREIGN KEY (id_h) REFERENCES Habitation(id_h)
);
DROP TABLE Reservation;
CREATE TABLE Reservation(
    id_r INTEGER PRIMARY KEY,
    id_h INTEGER,
    arriver DATE,
    depart DATE,
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

-- SELECT * FROM reservation WHERE (SELECT is_In(arriver,depart,12,2023)) = 1;
-- SELECT EXTRACT(YEAR FROM arriver) FROM reservation;
-- SELECT LAST_DAY(arriver) from reservation;
---------------- 1 SI oui ------------------- 0 SI faux -----------------------------

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
--------------------------------- SELECT is_In(arriver,depart,months,years) FROM DUAL; ------------------------------
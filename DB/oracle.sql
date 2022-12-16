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
);

CREATE OR REPLACE VIEW id_r AS SELECT COUNT(*)+1 c FROM Reservation;

DELETE FROM reservation;
INSERT INTO reservation VALUES((SELECT *FROM id_r),2,'10-10-2022 00:00:00','20-12-2023 00:00:00',12);
INSERT INTO reservation VALUES((SELECT *FROM id_r),1,'10-01-2022 00:00:00','20-12-2022 00:00:00',12);
INSERT INTO reservation VALUES((SELECT *FROM id_r),1,'10-01-2022 00:00:00','20-12-2022 00:00:00',12);
INSERT INTO reservation VALUES((SELECT *FROM id_r),1,'10-01-2022 00:00:00','20-12-2022 00:00:00',12);
INSERT INTO reservation VALUES((SELECT *FROM id_r),1,'10-01-2022 00:00:00','20-12-2022 00:00:00',12);
INSERT INTO reservation VALUES((SELECT *FROM id_r),2,'10-01-2022 00:00:00','20-12-2022 00:00:00',12);
INSERT INTO reservation VALUES((SELECT *FROM id_r),2,'10-01-2022 00:00:00','20-12-2022 00:00:00',12);
INSERT INTO reservation VALUES((SELECT *FROM id_r),2,'10-01-2022 00:00:00','20-12-2022 00:00:00',12);
INSERT INTO reservation VALUES((SELECT *FROM id_r),2,'10-01-2022 00:00:00','20-12-2022 00:00:00',12);
INSERT INTO reservation VALUES((SELECT *FROM id_r),1,'10-01-2022 00:00:00','20-12-2023 00:00:00',12);
INSERT INTO reservation VALUES((SELECT *FROM id_r),1,'10-01-2022 00:00:00','20-12-2023 00:00:00',12);
INSERT INTO reservation VALUES((SELECT *FROM id_r),1,'10-01-2022 00:00:00','20-12-2023 00:00:00',12);
INSERT INTO reservation VALUES((SELECT *FROM id_r),1,'10-01-2022 00:00:00','20-12-2024 00:00:00',12);
INSERT INTO reservation VALUES((SELECT *FROM id_r),1,'10-01-2022 00:00:00','20-12-2024 00:00:00',12);
INSERT INTO reservation VALUES((SELECT *FROM id_r),1,'10-01-2022 00:00:00','20-12-2024 00:00:00',12);

-- SELECT * FROM reservation WHERE (SELECT is_In(arriver,depart,12,2023) FROM DUAL) = 1;
-- SELECT LAST_DAY(arriver) from reservation;
---------------- 1 SI oui ------------------- 0 SI faux -----------------------------
CREATE OR REPLACE FUNCTION is_In(arriver IN TIMESTAMP,depart IN TIMESTAMP,months IN INTEGER,years IN INTEGER)
    RETURN INTEGER 
    IS 
        a_year INTEGER;
        d_year INTEGER;
        a_month INTEGER;
        d_month INTEGER;
        answer INTEGER;
    BEGIN 
        a_year := years-EXTRACT(YEAR FROM arriver); 
        d_year := years-EXTRACT(YEAR FROM depart); 
        a_month := months-EXTRACT(MONTH FROM arriver); 
        d_month := months-EXTRACT(MONTH FROM depart);
        IF a_year*d_year>0 THEN
            answer := 0;
        ELSIF a_year=0  AND a_month<0 THEN
            answer := 0;
        ELSIF d_year=0  AND d_month>0 THEN
            answer := 0;
        ELSE 
            answer := 1;
        END IF;
    RETURN answer;
END is_In;
/
--------------------------------- SELECT is_In(arriver,depart,months,years) FROM DUAL; ------------------------------

commit;
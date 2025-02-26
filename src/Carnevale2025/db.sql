CREATE TABLE maschera ( nome_maschera VARCHAR(50) PRIMARY KEY );

CREATE TABLE utente
(
    nome_utente VARCHAR(50) PRIMARY KEY,
    pw_utente VARCHAR(50) NOT NULL,
    nome_maschera VARCHAR(50),

    FOREIGN KEY (nome_maschera) REFERENCES maschera(nome_maschera)
);


INSERT INTO maschera (nome_maschera) VALUES ('arlecchino');
INSERT INTO maschera (nome_maschera) VALUES ('castelletto');
INSERT INTO maschera (nome_maschera) VALUES ('pulcinella');
INSERT INTO maschera (nome_maschera) VALUES ('colombina');
INSERT INTO maschera (nome_maschera) VALUES ('gianduia');

INSERT INTO utente (nome_utente, pw_utente) VALUES ('', '');
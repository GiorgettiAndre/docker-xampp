CREATE TABLE utenti (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    cognome VARCHAR(255) NOT NULL,
    eta INT NOT NULL
);


INSERT INTO utenti (nome, cognome, eta) VALUES
('Mario', 'Rossi', 30),
('Luca', 'Bianchi', 25),
('Giulia', 'Verdi', 28);
CREATE TABLE utilisateurs (
id INT PRIMARY KEY AUTO_INCREMENT,
pseudo VARCHAR(255),
email VARCHAR(255),
mot_de_passe VARCHAR(255),
avatar VARCHAR (255),
genre CHAR (1),
date_inscription DATETIME,
role VARCHAR(255)
);
CREATE TABLE categories (
id INT PRIMARY KEY AUTO_INCREMENT,
nom VARCHAR(255)
);
CREATE TABLE questions (
id INT PRIMARY KEY AUTO_INCREMENT,
titre VARCHAR(45),
categorie_id INT,
auteur_id INT,
date_creation DATETIME,
FOREIGN KEY (categorie_id) REFERENCES categories(id),
FOREIGN KEY (auteur_id) REFERENCES utilisateurs(id)
);
CREATE TABLE repondre (
utilisateurs_id INT,
questions_id INT,
date DATETIME,
reponse VARCHAR(255),
PRIMARY KEY (utilisateurs_id, questions_id),
FOREIGN KEY (utilisateurs_id) REFERENCES utilisateurs(id),
FOREIGN KEY (questions_id) REFERENCES questions(id)
);
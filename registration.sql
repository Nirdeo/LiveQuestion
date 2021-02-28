/* Notre base de données est nommée registration et est créée avec CREATE DATABASE registration; */
CREATE TABLE utilisateurs (
id INT NOT NULL AUTO_INCREMENT,
pseudo VARCHAR(255) NOT NULL,
email VARCHAR(255) NOT NULL,
mot_de_passe VARCHAR(255) NOT NULL,
avatar VARCHAR(255) NOT NULL,
genre CHAR NOT NULL,
date_inscription DATETIME NOT NULL,
role VARCHAR(255) NOT NULL,
PRIMARY KEY (id)
);
CREATE TABLE categories (
id INT NOT NULL AUTO_INCREMENT,
nom VARCHAR(255) NOT NULL,
PRIMARY KEY (id)
);
CREATE TABLE questions (
id INT NOT NULL AUTO_INCREMENT,
titre VARCHAR(255) NOT NULL,
categorie_id INT NOT NULL,
auteur_id INT NOT NULL,
date_creation DATETIME NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (categorie_id) REFERENCES categories(id),
FOREIGN KEY (auteur_id) REFERENCES utilisateurs(id)
);
CREATE TABLE repondre (
utilisateurs_id INT NOT NULL,
questions_id INT NOT NULL,
date DATETIME NOT NULL,
reponse VARCHAR(255) NOT NULL,
PRIMARY KEY (utilisateurs_id, questions_id),
FOREIGN KEY (utilisateurs_id) REFERENCES utilisateurs(id),
FOREIGN KEY (questions_id) REFERENCES questions(id)
);
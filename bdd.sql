-- Créer la base de donnée
CREATE DATABASE IF NOT EXISTS games CHARSET utf8mb4;

-- Utiliser la base de donnée
USE games;

-- Création de la table console
CREATE TABLE IF NOT EXISTS console (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    `name` VARCHAR(50) UNIQUE NOT NULL,
    manufacturer VARCHAR(50) NOT NULL
)ENGINE=innoDB;

-- Création de la table video_game
CREATE TABLE IF NOT EXISTS video_game (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    title VARCHAR(50) NOT NULL,
    `type` VARCHAR(50) NOT NULL,
    publish_at DATE NOT NULL,
)ENGINE=innoDB;

-- ajout de la clé étrangère de l'id de console (foreign key) id_console dans video_game
ALTER TABLE video_game
ADD CONSTRAINT fk_video_game_id_console
FOREIGN KEY (id_console)
REFERENCES console(id)
ON DELETE CASCADE;


-- Requête de MAJ INSERT = INSERT INTO ?!

INSERT INTO console (`name`, manufacturer) 
    VALUES ("PlayStation 5", "Sony"),
    ("Switch", "Nintendo"), 
    ("Xbox Series X", "Microsoft"), 
    ("Steam Deck", "Valve");
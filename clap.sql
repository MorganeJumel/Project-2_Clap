SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/* Drop, creation et utilisation de la BDD clap */

DROP DATABASE IF EXISTS clap;
CREATE DATABASE clap;
USE clap;

/*creation des tables */

CREATE TABLE `reference` (
  `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `movie_name` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `image_upload` VARCHAR(255) NOT NULL,
  `category_id` INT NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `category` (
  `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `category_name` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `clue` (
  `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `help` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE reference
ADD FOREIGN KEY (category_id) REFERENCES category(id);

INSERT INTO category (`category_name`)
  VALUES
    ('Action / Aventure'),
    ('Animation'),
    ('Comédie'),
    ('Horreur'),
    ('Science-Fiction / Fantastique'),
    ('Auteur');

INSERT INTO reference (`movie_name`, `image_upload`, `category_id`)
  VALUES
    ("Indiana Jones", 'indiana.png', 1),
    ("King Kong", 'kingkong.png', 1),
    ("Rambo", 'rambo.png', 1),
    ("Gladiator", 'gladiator.png', 1),
    ("Spiderman", 'spiderman.png', 2),
    ("Géant de fer", 'fer.png', 2),
    ("Merlin", 'merlin.png', 2),
    ("Batman", 'batman.png', 2),
    ("Very Bad Trip", 'verybadtrip.png', 3),
    ("Le Prénom", 'leprenom.png', 3),
    ("Le sens de la Fête", 'lesensdelafete.png', 3),
    ("La Cité de la Peur", 'lacitedelapeur.png', 3),
    ("Shining", 'shining.png', 4),
    ("The Visit", 'the_visit.jpg', 4),
    ("Hérédité", 'heredite.jpg', 4),
    ("Psychose", 'psychose.jpg', 4),
    ("Seul sur Mars", 'seulsurmars.png', 5),
    ("Ready Player One", 'readyplayerone.png', 5),
    ("Alien", 'Alien2.png', 5),
    ("Chronicle", 'chronicle.png', 5),
    ("The House that Jack built", 'thehousethatjackbuilt.png', 6),
    ("Shutter Island", 'shutterisland.png', 6),
    ("Vol au-dessus d'un nid de coucou", 'volaudessusdunniddecoucou.png', 6),
    ("Joker", 'joker.png', 6);

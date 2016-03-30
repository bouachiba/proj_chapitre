
CREATE TABLE `chapitre`.`clients` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `email` VARCHAR(80) NOT NULL COMMENT '',
  `password` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  UNIQUE INDEX `email_UNIQUE` (`email` ASC)  COMMENT '');
  
  CREATE OR REPLACE VIEW vue_catalogue AS
SELECT livres.*, 
CONCAT_WS(' ',auteurs.prenom, auteurs.nom) as nom_auteur,
editeurs.nom as editeur,
genres.genre
FROM livres
INNER JOIN auteurs ON auteurs.id = livres.auteur_id
INNER JOIN editeurs ON editeurs.id = livres.editeur_id
INNER JOIN genres ON genres.id = livres.genre_id
;
Itération 5 :
Dans cette cinquième itération, l’objectif est de gérer les utilisateurs. Pour cela, j’ai choisi de créer une table nommée Profil.

Cette table contient les colonnes suivantes :

id : clé primaire auto-incrémentée de type INT.

name : champ de type VARCHAR(150) destiné à stocker le nom de l’utilisateur.

image : champ de type VARCHAR(150) pour enregistrer le nom de l’image associée.

age : champ de type DATE permettant de stocker la date de naissance de l’utilisateur.

Itération 9 :
Lors de cette neuvième itération, il nous est demandé de gérer les favoris. Pour répondre à ce besoin, j’ai créé une table appelée Favoris.

Cette table comprend les colonnes suivantes :

id : clé primaire auto-incrémentée de type INT.

id_profil : champ de type INT qui stocke l’identifiant du profil ayant ajouté un film en favori.

id_movie : champ de type INT qui stocke l’identifiant du film marqué comme favori.

Itération 11 :
Pour cette onzième itération, la gestion des films mis en avant est demandée. J’ai donc ajouté une nouvelle colonne à la table Movie.

Voici l’attribut ajouté :

mise_en_avant : de type TINYINT, initialisé par défaut à 0. Cette valeur permet de distinguer les films mis en avant (1) de ceux qui ne le sont pas (0). 
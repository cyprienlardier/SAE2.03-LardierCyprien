<?php
/**
 * Ce fichier contient toutes les fonctions qui réalisent des opérations
 * sur la base de données, telles que les requêtes SQL pour insérer, 
 * mettre à jour, supprimer ou récupérer des données.
 */

/**
 * Définition des constantes de connexion à la base de données.
 *
 * HOST : Nom d'hôte du serveur de base de données, ici "localhost".
 * DBNAME : Nom de la base de données
 * DBLOGIN : Nom d'utilisateur pour se connecter à la base de données.
 * DBPWD : Mot de passe pour se connecter à la base de données.
 */
define("HOST", "localhost");
define("DBNAME", "lardier6");
define("DBLOGIN", "lardier6");
define("DBPWD", "lardier6");


function getAllMovies(){
        // Connexion à la base de données
        $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
        // Requête SQL pour récupérer le menu avec des paramètres
        $sql = "select id, name, image from Movie";
        // Prépare la requête SQL
        $stmt = $cnx->prepare($sql);
        // Exécute la requête SQL
        $stmt->execute();
        // Récupère les résultats de la requête sous forme d'objets
        $res = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $res; // Retourne les résultats
}

function addMovie($titre, $real, $annee, $duree, $des, $cat, $img, $url, $age) {
        $cnx = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBLOGIN, DBPWD);
    
        $sql = "REPLACE INTO Movie (name, director, year, length, description, id_category, image, trailer, min_age) 
                VALUES (:titre, :realisateur, :annee, :duree, :desc, :categorie, :image, :url, :age)";
    
        $stmt = $cnx->prepare($sql);
    
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':realisateur', $real);
        $stmt->bindParam(':annee', $annee);
        $stmt->bindParam(':duree', $duree);
        $stmt->bindParam(':desc', $des);
        $stmt->bindParam(':categorie', $cat);
        $stmt->bindParam(':image', $img);
        $stmt->bindParam(':url', $url);
        $stmt->bindParam(':age', $age);
    
        $stmt->execute();
        $res = $stmt->rowCount();
        return $res; 
    }
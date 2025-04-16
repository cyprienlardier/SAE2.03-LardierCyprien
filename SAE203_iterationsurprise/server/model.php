<?php
/**
 * Ce fichier contient toutes les fonctions qui réalisent des opérations
 * sur la base de données, telles que les requêtes SQL pour insérer, 
 * mettre à jour, supprimer ou récupérer des données.
 */

define("HOST", "localhost");
define("DBNAME", "lardier6");
define("DBLOGIN", "lardier6");
define("DBPWD", "lardier6");

// Récupère tous les films
function getAllMovies() {
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
    $sql = "SELECT id, name, image FROM Movie";
    $stmt = $cnx->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

// Ajoute ou remplace un film
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
    return $stmt->rowCount();
}

// Récupère le détail d’un film
function getMovieDetail($id) {
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
    $sql = "SELECT Movie.id, Movie.name, image, description, director, year, length, Category.name AS category_name, min_age, trailer 
            FROM Movie 
            INNER JOIN Category ON Movie.id_category = Category.id 
            WHERE Movie.id = :id";
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
}

// Récupère toutes les catégories
function getCategories() {
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
    $sql = "SELECT id, name FROM Category";
    $stmt = $cnx->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

// Récupère tous les films d’une catégorie, avec ou sans filtre d’âge
function getMovieCategory($category, $ageutilisateur = null) {
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);

    if ($ageutilisateur === null) {
        $sql = "SELECT Movie.*, Category.name AS category 
                FROM Movie 
                JOIN Category ON Movie.id_category = Category.id 
                WHERE Category.id = :category
                ORDER BY Movie.name ASC";
        $stmt = $cnx->prepare($sql);
        $stmt->bindParam(':category', $category);
    } else {
        $sql = "SELECT Movie.*, Category.name AS category 
                FROM Movie 
                JOIN Category ON Movie.id_category = Category.id 
                WHERE Category.id = :category 
                AND Movie.min_age <= :ageutilisateur
                ORDER BY Movie.name ASC";
        $stmt = $cnx->prepare($sql);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':ageutilisateur', $ageutilisateur);
    }

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function addProfil($nom, $avatar, $age) {
       
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
    $sql = "INSERT INTO Profil (nom, avatar, age) 
            VALUES (:nom, :avatar, :age)";
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':avatar', $avatar);
    $stmt->bindParam(':age', $age);

    $stmt->execute();

    $res = $stmt->rowCount();
    return $res;
}

function getAllProfil(){
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
    $sql = "select id, nom, avatar, age from Profil";
    $stmt = $cnx->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $res; 
}

function getMoviesByAge($ageutilisateur)
{
    $cnx = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, DBLOGIN, DBPWD);
    $sql = 'SELECT id, name, image, min_age FROM Movie WHERE min_age <= :age';
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':age', $ageutilisateur, PDO::PARAM_INT);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $res;
}

function getMoviesAgeCategory($ageutilisateur, $category)
{
    $cnx = new PDO('mysql:host=' . HOST . ';dbname=' . DBNAME, DBLOGIN, DBPWD);
    $sql = 'SELECT Movie.id, Movie.name, Movie.image
            FROM Movie
            INNER JOIN Category ON Movie.id_category = Category.id
            WHERE Movie.min_age <= :age AND LOWER(Category.name) = LOWER(:categorie)';

    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':age', $ageutilisateur, PDO::PARAM_INT);
    $stmt->bindParam(':categorie', $category, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function updateProfile($name, $avatar, $age, $id) {
    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);
    $sql = "UPDATE Profil 
            SET nom = :name, avatar = :avatar, age = :age 
            WHERE id = :id"; // Remplacez name par nom si nécessaire
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':avatar', $avatar);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $res = $stmt->rowCount();
    return $res;
}

function addFavoris($id_movie, $id_profil){

    $cnx = new PDO("mysql:host=".HOST.";dbname=".DBNAME, DBLOGIN, DBPWD);

    $sql = "INSERT INTO Favoris  
    (id_movie, id_profil) 
    VALUES (:id_movie, :id_profil);";

    $stmt = $cnx->prepare($sql);

    $stmt->bindParam(':id_profil', $id_profil);
    $stmt->bindParam(':id_movie', $id_movie);
    

    $stmt->execute();

    return $stmt->rowCount();
}

function getFavoris($id_profil) {
  $cnx = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBLOGIN, DBPWD);

  $sql = "SELECT Movie.id, Movie.name, Movie.image 
          FROM Favoris 
          INNER JOIN Movie ON Favoris.id_movie = Movie.id 
          WHERE Favoris.id_profil = :id_profil";

  $stmt = $cnx->prepare($sql);
  $stmt->bindParam(':id_profil', $id_profil, PDO::PARAM_INT);
  $stmt->execute();

  return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function isFavoris($id_movie, $id_profil) {
    try {
        $cnx = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBLOGIN, DBPWD);
        $sql = "SELECT COUNT(*) FROM Favoris WHERE id_movie = :id_movie AND id_profil = :id_profil";
        $stmt = $cnx->prepare($sql);
        $stmt->bindParam(':id_movie', $id_movie, PDO::PARAM_INT);
        $stmt->bindParam(':id_profil', $id_profil, PDO::PARAM_INT);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        return $count > 0;
    } catch (PDOException $e) {
        error_log("Erreur SQL dans isFavoris : " . $e->getMessage());
        return false;
    }
}

function removeFavoris($id_movie, $id_profil) {
    $cnx = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME, DBLOGIN, DBPWD);

    $sql = "DELETE FROM Favoris WHERE id_movie = :id_movie AND id_profil = :id_profil";
    $stmt = $cnx->prepare($sql);
    $stmt->bindParam(':id_movie', $id_movie, PDO::PARAM_INT);
    $stmt->bindParam(':id_profil', $id_profil, PDO::PARAM_INT);

    $stmt->execute();
    return $stmt->rowCount() > 0;
}
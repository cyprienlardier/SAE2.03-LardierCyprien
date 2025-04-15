<?php

require("model.php");

function readMoviesController(){
    $movies = getAllMovies();
    return $movies;
}

function addController(){
    $titre = $_REQUEST['titre'] ?? null;
    $realisateur = $_REQUEST['realisateur'] ?? null;
    $annee = $_REQUEST['annee'] ?? null;
    $duree = $_REQUEST['duree'] ?? null;
    $desc = $_REQUEST['desc'] ?? null;
    $categorie = $_REQUEST['categorie'] ?? null;
    $image = $_REQUEST['image'] ?? null;
    $url = $_REQUEST['url'] ?? null;
    $age = $_REQUEST['age'] ?? null;

    if (empty($titre) || empty($realisateur) || empty($annee) || empty($duree) || empty($desc) || empty($categorie) || empty($image) || empty($url) || empty($age)) {
        return "Erreur : Tous les champs doivent être remplis.";
    }

    $ok = addMovie($titre, $realisateur, $annee, $duree, $desc, $categorie, $image, $url, $age);
    if ($ok != 0){
        return "Le film $titre a été ajouté avec succès !";
    } 
    else{
        return "Erreur lors de l'ajout du film $titre !";
    }
}

function readMovieDetailsController(){
    $id = $_REQUEST['id'] ?? null;

    if (empty($id)) {
        return "Erreur : Tous les champs doivent être remplis.";
    }

    return getMovieDetail($id);
}

function readCategoriesController() {
    $categories = getCategories();
    if ($categories != 0) {
        return $categories;
    } else {
        return "Erreur lors de la récupération des films de la catégorie $category";
    }
}

function readMovieCategoryController() {
    $id = $_REQUEST['id'];
    $ageutilisateur = $_REQUEST['ageutilisateur'];

    $movies = getMovieCategory($id, $ageutilisateur);

    if ($movies != 0) {
        return $movies;
    } else {
        return "La catégorie de ces films n'a pas été récupérée";
    }
}

function profilController(){
    $name = $_REQUEST['name'];
    $image = $_REQUEST['image'];
    $ageutilisateur = $_REQUEST['ageutilisateur'];

    if (empty($name) || empty($image) || empty($ageutilisateur)) {
        return "Erreur : Tous les champs doivent être remplis.";
    }

    $ok = addProfil($name, $image, $ageutilisateur);
    if ($ok != 0){
        return "L'utilisateur $name a été ajouté avec succès !";
    } else {
        return "Erreur lors de l'ajout de l'utilisateur $name !";
    }
}

function readProfilController() {
    $profil = getAllProfil();
    return $profil;
}

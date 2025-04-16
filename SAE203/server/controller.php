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
        $id = $_REQUEST['id'] ?? null;
        $ageutilisateur = $_REQUEST['ageutilisateur'] ?? null;

        // Sécurité minimale : vérifier que l'ID est bien fourni
        if (empty($id)) {
            return "Erreur : ID de catégorie manquant.";
        }

        // Filtrage par âge uniquement si un âge est fourni
        $movies = getMovieCategory($id, $ageutilisateur);

        if ($movies && is_array($movies)) {
            return $movies;
        } else {
            return "Erreur : Aucun film trouvé pour cette catégorie (ou catégorie invalide).";
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

function readControllerMoviesByAge()
{
  $ageutilisateur = $_REQUEST['ageutilisateur'] ?? null;
  if ($ageutilisateur === null || !is_numeric($ageutilisateur)) {
    return false;
  }

  return getMoviesByAge((int) $ageutilisateur);
}

function readControllerMoviesAgeCategory()
{
  $ageutilisateur = $_REQUEST['ageutilisateur'] ?? null;
  $category = $_REQUEST['category'] ?? null;

  if ($ageutilisateur === null || !is_numeric($ageutilisateur) || empty($category)) {
    return false;
  }

  return getMoviesAgeCategory((int)$ageutilisateur, $category);
}

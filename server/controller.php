<?php

/** ARCHITECTURE PHP SERVEUR  : Rôle du fichier controller.php
 * 
 *  Dans ce fichier, on va définir les fonctions de contrôle qui vont traiter les requêtes HTTP.
 *  Les requêtes HTTP sont interprétées selon la valeur du paramètre 'todo' de la requête (voir script.php)
 *  Pour chaque valeur différente, on déclarera une fonction de contrôle différente.
 * 
 *  Les fonctions de contrôle vont éventuellement lire les paramètres additionnels de la requête, 
 *  les vérifier, puis appeler les fonctions du modèle (model.php) pour effectuer les opérations
 *  nécessaires sur la base de données.
 *  
 *  Si la fonction échoue à traiter la requête, elle retourne false (mauvais paramètres, erreur de connexion à la BDD, etc.)
 *  Sinon elle retourne le résultat de l'opération (des données ou un message) à includre dans la réponse HTTP.
 */

/** Inclusion du fichier model.php
 *  Pour pouvoir utiliser les fonctions qui y sont déclarées et qui permettent
 *  de faire des opérations sur les données stockées en base de données.
 */
require("model.php");

function readMoviesController(){
    $movies = getAllMovies();
    return $movies;
    
}

function addController(){
    /* Lecture des données de formulaire
      On ne vérifie pas si les données sont valides, on suppose (faudra pas toujours...) que le client les a déjà
      vérifiées avant de les envoyer 
    */


    // Récupération des paramètres de la requête
    $titre = $_REQUEST['titre'] ?? null;
    $realisateur = $_REQUEST['realisateur'] ?? null;
    $annee = $_REQUEST['annee'] ?? null;
    $duree = $_REQUEST['duree'] ?? null;
    $desc = $_REQUEST['desc'] ?? null;
    $categorie = $_REQUEST['categorie'] ?? null;
    $image = $_REQUEST['image'] ?? null;
    $url = $_REQUEST['url'] ?? null;
    $age = $_REQUEST['age'] ?? null;

    // Validation: Check if any parameter is empty
    if (empty($titre) || empty($realisateur) || empty($annee) || empty($duree) || empty($desc) || empty($categorie) || empty($image) || empty($url) || empty($age)) {
        return "Erreur : Tous les champs doivent être remplis.";
    }
    // Mise à jour du menu à l'aide de la fonction updateMenu décrite dans model.php
    $ok = addMovie($titre, $realisateur, $annee, $duree, $desc, $categorie, $image, $url, $age);
    // $ok est le nombre de ligne affecté par l'opération de mise à jour dans la BDD (voir model.php)
    if ($ok!=0){
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
    // Récupération des catégories
    $categories = getCategories();
    if ($categories !=0) {
        return $categories;
    }
    else{
        return "Erreur lors de la récupération des films de la catégorie $category";
     };
}



function readMovieCategoryController(){
    // Récupération des paramètres de la requête
    $id = $_REQUEST["id"];
    $movies = getMovieCategory($id);

    if ($movies !=0) {
        return $movies ;
    }
    else{
       return "Erreur lors de la récupération des films de la catégorie $category";
    };
} 

function profilController() {

  // Vérifiez que les paramètres sont définis
  if (!isset($_REQUEST['nom']) || !isset($_REQUEST['avatar']) || !isset($_REQUEST['age'])) {
      echo json_encode(["success" => false, "message" => "Paramètres manquants"]);
      exit();
  }

  $nom = $_REQUEST['nom'];
  $avatar = $_REQUEST['avatar'];
  $age = $_REQUEST['age'];

  // Vérifiez que l'âge est un entier valide
  if ( $age <= 0) {
      echo json_encode(["success" => false, "message" => "Âge invalide"]);
      exit();
  }

  $ok = addProfil($nom, $avatar, $age);

  if ($ok != 0) {
      echo json_encode(["success" => true, "message" => "Profil ajouté à la base de donnée"]);
  } else {
      echo json_encode(["success" => false, "message" => "Erreur lors de l'ajout du Profil"]);
  }

  exit();
}
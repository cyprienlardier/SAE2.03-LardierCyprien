// URL où se trouve le répertoire "server" sur mmi.unilim.fr
let HOST_URL = "https://mmi.unilim.fr/~lardier6/SAE2.03-LardierCyprien/SAE203";//"http://mmi.unilim.fr/~????"; // CHANGE THIS TO MATCH YOUR CONFIG

let DataMovie = {};

 
DataMovie.requestMovies = async function(){
    // fetch permet d'envoyer une requête HTTP à l'URL spécifiée. 
    // L'URL est construite en concaténant HOST_URL à "/server/script.php?direction=" et la valeur de la variable dir. 
    // L'URL finale dépend de la valeur de HOST_URL et de dir.
    let answer = await fetch(HOST_URL + "/server/script.php?todo=readmovies" );  
    // answer est la réponse du serveur à la requête fetch.
    // On utilise ensuite la méthode json() pour extraire de cette réponse les données au format JSON.
    // Ces données (data) sont automatiquement converties en objet JavaScript.
    let movies = await answer.json();
    // Enfin, on retourne ces données.
    // console.log(movies);
    return movies;
}


DataMovie.requestMovieDetails = async function(id) {
    let answer = await fetch(HOST_URL + "/server/script.php?todo=getMovieDetails&id=" + id);
    let movieDetails = await answer.json();
    return movieDetails;
  }

  DataMovie.requestCategory = async function () {
    let answer = await fetch(HOST_URL + "/server/script.php?todo=readcategories" );
    let data = await answer.json();
    return data;
  };

  // DataMovie.requestMovieCategory = async function (idcategory) {
  //   let answer = await fetch(HOST_URL + "/server/script.php?todo=readmoviecategory&id=" +idcategory );
  //   let data = await answer.json();
  //   return data;
  // };  
  
  DataMovie.requestMovieCategory = async function (idCategory, ageutilisateur) {
    let url = HOST_URL + "/server/script.php?todo=readmoviecategory&id=" + idCategory; 
    if (ageutilisateur) {
        url += "&ageutilisateur=" + ageutilisateur;
    }

    let response = await fetch(url);
    let data = await response.json();
    return data;
};





DataMovie.requestMoviesByAge = async function (ageutilisateur) {
  let url = HOST_URL + "/server/script.php?todo=readmovies";
  if (ageutilisateur) {
    url += "&ageutilisateur=" + ageutilisateur;
  }

  let response = await fetch(url);
  let data = await response.json();
  return data;
};

DataMovie.requestMoviesAgeCategory = async function (ageutilisateur, category) {
  let answer = await fetch(
    HOST_URL +
      "/server/script.php?todo=getMoviesAgeCategory&ageutilisateur=" +
      ageutilisateur +
      "&category=" +
      category
  );
  let movies = await answer.json();
  return movies;
};


DataMovie.addFavoris = async function (id_profil, id_movie) {
  let answer = await fetch(
    HOST_URL + "/server/script.php?todo=addFavoris&id_profil=" + id_profil + "&id_movie=" + id_movie
  );

  let data = await answer.json();
  return data;
};
DataMovie.removeFavoris = async function (id_profil, id_movie) {
  let answer = await fetch(
    HOST_URL + "/server/script.php?todo=removeFavoris&id_profil=" + id_profil + "&id_movie=" + id_movie
  );

  let data = await answer.json();
  return data;
};


export {DataMovie};
let templateFile = await fetch("./component/Movie/template.html");
let template = await templateFile.text();

let Movie = {};

Movie.format = function (movie, isFavorisPage = false) {
  
  let html = template;

  html = html.replace("{{title}}", movie.name);
  html = html.replace("{{image}}", movie.image);
  html = html.replace("{{handler}}", `C.handlerDetail(${movie.id})`);

  console.log("ID du film :", movie.id, "isFavorisPage :", isFavorisPage);

  if (isFavorisPage) {
    
    html = html.replace("{{buttonClass}}", "removeFavoris_button");
    html = html.replace("{{buttonAction}}", `C.removeFavoris(${movie.id})`);
    html = html.replace("{{buttonLabel}}", "Supprimer des favoris");
    html = html.replace("{{iconPath}}", "M6 18L18 6M6 6l12 12"); 
  } else {
    
    html = html.replace("{{buttonClass}}", "addFavoris_button");
    html = html.replace("{{buttonAction}}", `C.addFavoris(${movie.id})`);
    html = html.replace("{{buttonLabel}}", "Ajouter aux favoris");
    html = html.replace("{{iconPath}}", "M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"); // Icône d'étoile
  }

  return html;
};

Movie.formatMany = function (movies, isFavorisPage = false) {
  if (!movies || movies.length === 0) {
    return "<p>Aucun film disponible.</p>";
  }

  

  let html = "";
  for (const movie of movies) {
    html += Movie.format(movie, isFavorisPage);
  }
  return html;
};

export { Movie };
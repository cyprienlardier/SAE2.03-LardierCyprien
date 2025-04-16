import { Movie } from "../Movie/script.js";
import { DataMovie } from "../../data/dataMovie.js";

let templateFile = await fetch("./component/MovieCategory/template.html");
let template = await templateFile.text();




let MovieCategory = {};

MovieCategory.format = function(category,movies) {
    let html = template;
    html = html.replace("{{category}}", category);
  
    let html1 = Movie.formatMany(movies );
    html = html.replace("{{movies}}", html1);
    console.log("category:", category);
console.log("movies:", movies);

    return html
};


MovieCategory.formatMany = async function(categories, ageutilisateur = null) {
  let html = "";

  for (const obj of categories) {
      const movies = await DataMovie.requestMovieCategory(obj.id, ageutilisateur);

      if (Array.isArray(movies) && movies.length > 0) {
          html += MovieCategory.format(obj.name, movies);
      }
  }

  return html;
};

export { MovieCategory };




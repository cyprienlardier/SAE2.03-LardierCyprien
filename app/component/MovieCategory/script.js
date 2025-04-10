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


MovieCategory.formatMany = async function(categories){
    let html = "";
    for (const obj of categories) {
      const movies = await DataMovie.requestMovieCategory(obj.id);
      if (movies.length === 0){
        continue
      }
      else{
        console.log(movies);
        html += MovieCategory.format(obj.name, movies);
    }
}
    return html;
  };


export { MovieCategory };
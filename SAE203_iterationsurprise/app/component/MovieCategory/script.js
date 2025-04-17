import { Movie } from "../Movie/script.js";
import { DataMovie } from "../../data/dataMovie.js";

let templateFile = await fetch("./component/MovieCategory/template.html");
let template = await templateFile.text();

let MovieCategory = {};

// Fonction format correcte
MovieCategory.format = async function(category, movies) {
    let html = template;
    html = html.replaceAll("{{category}}", category);

    const uniqueId = `carousel-${category.replace(/\s+/g, "-").toLowerCase()}`;
    html = html.replaceAll("{{id}}", uniqueId);

    let html1 = await Movie.formatMany(movies);
    html = html.replaceAll("{{movies}}", html1);

    return html;
};

// Fonction formatMany correcte
MovieCategory.formatMany = async function(categories, ageutilisateur = null) {
    let html = "";

    for (const obj of categories) {
        const movies = await DataMovie.requestMovieCategory(obj.id, ageutilisateur);

        if (Array.isArray(movies) && movies.length > 0) {
            html += await MovieCategory.format(obj.name, movies);
        }
    }

    return html;
};

export { MovieCategory };

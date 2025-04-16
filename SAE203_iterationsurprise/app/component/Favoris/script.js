import { Movie } from "../Movie/script.js";



let Favoris = {};

Favoris.format = function (favoris) {

  if (!favoris || favoris.length === 0) {
    return "<p>Votre liste de favoris est vide.</p>";
  }

  return Movie.formatMany(favoris, true); // Assurez-vous que Movie.formatMany est utilisé
};

export { Favoris };
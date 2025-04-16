let templateFile = await fetch("./component/MovieDetail/template.html");
let template = await templateFile.text();

let MovieDetail = {};

MovieDetail.format = function (movie) {
  let detail = template;

  detail = detail.replace("{{url}}", movie.trailer);
  detail = detail.replace("{{titre}}", movie.name);
  detail = detail.replace("{{image}}", movie.image);
  detail = detail.replace("{{desc}}", movie.description);
  detail = detail.replace("{{realisateur}}", movie.director);
  detail = detail.replace("{{annee}}", movie.year);
  detail = detail.replace("{{duree}}", movie.length);
  detail = detail.replace("{{categorie}}", movie.category_name);
  detail = detail.replace("{{age}}", movie.min_age);

  return detail;
};

export { MovieDetail };
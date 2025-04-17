let templateFile = await fetch("./component/FilmMisenavant/template.html");
let template = await templateFile.text();

let FilmMisenavant = {};

FilmMisenavant.format = function (movies) {
  if (!movies.length) return "";

  let cards = "";
  for (let index = 0; index < movies.length; index++) {
    const movie = movies[index];
    const image = movie.image ?? "placeholder.jpg";
    const name = movie.name ?? "Sans titre";
    const age = movie.min_age ?? "N.C";
    const year = movie.year ?? "????";
    const category = movie.category_name ?? "Inconnu";
    const description = movie.description ?? "Aucune description disponible.";
    const trailer = movie.trailer ?? "Aucune trailer disponible.";
    cards += `
    <div class="reco__card" style="background-image: url('../server/images/${image}')">
      <div class="reco__content">
        <h3 class="reco__name">${name}</h3>
        <a class="reco__trailer" href="${trailer}" target="_blank">

          <span class="reco__trailerbtn">Trailer</span>
        </a>
      </div>
    </div>
  `;
  }
  

  return template.replace("{{movies}}", cards);
};





export { FilmMisenavant };
let FilmMisenavant = {};

async function loadTemplate() {
  let templateFile = await fetch("./component/FilmMisenavant/template.html");
  return await templateFile.text();
}

FilmMisenavant.format = async function (movies) {
  if (!movies.length) return "";

  let template = await loadTemplate(); 
  let card = "";

  for (let index = 0; index < movies.length; index++) {
    const movie = movies[index];
    const image = movie.image ?? "placeholder.jpg";
    const name = movie.name ?? "Sans titre";
    const age = movie.min_age ?? "N.C";
    const year = movie.year ?? "????";
    const category = movie.category_name ?? "Inconnu";
    const description = movie.description ?? "Aucune description disponible.";

    card += `
      <div class="mea__card" onclick="C.handlerDetail(${movie.id})" style="--i:${index + 1}">
        <div class="mea__img">
          <img class="mea__image" src="https://mmi.unilim.fr/~lardier6/SAE2.03-LardierCyprien/SAE203/server/images/${image}" alt="${name}" />
          <div class="mea__overlay">
            <h3 class="mea__name">${name}</h3>
          </div>
        </div>
      </div>`;
  }

  return template.replace("{{movies}}", card);
};

export { FilmMisenavant };


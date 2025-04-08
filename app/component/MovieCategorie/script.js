let templateFile = await fetch("./component/MovieCategorie/template.html");
let template = await templateFile.text();

let MovieCategorie = {};

MovieCategorie.format = function (categories) {
  let listHTML = categories
    .map(
      (cat) =>
        `<li class="categorie__tag" onclick="C.handlerCategorie('${cat.name}')">${cat.name}</li>`
    )
    .join("");

  let html = template.replace("{{categories}}", listHTML);
  return html;
};

export { MovieCategorie };
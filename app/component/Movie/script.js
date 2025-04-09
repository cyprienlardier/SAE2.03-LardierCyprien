let templateFile = await fetch("./component/Movie/template.html");
let template = await templateFile.text();


let Movie = {};

Movie.format = function(movie) {
  let html = template;
  
  html = html.replace("{{title}}", movie[0].name);
  console.log(movie[0].name);
  // console.log(movie.name);
  console.log(movie.image);
  

  html = html.replace("{{image}}", movie[0].image);
  html = html.replace(
    "{{handler}}",
    `C.handlerDetail(${movie.id})`);
  return html;
};

Movie.formatMany = function(movies) {
    let html = "";
    for (const r of movies) {
      html = html + Movie.format(r);
    }
    return html;
  };

export { Movie };
let templateFile = await fetch("./component/NavBar/template.html");
let template = await templateFile.text();

let NavBar = {};

NavBar.format = function (hAccueil) {
  let html = template;
  html = html.replace("{{hAccueil}}", hAccueil);
  return html;
};

export { NavBar };
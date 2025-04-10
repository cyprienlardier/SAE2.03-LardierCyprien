let templateFile = await fetch("./component/NavBar/template.html");
let template = await templateFile.text();

let NavBar = {};
NavBar.format = function (handlerMovies, handlerProfil, profils) {
  let html = template;
  html = html.replace("{{hAccueil}}", hAccueil);
  html = html.replace("{{handler}}", handlerProfil);

  let profil = "";
  for (let i = 0; i < profils.length; i++) {
    let p = profils[i];
    profil += `<option value="${p.nom}" data-img="${p.avatar}" data-dob="${p.age}">${p.nom}</option>`;
  }

  let avatar = profils[0]?.image || "";
  html = html.replace("{{profil}}", profil);
  html = html.replace("{{avatar}}", avatar);
  return html;
};



export { NavBar };




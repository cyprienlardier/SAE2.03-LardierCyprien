let HOST_URL = "..";
let DataProfil = {};

DataProfil.requestProfil = async function () {
    let answer = await fetch(HOST_URL + "/server/script.php?todo=readProfil");
    let profil = await answer.json();
    console.log("Profils récupérés :", profil); // Vérifiez les données ici
    return profil;
};

export {DataProfil};

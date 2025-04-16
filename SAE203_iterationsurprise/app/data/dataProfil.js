let HOST_URL = "https://mmi.unilim.fr/~lardier6/SAE2.03-LardierCyprien";
let DataProfil = {};

DataProfil.requestProfil = async function(){
    let answer = await fetch(HOST_URL + "/server/script.php?todo=readProfil" );
    let profil = await answer.json();
    return profil;
}

export {DataProfil};
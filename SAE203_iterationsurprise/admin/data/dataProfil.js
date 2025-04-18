let HOST_URL = "..";

let DataProfil = {};

    // fetch possède un deuxième paramètre (optionnel) qui est un objet de configuration de la requête HTTP:
    //  - method : la méthode HTTP à utiliser (GET, POST...)
    //  - body : les données à envoyer au serveur (sous forme d'objet FormData ou bien d'une chaîne de caractères, par exempe JSON)
    DataProfil.addProfil = async function (formData) {
        
       let config = {
            method: "POST",
            body: formData
        };
        let response = await fetch(HOST_URL + "/server/script.php?todo=addProfil", config)
        return await response.json();
       
    };

    DataProfil.update = async function (fdata) {
        let config = {
            method: "POST",
            body: fdata,
        };
        console.log("Données envoyées :", [...fdata.entries()]); // Ajoutez cette ligne pour déboguer
        let answer = await fetch(HOST_URL + "/server/script.php?todo=updateProfile", config);
        let data = await answer.json();
        console.log("Réponse du serveur :", data); // Ajoutez cette ligne pour déboguer
        return data;
    };

    DataProfil.readProfile = async function () {
        let answer = await fetch(
            HOST_URL + "/server/script.php?todo=readProfil"
        );
        let data = await answer.json();
        console.log("Profils récupérés :", data); // Vérifiez la réponse du serveur
        return data;
    };

export {DataProfil};
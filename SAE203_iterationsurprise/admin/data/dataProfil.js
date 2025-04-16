let HOST_URL = "https://mmi.unilim.fr/~lardier6/SAE2.03-LardierCyprien/SAE203_iterationsurprise";

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

export {DataProfil};
"use strict";

let urlSerie ="http://localhost:81/jah1000/Mini-Projet-JS/Api_Rest/api.php/serie?";


///////Modification/////////

function Put_Ajax(url, data) {
    let xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            afficherListe("#maTable");
            //            generer_alert("success", "Element modifié");
            console.log("success : Element modifié !!!");
        }
    };
    xhttp.open("PUT", url);
    xhttp.send(data);
}

function enregistrerModif(code) {
    let adresseModifiee = obtenirAdresse();
    console.log(adresseModifiee);
               Put_Ajax(urlBase + "/" + code, libModif);
}


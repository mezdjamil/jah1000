"use strict";

let urlSerie ="http://localhost:81/jah1000/Mini-Projet-JS/Api_Rest/api.php/episode?transform=1";

////////////////////////////////
//   Fonctions AJAX
////////////////////////////////

////GET + AFFICHAGE

function afficherListe(zone) {
    $(zone).empty();
    Get_Ajax(urlSerie, apresGet, zone);
}

function Get_Ajax(url, fonctionDeTraitement, zone) {
    let xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            fonctionDeTraitement(xhttp.responseText, zone);
        }
    };
    xhttp.open("GET", url, true);
    xhttp.send();
}

function apresGet(reponse, zone) {
    let episodes = JSON.parse(reponse);
    $(zone).append('<tr><th>Nom de l\'épisode</th><th>Code de l\'épisode</th><th>Code de la série</th></tr>');
   

    for (let index = 0; index < episodes.episode.length; index++) {

        let nomEpisode = episodes.episode[index].NOM_DE_L_EPISODE;
        let codeEpisode = episodes.episode[index].CODE_EPISODE;
        let codeSerie = episodes.episode[index].CODE_SERIE;
        $(zone).append('<tr><td>' + nomEpisode + '</td><td>' + codeEpisode + '</td><td>' + codeSerie + '</td></tr>');

    }
};

////// PROGRAMME PRINCIPAL////////

(function () {

    afficherListe("#maListe");

})();
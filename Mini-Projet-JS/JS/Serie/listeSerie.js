"use strict";

let urlSerie ="http://localhost:81/jah1000/Mini-Projet-JS/Api_Rest/api.php/serie?transform=1";
let urlSupprimSerie ="http://localhost:81/jah1000/Mini-Projet-JS/Api_Rest/api.php/serie/";

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

  //       DELETE

  function Delete_Ajax(url, fonctionDeTraitement) {
    let xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && ((this.status == 200) || (this.status == 0))) {
            fonctionDeTraitement(this);
        } else {
            if (this.status == 404) {
                //                generer_alert("danger", "Non trouvé !!!");
                console.log("danger : Non trouvé !!!");
            }
        }
    };
    xhttp.open("DELETE", url);
    xhttp.send(null);
    //    generer_alert("info", "En cours de suppression .....");

}

function supprimerSerie(codeSerie) {

    let reponse = confirm("Êtes-vous certain de vouloir supprimer cette série ?");
    if (reponse) {
        Delete_Ajax(urlSupprimSerie + "/" + codeSerie, apresDelete);
    }
};
function apresDelete(xhttp) {

    afficherListe("#maListe");
    //           console.log("le type a bien été supprimé ! ");
}



function apresGet(reponse, zone) {
    let series = JSON.parse(reponse);
    $(zone).append('<tr><th>Code Serie</th><th>Nom</th><th>Saison n°</th><th>Modifier</th><th>Supprimer</th></tr>');
   

    for (let index = 0; index < series.serie.length; index++) {

        let codeSerie = series.serie[index].CODE_SERIE;
        let nomSerie = series.serie[index].NOM_DE_LA_SERIE;
        let numSaison = series.serie[index].NUMERO_DE_LA_SAISON;

        $(zone).append('<tr><td>' + codeSerie + '</td><td>' + nomSerie + '</td><td>' + numSaison + '</td><td></td><td><span class="btnSupprimer"> <button CODE_SERIE = "' + codeSerie + '">Supprimer</button></span></td></tr>');

    }

    $('.btnSupprimer').click(function (e){

        supprimerSerie($(e.target).attr("CODE_SERIE"));

    });

};

////// PROGRAMME PRINCIPAL////////

(function () {

    afficherListe("#maListe");

})();
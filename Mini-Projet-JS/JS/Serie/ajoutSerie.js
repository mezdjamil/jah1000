"use strict";

let urlSerie ="http://localhost:81/jah1000/Mini-Projet-JS/Api_Rest/api.php/serie?";



       //POST
       function Post_Ajax(url, data) {
        let xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // afficherListe("#maListe");
                //            generer_alert("success", "Element ajouté");
                console.log("success : Element ajouté !!!");
            }
        };
        xhttp.open("POST", url);
        xhttp.send(data);
    }

        function enregistrerSerie() {

            let serieEnregistree = "NOM_DE_LA_SERIE=" + $("#nomDeLaSerie").val() 
                                 + "&NUMERO_DE_LA_SAISON=" + $("#numeroDeLaSaison").val();
            console.log(serieEnregistree);

            Post_Ajax(urlSerie, serieEnregistree);
        }



     ////////////////////////////////
       //   Programme principale
       ////////////////////////////////

       (function () {

        $("#sauvegarderNouvelleSerie").click(function(){

            enregistrerSerie();
        });


       })();

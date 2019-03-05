"use strict";

let urlEpisode ="http://localhost:81/jah1000/Mini-Projet-JS/Api_Rest/api.php/episode?";



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
   
        function enregistrerEpisode() {

            let episodeEnregistre = "NOM_DE_L_EPISODE=" + $("#nomDeLepisode").val() +"&CODE_SERIE=" + $("#selectionSerie").val(); 
                                 
            console.log(episodeEnregistre);

            Post_Ajax(urlEpisode, episodeEnregistre);
        }


        function requestSerie(callback) {
            var xhr = getXMLHttpRequest();
    
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
                    callback(xhr.responseText);
                }
            };
    
            xhr.open("GET", "http://localhost:81/jah1000/Mini-Projet-JS/Api_Rest/api.php/serie", true);
            xhr.send(null);
        };
    
        function readDataSerie(sData) {
    
            let recupSerie = JSON.parse(sData);
            $(recupSerie.serie.records).each(function (i) {
    
                $("#selectionSerie").append('<option value=' + recupSerie.serie.records[i][0] +  '>' + recupSerie.serie.records[i][1] + '</option>');
            })
    
    //        console.log(adresse.LIEU.records);
        };



     ////////////////////////////////
       //   Programme principale
       ////////////////////////////////

       (function () {

            requestSerie(readDataSerie);

        $("#sauvegarderNouvelEpisode").click(function(){

            enregistrerEpisode();
        })


       })();

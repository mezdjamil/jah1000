<?php

if (isset($_POST['envoi'])) {
    // $codeSerie, $nomSerie, $numeroSaison
    try {
        
        $serie = new Serie (1, $_POST['NOM_DE_LA_SERIE'],
                               intval($_POST['NUMERO_DE_LA_SAISON']));
        // var_dump($serie);
        $instance = new SerieDao();
         var_dump($serie);
        $instance->enregistrer($serie);

        header("location: listeSerie.php");

    } catch (Exception $erreur){
        echo "Erreur lors de l'ajout : ".$erreur->getMessage();
    }
} 
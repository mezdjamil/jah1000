<?php
 $listeSerie = "";

if (isset($_POST['NOM_DE_L_EPISODE'])) {
    // $codeSerie, $nomSerie, $numeroSaison
    try {
        // var_dump($_POST);
        $codeSerie = $_POST['serie'];
        $episode = new Episode (1, $_POST['NOM_DE_L_EPISODE'],intval($codeSerie));
  
        $instance = new EpisodeDao();
        $instance->enregistrer($episode);

       

         //Recupération de ID
        //  $idNouveauLogin =  $instance->getDernierId();
      

         header("location: listeEpisode.php");

    } catch (Exception $erreur){
        echo "Erreur lors de l'ajout : ".$erreur->getMessage();
    }
} else {

    $i = new SerieDao();
    $series = $i->recupererListe();


    foreach ($series as $serie) {
        $nomSerie = $serie->getNomSerie();
        $codeSerie = $serie->getCodeSerie();
        
        $listeSerie .= '<option value="'.$codeSerie.'">'.$nomSerie.'</option>';
    }

}
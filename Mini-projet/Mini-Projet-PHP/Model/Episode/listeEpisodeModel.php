<?php
// require "../../Dao/SerieDao.php";


$instance = new EpisodeDao();
// var_dump($instance);
$episodes = $instance->recupererListe();
// var_dump($series);

$model = "";

try {

    
    $model .= "<table class='table table-bordered table-hover table-responsive-* table-light text-dark'>

                <tr>
                    <th>Code Episode</th>
                    <th>Nom</th>
                    <th>Code Serie</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                    

                </th>";

foreach ($episodes as $episode) {

     $model .= "<tr>

                    <td>".$episode->getCodeEpisode()."</td>
                    <td>".$episode->getNomEpisode()."</td>
                    <td>".$episode->getCodeSerie()."</td>
                    <td><a href='../Serie/listeSerie.php'>Série</a></td>
                    <td><a href=''>Modif</a></td> 
                    <td><a href=''>Suppr</a></td>
                    

               </tr>";
        }

     $model .="</table>";

} catch (Exception  $erreur) {
    $model1 = "Erreur :".$erreur->getMessage();
}
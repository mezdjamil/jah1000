<?php
// require "../../Dao/SerieDao.php";


$instance = new SerieDao();
// var_dump($instance);
$series = $instance->recupererListe();
// var_dump($series);

$model = "";

try {

    
    $model .= "<table class='table table-bordered table-hover table-responsive-* table-light text-dark'>

                <tr>
                    <th>code</th>
                    <th>Nom</th>
                    <th>Saison</th>
                    <th>Episodes</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                    

                </th>";

foreach ($series as $serie) {

     $model .= "<tr>

                    <td>".$serie->getCodeSerie()."</td>
                    <td>".$serie->getNomSerie()."</td>
                    <td>".$serie->getNumeroSaison()."</td>
                    <td><a href='../Episode/listeEpisode.php'>Cliquez</a></td>
                    <td><a href=''>Modif</a></td> 
                    <td><a href=''>Suppr</a></td>
                    

               </tr>";
        }

     $model .="</table>";

} catch (Exception  $erreur) {
    $model1 = "Erreur :".$erreur->getMessage();
}
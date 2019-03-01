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
                    <td><div class='container'>
                   
                            <button type='button' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal' value='".$serie->getCodeSerie()."'>Ouvrir</button>
                  
                                <div class='modal fade' id='myModal' role='dialog'>
                                <div class='modal-dialog'>
                    
                      
                                     <div class='modal-content'>
                                     <div class='modal-header'>
                                         <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                         <h4 class='modal-title'>Episodes</h4>
                                     </div>
                                     <div class='modal-body'>
                                         <p>Bla bla bla.</p>
                                     </div>
                                     <div class='modal-footer'>
                                         <button type='button' class='btn btn-default' data-dismiss='modal'>Fermer</button>
                                     </div>
                                     </div>
                      
                                     </div>
                                     </div>
                  
                                     </div></td>
                    <td><a href=''>Modif</a></td> 
                    <td><a href=''>Suppr</a></td>
                   
               </tr>";
        }

     $model .="</table>";

} catch (Exception  $erreur) {
    $model1 = "Erreur :".$erreur->getMessage();
}
<?php 
// require "BaseDao.php";
// $codeSerie, $nomSerie, $numeroSaison
class SerieDao extends BaseDao {

    // private $dernierId;

    // public function getDernierId() {
    //     return $this->dernierId;
    // }
    

    public function enregistrer($serie) {
        
        $codeSerie = $serie->getCodeSerie();
        $nomSerie = $serie->getNomSerie();
        $numeroSaison = $serie->getNumeroSaison();
        

        $requete = 'INSERT INTO serie (NOM_DE_LA_SERIE, NUMERO_DE_LA_SAISON)
                            VALUES (:nomSerie, :numeroSaison)';

        $requetePreparee = $this->database->prepare($requete);
       


        $requetePreparee->bindParam(':nomSerie',$nomSerie, PDO::PARAM_STR);
        $requetePreparee->bindParam(':numeroSaison',intval($numeroSaison), PDO::PARAM_INT);

        // $requetePreparee->debugDumpParams();
        $resultat = $requetePreparee->execute();
        $this->testerErreur($resultat);
        $requetePreparee->closeCursor();
        
    }


    public function supprimer($serie) {

        $codeSerie = $serie->getCodeSerie();
        $nomSerie = $serie->getNomSerie();
        $numeroSaison = $serie->getNumeroSaison();

        $requete = 'DELETE FROM serie WHERE CODE_SERIE = :codeSerie';

        $requetePreparee = $this->database->prepare($requete);

        $requetePreparee->bindParam(':codeSerie', $codeSerie, PDO::PARAM_INT);
        
        $resultat = $requetePreparee->execute();
        // $requetePreparee->debugDumpParams();
        $this->testerErreur($resultat);
        $requetePreparee->closeCursor();
    }

    public function modifier($serie) {

        $codeSerie = $serie->getCodeSerie();
        $nomSerie = $serie->getNomSerie();
        $numeroSaison = $serie->getNumeroSaison();

        $requete = 'UPDATE serie SET NOM_DE_LA_SERIE = :nomSerie,
                                     NUMERO_DE_LA_SAISON = :numeroSaison
                                          WHERE CODE_SERIE = :codeSerie';

        $requetePreparee = $this->database->prepare($requete);

        $requetePreparee->bindParam(':codeSerie',intval($codeSerie), PDO::PARAM_INT);
        $requetePreparee->bindParam(':nomSerie',$nomSerie, PDO::PARAM_STR);
        $requetePreparee->bindParam(':numeroSerie',intval($numeroSerie), PDO::PARAM_INT);

        $resultat = $requetePreparee->execute();
        $this->testerErreur($resultat);
        $requetePreparee->closeCursor();
    }

    public function recupererListe() {

        $requete = 'SELECT * FROM serie ORDER BY NOM_DE_LA_SERIE';
 
        $resultat = $this->database->query($requete);
 
        if ($this->testerErreur($resultat)) {
            $series = [];
            while ($ligne = $resultat->fetch(PDO::FETCH_OBJ)) {
                $serie = new Serie(intval($ligne->CODE_SERIE),
                                          $ligne->NOM_DE_LA_SERIE,
                                   intval($ligne->NUMERO_DE_LA_SAISON) );
                                             
                 $series[] = $serie;
            }
        }
                 return $series;
 
     }


    //  public function affichageSerieEpisode() {

    //     $requête = 'SELECT serie.CODE_SERIE, NOM_DE_L_EPISODE, NOM_DE_LA_SERIE, NUMERO_DE_LA_SAISON
    //                 FROM episode INNER JOIN serie
    //                 ON (serie.CODE_SERIE = episode.CODE_SERIE)
    //                 WHERE(serie.CODE_SERIE)';


        

    //  }


    // public function recupererListe() {

    //     $requete = 'SELECT * FROM episode INNER JOIN serie
    //                     ON (serie.CODE_SERIE = episode.CODE_SERIE)
    //                     WHERE(serie.CODE_SERIE)';
    
 
    //     $resultat = $this->database->query($requete);
 
    //     if ($this->testerErreur($resultat)) {
    //         $series = [];
    //         while ($ligne = $resultat->fetch(PDO::FETCH_OBJ)) {
    //             $serie = new Serie(intval($ligne->CODE_SERIE),
    //                                       $ligne->NOM_DE_L_EPISODE,
    //                                       $ligne->NOM_DE_LA_SERIE,
    //                                intval($ligne->NUMERO_DE_LA_SAISON) );
                                             
    //              $series[] = $serie;
    //         }
    //     }
    //              return $series;


}

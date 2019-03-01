<?php 
// $codeEpisode, $nomEpisode, $codeSerie

class EpisodeDao extends BaseDao {

    public function enregistrer($episode) {

        $codeEpisode = $episode->getCodeEpisode();
        $nomEpisode = $episode->getNomEpisode();
        $codeSerie = $episode->getCodeSerie();

        $requete = 'INSERT INTO episode (NOM_DE_L_EPISODE, CODE_SERIE)
                            VALUES (:nomEpisode, :codeSerie)';

        $requetePreparee = $this->database->prepare($requete);
       

        $requetePreparee->bindParam(':nomEpisode',$nomEpisode, PDO::PARAM_STR);
        $requetePreparee->bindParam(':codeSerie',intval($codeSerie), PDO::PARAM_INT);
       

        // $requetePreparee->debugDumpParams();
        $resultat = $requetePreparee->execute();
        $this->testerErreur($resultat);
        $requetePreparee->closeCursor();
        
    }


    public function supprimer($episode) {

        $codeEpisode = $episode->getCodeEpisode();
        $nomEpisode = $episode->getNomEpisode();

        $requete = 'DELETE FROM episode WHERE CODE_EPISODE = :codeEpisode';

        $requetePreparee = $this->database->prepare($requete);

        $requetePreparee->bindParam(':codeEpisode', $codeEpisode, PDO::PARAM_INT);
        
        $resultat = $requetePreparee->execute();
        // $requetePreparee->debugDumpParams();
        $this->testerErreur($resultat);
        $requetePreparee->closeCursor();
    }

    public function modifier($episode) {

        $codeEpisode = $episode->getCodeEpisode();
        $nomEpisode = $episode->getNomEpisode();

        $requete = 'UPDATE login SET episode = :nomEpisode
                                          WHERE CODE_EPISODE = :codeEpisode';

        $requetePreparee = $this->database->prepare($requete);

        $requetePreparee->bindParam(':codeEpisode',intval($codeEpisode), PDO::PARAM_INT);
        $requetePreparee->bindParam(':nomEpisode',$mdp, PDO::PARAM_STR);

        $resultat = $requetePreparee->execute();
        $this->testerErreur($resultat);
        $requetePreparee->closeCursor();
    }

    public function recupererListe() {

        $requete = 'SELECT * FROM episode';
 
        $resultat = $this->database->query($requete);
 
        if ($this->testerErreur($resultat)) {
            $episodes = [];
            while ($ligne = $resultat->fetch(PDO::FETCH_OBJ)) {
                $episode = new Episode(intval($ligne->CODE_EPISODE),
                                              $ligne->NOM_DE_L_EPISODE,
                                              intval($ligne->CODE_SERIE)
                                              );
                                             
                 $episodes[] = $episode;
            }
        }
                 return $episodes;
 
     }


}
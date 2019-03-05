<?php

class Episode {

protected $codeEpisode, $nomEpisode, $codeSerie;

///////// Fabrication du constructeur de la class episode

public function __construct($codeEpisode, $CnomEpisode, $codeSerie) {

    $this->setCodeEpisode($codeEpisode);
    $this->setNomEpisode($CnomEpisode);
    $this->setCodeSerie($codeSerie);
}

//////////// GETTERS /////////////////

public function getCodeEpisode(){
    return $this->codeEpisode;
}

public function getNomEpisode(): string
{
    return $this->nomEpisode;
}

public function getCodeSerie(){
    return $this->codeSerie;
}


/////////// SETTERS /////////////////

public function setCodeEpisode($codeEpisode) {
    if (!is_int($codeEpisode)) {
        throw new Exception("ATTENTION !! le code Episode doit être en entier");
    }
    $this->codeEpisode = $codeEpisode;
}

public function setNomEpisode(string $VnomEpisode) {
    
     if (!is_string($VnomEpisode)) {
         throw new Exception("ATTENTION !! le nom de l'episode doit être en caractère");
     }else{
        $this->nomEpisode = $VnomEpisode;
     }
    
}

public function setCodeSerie($codeSerie) {
    if (!is_int($codeSerie)) {
        throw new Exception("ATTENTION !! le code serie doit être en entier");
    }
    $this->codeSerie = $codeSerie;
}

}
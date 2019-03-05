<?php

class Serie {

private $codeSerie, $nomSerie, $numeroSaison;

///////// Fabrication du constructeur de la class episode

public function __construct($codeSerie, $nomSerie, $numeroSaison) {

    $this->setCodeSerie($codeSerie);
    $this->setNomSerie($nomSerie);
    $this->setNumeroSaison($numeroSaison);
}

//////////// GETTERS /////////////////

public function getCodeSerie(){
    return $this->codeSerie;
}

public function getNomSerie(){
    return $this->nomSerie;
}

public function getNumeroSaison(){
    return $this->numeroSaison;
}


/////////// SETTERS /////////////////

public function setCodeSerie($codeSerie) {
    if (!is_int($codeSerie)) {
        throw new Exception("ATTENTION !! le code serie doit être en entier");
    }
    $this->codeSerie = $codeSerie;
}

public function setNomSerie($nomSerie) {
    if (!is_string($nomSerie)) {
        throw new Exception("ATTENTION !! le nom de la serie doit être en caractère");
    }
    $this->nomSerie = $nomSerie;
}

public function setNumeroSaison($numeroSaison) {
    if (!is_int($numeroSaison)) {
        throw new Exception("ATTENTION !! le numero de saison doit être en entier");
    }
    $this->numeroSaison = $numeroSaison;
}

}
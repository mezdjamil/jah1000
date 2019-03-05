<?php

abstract class BaseDao {
    protected $database = null;

    function __construct(){
        try {
            $this->database = GestionnaireDao::getInstance()->database;
        } catch (Exception $erreur) {
            die("Erreur : " . $erreur->getMessage());
        }
    }

    abstract public function enregistrer($objet);
    abstract public function supprimer($objet);
    abstract public function modifier($objet);
    abstract public function recupererListe();
    
    // abstract public function getById($ref);

    protected function testerErreur($resultat){
        if (!$resultat) {
            throw new Exception("ERREUR PDO : " .$this->database->errorInfo()[2]); 
        }
        return true;
    }
}
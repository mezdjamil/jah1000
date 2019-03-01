<?php

class GestionnaireDao {
    private static $instance; //avec static cet attribut appartient à toute la classe et non aux objets de la classe

    public $database;

    public static function getInstance() {
        //s'il existe pas on le créee
        if (!isset(self::$instance)) {
            try {
                self::$instance = new GestionnaireDao();
            } catch (Exception $erreur) {
                throw $erreur;
            }
        }
        // s'il existe on retourne
        return self::$instance;
    }

    private function __construct() {
        $url = URL;
        $utilisateur = BDD_UTILISATEUR;
        $motDePasse = BDD_MDP;
        
        try {
            $this->database = new PDO($url, $utilisateur, $motDePasse);
            $this->database->exec("SET NAMES utf8 COLLATE");
        } catch (PDOException $erreur) {
            throw new Exception("Problème de connexion : ". $erreur->getMessage());
            
        }
    }
}
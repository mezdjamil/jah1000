<?php
//$pdo->beginTransaction;
////////////////////////////////////////////////////////
////////////Initialisation accès Base de données////////
////////////////////////////////////////////////////////

define("BDD_HOST", "localhost");
// define("BDD_HOST", "10.106.69.63");
define("BDD_BD", "miniprojet");
define("BDD_UTILISATEUR", "root");
define("BDD_MDP", "");

define("URL", "mysql:dbname=".BDD_BD.";host=".BDD_HOST.";".BDD_UTILISATEUR.",".BDD_MDP);

////////////////////////////////////////////////////////
////////////Chargement dynamique des classes ///////////
////////////////////////////////////////////////////////

spl_autoload_register(function ($nomDeLaClasse){
    $repertoires = array( "../../", "../Class/", "Class/","../../Class/", "../Dao/", "Dao/", "../../Dao/");

    foreach($repertoires as $repertoire) {
        if (file_exists($repertoire.$nomDeLaClasse .".php")){
            require_once($repertoire.$nomDeLaClasse .".php");
            return;
        }
    }
});

////////////////////////////////////////////////////////
///////////////// Sécurisation du site /////////////////
////////////////////////////////////////////////////////
// define("SESSION_EXPIRED", 5*60);
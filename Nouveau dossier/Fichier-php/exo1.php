<?php
/* Ouverture du fichier */
$f = fopen('data.txt', 'r');
//$f = fopen('17-data-bis.txt', 'r');

print_r( $f);

/* Premiere lecture */
echo "Après ouverture<br/> premiere lecture <br/>";
$ligne = fgets($f,100);
//echo "$ligne<hr>";

/* TANT QUE pas fin de fichier */
while(!feof($f)){
    /* Traitement de la ligne dejà lue */
	echo "$ligne<hr>";
    
    /* Lecture suivante */
	$ligne = fgets($f,100 );
}

?>

<?php 

$fichier =fopen('data.txt' , 'r');

$ligne = fgets($fichier,100);

while(!feof($fichier)){
    
    echo "$ligne<hr>";
   
    $ligne = fgets($fichier,100);
}

fclose($fichier);

?>
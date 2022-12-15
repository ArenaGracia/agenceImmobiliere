<?php

function getConnection(){
    $_hote='localhost';     // le chemin vers le serveur
    $_port='3306';
    $_utilisateur='root';   // nom d'utilisateur pour se connecter
    $_mot_passe='';         // mot de passe de l'utilisateur pour se connecter
    $_nom_bd='agence';    // le nom de votre base de données

    $dsn='mysql:host='.$_hote.';port='.$_port.';dbname='.$_nom_bd;
    try {
        return  new PDO($dsn, $_utilisateur, $_mot_passe);
    } catch (PDOException $e) {
        echo 'Erreur : '.$e->getMessage().'<br />';
        echo 'N° : '.$e->getCode();
        die();
    }
}
?>
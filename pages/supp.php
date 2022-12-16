<?php
    include('../inc/fonction.php');
    $indice=$_GET['id'];
    $supp=suppHabitat($indice);
    header('Location: ./accueil.php?p=liste');
?>
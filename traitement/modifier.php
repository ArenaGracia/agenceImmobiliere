<?php
    include("../inc/fonction.php");
    $habitat=$_POST['idh'];
    $id_t=$_POST['type'];
    $nb=$_POST['chambre'];
    $quartier=$_POST['quartier'];
    $descri=$_POST['descri'];
    $loyer=$_POST['loyer'];
    $daty=$_POST['daty'];

    Update($habitat,$loyer,$daty,$descri,$nb,$quartier,$id_t);

    header('Location:../pages/accueil.php');
?>
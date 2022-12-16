<?php
    include("../inc/fonction.php");
    $id_t=$_POST['type'];
    $nb=$_POST['chambre'];
    $quartier=$_POST['quartier'];
    $descri=$_POST['descri'];
    $loyer=$_POST['loyer'];
    $daty=$_POST['daty'];

    $habitat=insertHabitat($id_t,$nb,$quartier);
?>
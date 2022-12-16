<?php
    include('../inc/fonction.php');
    $p=$_GET['id'];
    suppHabitat($p);
    header('Location:./accueil.php');
?> 
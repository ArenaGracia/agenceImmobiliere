<?php
    include("../inc/fonction.php");
    header( "Content-Type: application/json");

    $result = nb_habitation_par_jour($_GET['month'],$_GET['year']);
    
    echo json_encode($result);
?>
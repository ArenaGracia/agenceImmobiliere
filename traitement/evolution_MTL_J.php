<?php
    include("../inc/fonction.php");
    header( "Content-Type: application/json");

    $result = evolution_MTL_J($_GET['month'],$_GET['year']);
    
    echo json_encode($result);
?>
<?php
    include("../inc/fonction.php");
    header( "Content-Type: application/json");
    
    //  A remplacer par getMonth getYear
    $result = nb_habitation_par_jour(12,2022);
    // var_dump($result);

    out.println($result);   
   // echo json_encode($retour);
?>
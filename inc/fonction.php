<?php
    include('connection.php');

    function insertUser($email, $nom, $mdp, $num){
        $connexion = getConnection();
        $sql="INSERT INTO USER VALUES('%s','%s','%s','%s')";
        $sql=sprintf($sql,$email,$nom,$mdp,$num);
        $connexion->exec($sql);
    }

    function nb_habitation_par_jour($_month,$_year){
    }
    function montant_loyer_par_habitation($_month,$_year){
    }
?>
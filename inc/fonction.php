<?php
    include('connection.php');

    function insertUser($email, $nom, $mdp, $num){
        $connexion = getConnection();
        $sql="INSERT INTO USER VALUES('%s','%s','%s','%s')";
        $sql=sprintf($sql,$email,$nom,$mdp,$num);
        $connexion->exec($sql);
    }

    function nb_habitation_par_jour($_month,$_year){
        $xy = array();
        $xy[0] = array();
        $xy[1] = array();
        for($a = 1 ; $a <= 31 ; $a++){      // 31 jours
            $xy[0][$a-1] = $a;
            $xy[1][$a-1] = $a+10;
        }
        // $xy[1] = [12,14,57,987,56,43,566,43,34,67,875,332,1,0,21,12,34,776,19,84];
        return $xy;
    }

    function montant_loyer_par_habitation($_month,$_year){
    }
?>
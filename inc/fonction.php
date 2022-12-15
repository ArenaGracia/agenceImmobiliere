<?php
    include('connectionA.php');

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

    function montant_loyer_par_habitation($_month,$_year){}
    function verifyClient($email,$mdp){
        $connexion = getConnection();
        $sql="SELECT*FROM USER WHERE email='%s' AND mdp='%s'";
        $sql=sprintf($sql,$email,$mdp);
        $result = array();
        $result['id_U'] = array();
        $result['nom'] = array();
        $result['num'] = array();
        $resultats=$connexion->query($sql);
        $resultats->setFetchMode(PDO::FETCH_OBJ);
        while( $ligne = $resultats->fetch()) // on récupère la liste des membres
        {
            $result['id_U'][] = $ligne->id_U;
            $result['nom'][] = $ligne->nom;
            $result['num'][] = $ligne->num;
        }
        $resultats->closeCursor(); // on ferme le curseur des résultats
        return $result;   
    }

    function verifyAdmin($email,$mdp){
        $connexion = getConnection();
        $sql="SELECT*FROM Superuser WHERE email='%s' AND mdp='%s'";
        $sql=sprintf($sql,$email,$mdp);
        echo $sql;
        $result = array();
        $result['id_Su'] = array();
        $result['nom'] = array();
        $result['num'] = array();
        $resultats=$connexion->query($sql);
        $resultats->setFetchMode(PDO::FETCH_OBJ);
        while( $ligne = $resultats->fetch()) // on récupère la liste des membres
        {
            $result['id_Su'][] = $ligne->id_Su;
            $result['nom'][] = $ligne->nom;
            $result['num'][] = $ligne->num;
        }
        $resultats->closeCursor(); // on ferme le curseur des résultats
        return $result;   
    }

    function est_connect($c){
        session_start();
        $_SESSION['user']=$c;
        return !empty($_SESSION['user']);
    }
?>
<?php
    include('connectionJ.php');

    function insertUser($email, $nom, $mdp, $num){
        $connexion = getConnection();
        $sql="INSERT INTO USER VALUES('%s','%s','%s','%s')";
        $sql=sprintf($sql,$email,$nom,$mdp,$num);
        $connexion->exec($sql);
    }

    function nb_habitation_par_jour_BASE($_month,$_year){
        $connexion = getConnection();
        $sql = "SELECT * FROM reservation
                         WHERE (SELECT is_In(arriver,depart,".$_month.",".$_year.")) = 1";
        $result = array();
        $result['arriver'] = array();
        $result['depart'] = array();
        $resultats=$connexion->query($sql);
        $resultats->setFetchMode(PDO::FETCH_OBJ);
        while( $ligne = $resultats->fetch()) // on récupère la liste des membres
        {
            $result['arriver'][] = $ligne->arriver;
            $result['depart'][] = $ligne->depart;
        }
        $resultats->closeCursor(); // on ferme le curseur des résultats
        return $result; 
    }

    function evolution_MTL_J_BASE($_month,$_year){
        $connexion = getConnection();
        $sql = "SELECT SUM(montant) AS montant , daty FROM Loyer 
                       WHERE EXTRACT(MONTH FROM daty)=".$_month." AND EXTRACT(YEAR FROM daty)=".$_year."
                       GROUP BY daty";
        $result = array();
        $result['montant'] = array();
        $result['daty'] = array();
        $resultats=$connexion->query($sql);
        $resultats->setFetchMode(PDO::FETCH_OBJ);
        while( $ligne = $resultats->fetch()) // on récupère la liste des membres
        {
            $result['montant'][] = $ligne->montant;
            $result['daty'][] = $ligne->daty;
        }
        $resultats->closeCursor(); // on ferme le curseur des résultats
        return $result; 
    }

    function nb_habitation_par_jour($_month,$_year){
        $result = nb_habitation_par_jour_BASE($_month,$_year);
        $xy = [];
        $xy[0] = array();
        $xy[1] = array();
        for($a = 1 ; $a <= 31 ; $a++){                              // 31 jours
            $xy[0][$a-1] = $a;
            $xy[1][$a-1] = 0;
            for($b = 0 ; $b < count($result['arriver']) ; $b++){  
                if(intval(substr($result['arriver'][$b],8,10)) == $a){ ////////////////// A verifier les 5 et 7
                    $xy[1][$a-1] += 1;
                }
            }
        }
        return $xy;
    }

    function evolution_MTL_J($_month,$_year){
        $result = evolution_MTL_J_BASE($_month,$_year);
        $xy = [];
        $xy[0] = array();
        $xy[1] = array();
        for($a = 1 ; $a <= 31 ; $a++){      // 31 jours
            $xy[0][] = $a;
            $xy[1][] = 0;
            for($b = 0 ; $b < count($result['daty']) ; $b++){  
                if(intval(substr($result['daty'][$b],8,10)) == $a){ ////////////////// A verifier les 5 et 7
                    $xy[1][$a-1] += 1;
                }
            }
        }
        return $xy;
    }

    function montant_loyer_par_habitation($_month,$_year){

    }

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
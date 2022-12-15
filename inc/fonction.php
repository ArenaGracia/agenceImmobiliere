<?php
    include('connectionA.php');

    function insertUser($email, $nom, $mdp, $num){
        $connexion = getConnection();
        $sql="INSERT INTO USER VALUES('%s','%s','%s','%s')";
        $sql=sprintf($sql,$email,$nom,$mdp,$num);
        $connexion->exec($sql);
    }

    function nb_habitation_par_jour($_month,$_year){                // non base
        $xy[0] = array();
        $xy[1] = array();
        for($a = 1 ; $a <= 31 ; $a++){      // 31 jours
            $xy[0][] = $a;
            $xy[1][] = $a+10;
        }
        return $xy;
    }
    function evolution_MTL_J($_month,$_year){                // non base
        $xy[0] = array();
        $xy[1] = array();
        for($a = 1 ; $a <= 31 ; $a++){      // 31 jours
            $xy[0][] = $a;
            $xy[1][] = $a+10;
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

    function ListHabitat()
    {
        $connexion = getConnection();
        $sql="SELECT*FROM listeHabitat";
        $resultats=$connexion->query($sql);
        $resultats->setFetchMode(PDO::FETCH_OBJ);
        $result = array();
        $result['nom'] = array();
        $result['nom_p'] = array();
        $result['quartier'] = array();
        $result['id_h'] = array();
        $result['montant'] = array();
        $result['descriptions'] = array();
        while( $ligne = $resultats->fetch()) // on récupère la liste des habitations
        {
            $result['nom'][] = $ligne->nom;
            $result['nom_p'][] = $ligne->nom_p;
            $result['quartier'][] = $ligne->quartier;
            $result['id_h'][] = $ligne->id_h;
            $result['montant'][] = $ligne->montant;
            $result['descriptions'][] = $ligne->descriptions;
        }
        $resultats->closeCursor(); // on ferme le curseur des résultats
        return $result;   
    }

    function ListHabitatById($id)
    {
        $connexion = getConnection();
        $sql="SELECT*FROM listeHabitat WHERE id_h=$id";
        $resultats=$connexion->query($sql);
        $resultats->setFetchMode(PDO::FETCH_OBJ);
        $result = array();
        $result['nom'] = array();
        $result['nom_p'] = array();
        $result['quartier'] = array();
        $result['id_h'] = array();
        $result['montant'] = array();
        $result['descriptions'] = array();
        while( $ligne = $resultats->fetch()) // on récupère la liste des habitations
        {
            $result['nom'][] = $ligne->nom;
            $result['nom_p'][] = $ligne->nom_p;
            $result['quartier'][] = $ligne->quartier;
            $result['id_h'][] = $ligne->id_h;
            $result['montant'][] = $ligne->montant;
            $result['descriptions'][] = $ligne->descriptions;
        }
        $resultats->closeCursor(); // on ferme le curseur des résultats
        return $result;   
    }

    function getImages($id){
        $connexion = getConnection();
        $sql="SELECT*FROM photo_h WHERE id_h=$id";
        $resultats=$connexion->query($sql);
        $resultats->setFetchMode(PDO::FETCH_OBJ);  
        $result = array();
        $result['nom_p'] = array();  
        while( $ligne = $resultats->fetch()) // on récupère la liste des images par habitations
        {
            $result['nom_p'][] = $ligne->nom_p;
        } 
        $resultats->closeCursor(); // on ferme le curseur des résultats
        return $result;      
    }

    function searchHabitat($string){
        $connexion = getConnection();
        $sql="SELECT * FROM ListeHabitat WHERE descriptions LIKE '%$string%'";
        $resultats=$connexion->query($sql);
        $resultats->setFetchMode(PDO::FETCH_OBJ);
        $result = array();
        $result['nom'] = array();
        $result['nom_p'] = array();
        $result['quartier'] = array();
        $result['id_h'] = array();
        $result['montant'] = array();
        $result['descriptions'] = array();
        while( $ligne = $resultats->fetch()) // on récupère la liste des habitations par la recherche
        {
            $result['nom'][] = $ligne->nom;
            $result['nom_p'][] = $ligne->nom_p;
            $result['quartier'][] = $ligne->quartier;
            $result['id_h'][] = $ligne->id_h;
            $result['montant'][] = $ligne->montant;
            $result['descriptions'][] = $ligne->descriptions;
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
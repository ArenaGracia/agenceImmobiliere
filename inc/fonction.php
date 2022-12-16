<?php
    include('connectionA.php');

    function insertUser($email, $nom, $mdp, $num){
        $connexion = getConnection();
        $sql="INSERT INTO USER VALUES((SELECT*FROM id_user),'%s','%s','%s','%s')";
        $sql=sprintf($sql,$nom,$email,$mdp,$num);
        echo $sql;
        $connexion->exec($sql);
    }

    function insertHabitat($id_t,$nb,$quartier){
        $connexion = getConnection();
        $sql="SELECT*FROM id_habit";
        $resultats=$connexion->query($sql);
        $resultats->setFetchMode(PDO::FETCH_OBJ);
        $i=0;
        while( $ligne = $resultats->fetch()) // on récupère la liste des membres
        {
            $i=$ligne->c;
        }
        $resultats->closeCursor(); // on ferme le curseur des résultats
        $sql="INSERT INTO Habitation VALUES($i,$id_t,$nb,'$quartier')";
        $connexion->exec($sql);
        echo $sql;
        return $i;  
    }

    function insertLoyer($habitat,$loyer,$date){
        $connexion = getConnection();
        $sql="INSERT INTO Loyer VALUES($habitat,$loyer,'$date')";
        echo $sql;
        $connexion->exec($sql);        
    }

    function insertDescriptions($habitat,$descri){
        $connexion = getConnection();
        $sql="INSERT INTO description_h VALUES($habitat,'$descri')";
        echo $sql;
        $connexion->exec($sql);        
    }

    function insertImages($habitat,$fichier){
        $connexion = getConnection();
        $sql="INSERT INTO photo_h VALUES($habitat,'$fichier')";
        echo $sql;
        $connexion->exec($sql);        
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

    function suppHabitat($id){
        $connexion = getConnection();
        $sql="DELETE FROM Habitation WHERE id_h=$id";
        $connexion->exec($sql);
    }

    function getAllType(){
        $connexion = getConnection();
        $sql="SELECT * FROM Type_h";
        $resultats=$connexion->query($sql);
        $resultats->setFetchMode(PDO::FETCH_OBJ);
        $result = array();
        $result['id_t'] = array();
        $result['nom'] = array();


        while( $ligne = $resultats->fetch()) // on récupère la liste des habitations par la recherche
        {
            $result['id_t'][] = $ligne->id_t;
            $result['nom'][] = $ligne->nom;
        }
        $resultats->closeCursor(); // on ferme le curseur des résultats
        return $result;          
    }

    function getInfo($id){
        $connexion = getConnection();
        $sql="SELECT * FROM Habitation WHERE id_h=$id";
        $resultats=$connexion->query($sql);
        $resultats->setFetchMode(PDO::FETCH_OBJ);
        $result = array();
        $result['id_h'] = array();
        $result['id_t'] = array();
        $result['nb_chambre'] = array();
        $result['quartier'] = array();
        while( $ligne = $resultats->fetch()) // on récupère la liste des habitations par la recherche
        {
            $result['id_h'][] = $ligne->id_h;
            $result['id_t'][] = $ligne->id_t;
            $result['nb_chambre'][] = $ligne->nb_chambre;
            $result['id_h'][] = $ligne->id_h;
            $result['quartier'][] = $ligne->quartier;
        }
        $resultats->closeCursor(); // on ferme le curseur des résultats
        return $result;          
    }

    function getTypes($id){
        $connexion = getConnection();
        $sql="SELECT * FROM Type_h WHERE id_t=$id";
        $resultats=$connexion->query($sql);
        $resultats->setFetchMode(PDO::FETCH_OBJ);
        $result = "";

        while( $ligne = $resultats->fetch()) // on récupère la liste des habitations par la recherche
        {
            $result= $ligne->nom;
        }
        $resultats->closeCursor(); // on ferme le curseur des résultats
        return $result;         
    }

    function getDescri($id){
        $connexion = getConnection();
        $sql="SELECT * FROM Description_h WHERE id_h=$id";
        $resultats=$connexion->query($sql);
        $resultats->setFetchMode(PDO::FETCH_OBJ);
        $result = "";

        while( $ligne = $resultats->fetch()) // on récupère la liste des habitations par la recherche
        {
            $result= $ligne->descriptions;
        }
        $resultats->closeCursor(); // on ferme le curseur des résultats
        return $result;         
    }

    function getLoyer($id){
        $connexion = getConnection();
        $sql="SELECT * FROM Loyer WHERE id_h=$id";
        $resultats=$connexion->query($sql);
        $resultats->setFetchMode(PDO::FETCH_OBJ);
        $result = array();
        $result['montant'] = array();
        $result['daty']=array();

        while( $ligne = $resultats->fetch()) // on récupère la liste des habitations par la recherche
        {
            $result['montant'][]= $ligne->montant;
            $result['daty'][]=$ligne->daty;
        }
        $resultats->closeCursor(); // on ferme le curseur des résultats
        return $result;         
    }

    function Update($habitat,$loyer,$daty,$descri,$nbr,$quartier,$type){
        $connexion = getConnection();
        $sql="UPDATE Loyer SET montant=$loyer AND daty='$daty' WHERE id_h=$habitat";
        // echo $sql;
        $connexion->exec($sql);
        $sql="UPDATE Description_h SET descriptions='$descri' WHERE id_h=$habitat";
        // echo $sql;
        $connexion->exec($sql);
        $sql="UPDATE Habitation SET id_t=$type,nb_chambre=$nbr,quartier='$quartier' WHERE id_h=$habitat";
        // echo $sql;
        $connexion->exec($sql);
    }



    // function verifyReserve($date1,$date2,$idHab){
    //     $connexion=getConnection();
    //     $sql="select Date(arriver) date1, Date(depart) date2 from reservation where id_h=1";
    //     $resultats=$connexion->query($sql);
    //     $result = array();

    //     while( $ligne = $resultats->fetch()) // on récupère la liste des habitations par la recherche
    //     {
    //         $result[]= $ligne->arriver;
    //         $result[]=$ligne->depart;
    //     }

    //     if($result['date1']>=$date1 && $result['date2'<date2]){
    //         $i=0;
    //     }
    //     else{
    //         $i=1;
    //     }
    //     $resultats->closeCursor(); // on ferme le curseur des résultats
    //     return $result;         

    // }

    // function getCalendar($idHabitat)
    // {
    //     $connexion=getConnection();
    //     $sql="SELECT*FROM Reservation WHERE id_h=$idHabitat";
    //     $resultats=$connexion->query($sql);
    //     $resultats->setFetchMode(PDO::FETCH_OBJ);
    //     $result = array();
    //     $date

        
    // }

    function est_connect($c){
        session_start();
        $_SESSION['user']=$c;
        return !empty($_SESSION['user']);
    }

?>

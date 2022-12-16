<?php 
    function insertUser($email, $nom, $mdp, $num){
        $connexion = getConnection();
        $sql="INSERT INTO USER VALUES('%s','%s','%s','%s')";
        $sql=sprintf($sql,$email,$nom,$mdp,$num);
        $connexion->exec($sql);
    }

    function insertHabitat($id_t,$nb,$quartier){
        $connexion = getConnection();
        $sql="SELECT*FROM id_user";
        $resultats=$connexion->query($sql);
        $resultats->setFetchMode(PDO::FETCH_OBJ);
        $i=0;
        while( $ligne = $resultats->fetch()) // on récupère la liste des membres
        {
            $i=$ligne->c;
        }
        $resultats->closeCursor(); // on ferme le curseur des résultats
        $sq="INSERT INTO User VALUES($id,$id_t,$nb,'$quartier')";
        echo $sql;
        return $id;  
    }

    function insertLoyer($habita,$loyer,$date){
        $connexion = getConnection();
        $sql="INSERT INTO Loyer VALUES($habitat,$loyer,'$date')";
        echo $sql;
        // $connexion->exec($sql);        
    }

    function insertDescriptions($habitat,$descri){
        $connexion = getConnection();
        $sql="INSERT INTO description_h VALUES($habitat,'$descri')";
        echo $sql;
        // $connexion->exec($sql);        
    }

    function insertImages($habitat,$fichier){
        function insertLoyer($habita,$loyer,$date){
            $connexion = getConnection();
            $sql="INSERT INTO photo_h VALUES($habitat,'$string')";
            echo $sql;
            // $connexion->exec($sql);        
        }
    }
?>
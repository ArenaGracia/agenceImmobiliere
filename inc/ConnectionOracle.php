<?php
    function oracleConnection($utilisateur,$motdepasse){
        $hote = 'localhost'; 
        $port = '1521'; // port par défaut 
        $service = 'orcl'; 
        $lien_base = "oci:dbname=(
                        DESCRIPTION = 
                            (ADDRESS_LIST = 
                                (ADDRESS =  (PROTOCOL = TCP)  
                                (Host = ".$hote .")  
                                (Port = ".$port.")) 
                            ) 
                            (CONNECT_DATA = 
                                (SERVICE_NAME = ".$service.") 
                            ) 
                        )";
        try { // connexion à la base Oracle et création de l'objet
            $connexion = new PDO($lien_base, $utilisateur, $motdepasse); 
        } catch (PDOException $erreur) { 
            print "Erreur ! : " . $e->getMessage();
            die();
        }
        return $connexion;
    }
?>
<?php
// Get data with QUERY and FETCH
    $dbh = oracleConnection('ObjectDB','johan');
    try{
        $request = "select*from personne";
        $resultats=$dbh->query($request);           // o n va chercher tous les membres de la table qu'on trie par ordre croissant 
        $resultats->setFetchMode(PDO::FETCH_OBJ);   // on dit qu'on veut que le résultat soit récupérable sous forme d'objet 
        // $answer = $resultats->fetchAll();
        // var_dump($answer);
        while( $ligne = $resultats->fetch())       // on récupère la liste des membres 
        {        
            echo 'Nom de personne : '.$ligne->NAME.' '.$ligne->USERNAME.'<br />'; // on affiche les membres 
        } 
        $resultats->closeCursor(); // on ferme le curseur des résultats
        $dbh = null;
    } catch (PDOException $e) {
        print "Erreur ! : " . $e->getMessage();
        die();
    }
?>

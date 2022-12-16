<?php
    include("../inc/fonction.php");
    $id_t=$_POST['type'];
    $nb=$_POST['chambre'];
    $quartier=$_POST['quartier'];
    $descri=$_POST['descri'];
    $loyer=$_POST['loyer'];
    $daty=$_POST['daty'];

    $habitat=insertHabitat($id_t,$nb,$quartier);
    insertLoyer($habitat,$loyer,$daty);
    insertDescriptions($habitat,$descri);
    
    $dossier='../assets/img/';
    $fichier=basename($_FILES['avatar']['name']);
    $taille_maxi = 300000000;
    $taille = filesize($_FILES['avatar']['tmp_name']);
    $extensions = array('.png', '.gif', '.jpg', '.jpeg');
    //maka extensions
    $extension = strrchr($_FILES['avatar']['name'], '.');
    if(!in_array($extension, $extensions))
    {
        $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg';
    }
    if($taille>$taille_maxi)
    {
        $erreur = 'Le fichier est trop gros...';
    }
    if(!isset($erreur))
    {
        //On formate le nom du fichier ici...
        $fichier = strtr($fichier,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ','AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
        $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
        if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si
        {
            insertImages($habitat,$fichier);
        }
        else
        {
            echo 'Echec de l\'upload !';
        }
    }
    else{
        echo $erreur;
    }

    $dossier='../assets/img/';
    $fichier=basename($_FILES['avatar1']['name']);
    $taille_maxi = 300000000;
    $taille = filesize($_FILES['avatar1']['tmp_name']);
    $extensions = array('.png', '.gif', '.jpg', '.jpeg');
    //maka extensions
    $extension = strrchr($_FILES['avatar1']['name'], '.');
    if(!in_array($extension, $extensions))
    {
        $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg';
    }
    if($taille>$taille_maxi)
    {
        $erreur = 'Le fichier est trop gros...';
    }
    if(!isset($erreur))
    {
        //On formate le nom du fichier ici...
        $fichier = strtr($fichier,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ','AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
        $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
        if(move_uploaded_file($_FILES['avatar1']['tmp_name'], $dossier . $fichier)) //Si
        {
            insertImages($habitat,$fichier);
        }
        else
        {
            echo 'Echec de l\'upload !';
        }
    }
    else{
        echo $erreur;
    }

    $dossier='../assets/img/';
    $fichier=basename($_FILES['avatar2']['name']);
    $taille_maxi = 300000000;
    $taille = filesize($_FILES['avatar2']['tmp_name']);
    $extensions = array('.png', '.gif', '.jpg', '.jpeg');
    //maka extensions
    $extension = strrchr($_FILES['avatar2']['name'], '.');
    if(!in_array($extension, $extensions))
    {
        $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg';
    }
    if($taille>$taille_maxi)
    {
        $erreur = 'Le fichier est trop gros...';
    }
    if(!isset($erreur))
    {
        //On formate le nom du fichier ici...
        $fichier = strtr($fichier,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ','AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
        $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
        if(move_uploaded_file($_FILES['avatar2']['tmp_name'], $dossier . $fichier)) //Si
        {
            insertImages($habitat,$fichier);
        }
        else
        {
            echo 'Echec de l\'upload !';
        }
    }
    else{
        echo $erreur;
    }
?>
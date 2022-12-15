<?php
    include('../inc/fonction.php');
    $pass=$_POST['pass'];
    $email=$_POST['email'];

    $val=verifyAdmin($email,$pass);


    $_SESSION['user'] = $val['id_Su'][0];
    $_SESSION['value']=1;

    if(est_connect($_SESSION['user']))
    {
        header('Location:accueil.php');
    }
    else{
        header('Location:loginAdmin.php?retour');
    }
?>
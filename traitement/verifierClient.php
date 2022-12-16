<?php
    include('../inc/fonction.php');
    $pass=$_POST['pass'];
    $email=$_POST['email'];

    $val=verifyClient($email,$pass);


    $_SESSION['user'] = $val['id_U'][0];

    if(est_connect($_SESSION['user']))
    {
        header('Location:../pages/accueil.php');
    }
    else{
        header('Location:../pages/login.php?retour');
    }
?>
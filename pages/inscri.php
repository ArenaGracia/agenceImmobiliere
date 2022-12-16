<?php
    include("../inc/fonction.php");

    $mail=$_POST['email'];
    $name=$_POST['name'];
    $pass=$_POST['pass'];
    $tel=$_POST['tel'];

    insertUser($mail,$name,$pass,$tel);

    $val=verifyClient($mail,$pass);


    $_SESSION['user'] = $val['id_U'][0];

    if(est_connect($_SESSION['user']))
    {
        header('Location:accueil.php');
    }
    else{
        header('Location:login.php?retour');
    }
?>
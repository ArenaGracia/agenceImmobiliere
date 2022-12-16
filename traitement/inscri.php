<?php
    include('../inc/fonction.php');
    $email=$_POST['email'];
    $name=$_POST['name'];
    $pass=$_POST['pass'];
    $tel=$_POST['tel'];

    insertUser($email, $name, $pass, $tel);

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
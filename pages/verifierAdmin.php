<?php
    include('../inc/fonction.php');
    $pass=$_POST['pass'];
    $email=$_POST['email'];

    $val=verifyAdmin($email,$pass);


    $_SESSION['user'] = $val['id_Su'][0];

    if(est_connect($_SESSION['user']))
    {
        $_SESSION['user']=0;
        header('Location:accueil.php');
    }
    else{
        header('Location:loginAdmin.php?retour');
    }
?>
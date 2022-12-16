<?php
    include('../inc/fonction.php');
    $date1=$_POST['date1'];
    $date2=$_POST['date2'];

    verifyReserve($date1,$date2,1);
?>
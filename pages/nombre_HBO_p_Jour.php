<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<script src="../assets/MyJs/Chart.js"></script>
<script src="../assets/MyJs/fonction.js"></script>
<script src="../inc/fonction.js"></script>
<body>

  <header><h3>Nombres' habitation occup&eacute;e(s) par jour </h3></header>

  <canvas id="bar-chart"  style="margin-left:10%;max-width:80%;"></canvas>
  
  Month<input type="number">
  Year<input type="number">
  <input type="button" onclick="sendMonthYear()">

</body>
</html>
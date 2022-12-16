<?php
?>
<!DOCTYPE html>
<html>
<script src="../assets/MyJs/Chart.js"></script>
<script src="../assets/MyJs/fonction.js"></script>
<script src="../inc/fonction.js"></script>
<body>

	<header><h3>Evolution du montant des loyers d` habitation par jour</h3></header>

<<<<<<< HEAD
	<?php
        include("../inc/fonction.php"); 
		evolution_MTL_J(10,2022);
   ?>

	<form id="crit">
		Month<input type="number" id="month" name="month">
		Year<input type="number" id="year" name="year">
=======
	<form id="crit">
		Month<input type="number" name="month">
		Year<input type="number" name="year">
>>>>>>> Arena
		<input type="submit" onclick="evolution_MTL_J()" value="save">
	</form>

	<canvas id="line-chart"  style="margin-left:10%;max-width:80%;"></canvas>

</body>
</html>

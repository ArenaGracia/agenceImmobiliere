<?php
?>
<!DOCTYPE html>
<html>
<script src="../assets/MyJs/Chart.js"></script>
<script src="../assets/MyJs/fonction.js"></script>
<script src="../inc/fonction.js"></script>
<body>

	<header><h3>Evolution du montant des loyers d` habitation par jour</h3></header>

	<form id="crit">
		Month<input type="number" name="month">
		Year<input type="number" name="year">
		<input type="submit" onclick="evolution_MTL_J()" value="save">
	</form>

	<canvas id="line-chart"  style="margin-left:10%;max-width:80%;"></canvas>

</body>
</html>

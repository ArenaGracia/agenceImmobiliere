<?php
?>
<!DOCTYPE html>
<html>
<script src="Chart.js"></script>
<body>

	<header><h3>Evolution du montant des loyers d` habitation par jour</h3></header>

	<canvas id="line-chart"  style="margin-left:10%;max-width:80%;"></canvas>
	<script>
		var xValues = Array();
		var nb_mois = 31;
		for(var days = 1 ; days <= nb_mois ; days++){      // 31 jours
		xValues[days-1] = days;
		}
		// -------------------------------------------- Y values -------------------------------------------------
		var yValues = [-50,16,25,10,-20,-30,-10,8,10,12,12,12];
		// ------------------------------------------- Y values -------------------------------------------------
		new Chart(document.getElementById("line-chart"), {
		type: 'line',
		data: {
			labels: xValues,
			datasets: [{ 
				label: "Evolution montant des loyers (Global)",
				data: yValues,
				borderColor: "#3e95cd",
				fill: false
			}]
		},
		options: {
			title: {display: true},
          	scales: {
            yAxes: [{ticks: {min: 0, max:40}}],
          }
		}
		});
	</script>

</body>
</html>

function sendMonthYear(){ 
    var xhr;                                                        // petit navigateur 
    try {  xhr = new ActiveXObject('Msxml2.XMLHTTP');   }           // les 3 navigateurs
    catch (e) 
    {
        try {   xhr = new ActiveXObject('Microsoft.XMLHTTP'); }
        catch (e2) 
        {
           try {  xhr = new XMLHttpRequest();  }
           catch (e3) {  xhr = false;   }
         }
    }
  
    xhr.onreadystatechange  = function() { 
       if(xhr.readyState  == 4){
            console.log("okok");
            if(xhr.status  == 200) {
                // var retour = JSON.parse(xhr.responseText);
                // affiche_graphe(retour[0],retour[1]);
            } else {
                document.dyn="Error code " + xhr.status;
            }
        }
    }; 
    //XMLHttpRequest.open(method, url, async)
    xhr.open("GET", "../traitement/nb_habitation.php",  true);
    //XMLHttpRequest.send(body)
    xhr.send(); 
}
function affiche_graphe(xValues,yValues){
    var nb_mois = 31;
    var colors = getRandomColor(nb_mois);

    new Chart(document.getElementById("bar-chart"), {
        type: 'bar',
        data: {
          labels: xValues,
          datasets: [
            {
              label: "Habitation ocuppés par jour (unité)",
              backgroundColor: colors,
              data: yValues
            }
          ]
        },
        options: {
          legend: { display: false },
          title:  { display: true },
          scales: {
            yAxes: [{ticks: {min: 0, max:40}}],
          }
        }
    });
}
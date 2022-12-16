function nombre_HBO_J(){ 
    avoidPreventDefault("crit");
    var m_y = can_with_Month_year();
   if(can_with_Month_year() == false)return;
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
                var retour = JSON.parse(xhr.responseText);
                graphe_bar(retour[0],retour[1],"bar-chart");
            } else {
                document.dyn="Error code " + xhr.status;
            }
        }
    }; 
    //XMLHttpRequest.open(method, url, async)
    xhr.open("GET", "../traitement/nb_habitation.php?month="+m_y[0]+"&year="+m_y[1],  true);
    //XMLHttpRequest.send(body)
    xhr.send(); 
}
function evolution_MTL_J(){ 
    avoidPreventDefault("crit");
    var m_y = can_with_Month_year();
   if(can_with_Month_year() == false)return;
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
                var retour = JSON.parse(xhr.responseText);
                graphe_line(retour[0],retour[1],"line-chart");
            } else {
                document.dyn="Error code " + xhr.status;
            }
        }
    }; 
    //XMLHttpRequest.open(method, url, async)
    xhr.open("GET", "../traitement/nb_habitation.php?month="+m_y[0]+"&year="+m_y[1],  true);
    //XMLHttpRequest.send(body)
    xhr.send(); 
}
function graphe_bar(xValues,yValues,canvas_id){
    var nb_mois = 31;
    var colors = getRandomColor(nb_mois);

    new Chart(document.getElementById(canvas_id), {
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
function graphe_line(xValues,yValues,canvas_id){
    new Chart(document.getElementById(canvas_id), {
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
}
function avoidPreventDefault(forms){
  // Accédez à l'élément form …
  var form = document.getElementById(forms);
  // … et prenez en charge l'événement submit.
  form.addEventListener("submit", function (event) {
    event.preventDefault(); // évite de faire le submit par défaut
  });
}
function can_with_Month_year(){
    var m_y = [];
    if(document.getElementsByName("month").innerHTML == "" || document.getElementsByName("year").innerHTML == ""){
        alert("Please insert the correct date");
        return false;
    }else{
        m_y[0] = document.getElementsByName("month").innerHTML;
        m_y[1] = document.getElementsByName("year").innerHTML;
        return m_y;
    }
} 
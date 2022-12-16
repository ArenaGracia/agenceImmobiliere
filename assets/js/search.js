    function getPost(){
        var xhr; 
        try {  xhr = new ActiveXObject('Msxml2.XMLHTTP');   }
        catch (e) 
        {
            try {   xhr = new ActiveXObject('Microsoft.XMLHTTP'); }
            catch (e2) 
            {
                try {  xhr = new XMLHttpRequest();  }
                catch (e3) {  xhr = false;   }
            }
        }
    
        var form=document.getElementById('search');
        var formulaire1=new FormData(form);

        xhr.addEventListener('load', function(event) {
            var pub=document.getElementById('div4');

            var result=JSON.parse(xhr.responseText);
            pub.innerHTML="../assets/img/"+result['nom_p'][0];

            for(let i=0;i<result['nom'].length;i++){
                var div1=document.createElement('div');
                var div2=document.createElement('div');
                var div3=document.createElement('div');
                
                div1.className="col-sm-6 col-md-3";
                div2.className="thumbnail";
                div3.className="caption";
                
                var img=document.createElement('img');
                img.src="../assets/img/"+result['nom_p'][i];

                var label=document.createElement('label');
                var p1=document.createElement('p');
                var p2=document.createElement('p');
                
                label.textContent=result['nom'][i]+" "+result['quartier'][i];
                p1.textContent=result['descriptions'][i];
                p2.textContent=result['montant'][i];

                div1.appendChild(label);
                div1.appendChild(p1);
                div1.appendChild(p2);

                div2.appendChild(div1);
                div2.appendChild(img);

                div3.appendChild(div2);
                pub.appendChild(div3);
            }
        });

        xhr.addEventListener('error', function(event) {
            alert("Une erreur est survenue");
        });
    
        xhr.open('POST','./search.php');
        xhr.send(formulaire1);
    
    
        form.addEventListener('submit', function(event){
            event.preventDefault();
            getPost();
        });
    } 

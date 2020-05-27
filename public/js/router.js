var inscription=document.getElementById('inscription');
var connexion=document.getElementById('connexion');
var container=document.getElementById('container');

inscription.onclick=()=>{
    sendData();
}



function sendData(id, idForm) 
{
    // document.getElementById(idForm).innerHTML = data;

    var ajx = new XMLHttpRequest();
    ajx.onreadystatechange = function () {

        if (ajx.readyState == 4 && ajx.status == 200) {

            let data = ajx.responseText;
            container.innerHTML = data;
            //document.getElementById(idForm).innerHTML = ajx.responseText;
        }
    };
    ajx.open("GET", "index.php?origin=inscription", true);
    ajx.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajx.send();


    return false;
        
}

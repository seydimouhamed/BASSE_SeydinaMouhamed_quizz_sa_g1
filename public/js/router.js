var inscription=document.getElementById('inscription');
var connexion=document.getElementById('connexion');
var container=document.getElementById('container');

inscription.onclick=()=>{
    sendData('inscription');
}



function sendData(origin) 
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
    var data=getFormData();
    ajx.open("POST", `index.php?origin=${origin}`, true);
    ajx.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajx.send(data);


    return false;
        
}

function getFormData()
{
    //var form=document.getElementById(idForm);
    var elements = document.getElementById("mainform").elements;
    var data="";
    for (var i = 0; i < elements.length; i++) {
        var item = elements.item(i);

                data += [item.name] + "=" + item.value;

        if ((i + 1) != elements.length) {
            data += "&";
        }
    }

    return data;
}
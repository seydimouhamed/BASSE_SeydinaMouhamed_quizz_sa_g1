//var deconnexion = document.getElementById('deconnexion');
var page=document.getElementById('all');

// deconnexion.onclick=()=>{
//     alert('ok');
//     //deconnexion.innerText="ok";
//     //sendData('deconnexion',page,false)
// }
function prevUpload() {
    //alert('ok');
   // document.getElementById('error_f').innerText = "";
    var file = document.getElementById("avatar").files[0];
    var reader = new FileReader();
    if (file) {
        reader.readAsDataURL(file);
        reader.onloadend = function () {
            document.getElementById("photo").src = reader.result;
        }
    }
}

function sendData(o, is_dataPost, cont = page,is_file=false) {

    var ajx = new XMLHttpRequest();
    ajx.onreadystatechange = function () {
        if (ajx.readyState == 4 && ajx.status == 200) {
            let data = ajx.responseText;

            cont.innerHTML = data;
            //document.getElementById(idForm).innerHTML = ajx.responseText;
        }
    };


    var data = "";
    if (is_dataPost) {
        data = getFormData();
        if(is_file)
        {
            data.append('file', fileInputElement.files[0]);
        }
    }
    ajx.open("POST", `index.php?origin=${o}`, true);
    ajx.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajx.send(data);


    return false;
}

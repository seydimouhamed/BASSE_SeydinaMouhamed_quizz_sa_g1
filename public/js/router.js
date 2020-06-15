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



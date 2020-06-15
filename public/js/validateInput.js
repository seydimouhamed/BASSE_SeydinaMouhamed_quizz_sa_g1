
var container = document.getElementById('container');
var page=document.getElementById('all');
var inscription=document.getElementById('inscription');

const inputs = document.getElementsByTagName("input");

for (let input of inputs) {
    input.addEventListener("keyup", function (e) {
        if (e.target.hasAttribute("error")) {
            var idDivError = e.target.getAttribute("error");
            document.getElementById(idDivError).innerText = "";
        }
    })
}

document.getElementById("connexion").addEventListener("click", function (e) {
    const inputs = document.getElementsByTagName("input");
    var error = false;
    for (let input of inputs) {
        if (input.hasAttribute("error")) {
            var idDivError = input.getAttribute("error");
            if (!input.value) {
                document.getElementById(idDivError).innerText = 'ce champ est obligatoitre';
                error = true;
            }
        }

    }
    if (error) {
        e.preventDefault();

        return false;
    }
    else {
        sendData1('connexion',page,"true");
        
    }
})

inscription.onclick=()=>{
        sendData1('inscription',container,"false");
}


// function sendData(o) {
//     //document.getElementById(idForm).innerHTML = data;
//    // container.innerHTML = "dlkqjfsd";

//     var ajx = new XMLHttpRequest();
//     ajx.onreadystatechange = function () {
//         if (ajx.readyState == 4 && ajx.status == 200) {
//             container.innerHTML = "dlkqjfsd";

//             let dat = ajx.responseText;
//             container.innerHTML = dat;
//             //document.getElementById(idForm).innerHTML = ajx.responseText;
//         }
//     };
//    // var data=getFormData();
//     ajx.open("GET", "/quizzbd/controller/loadPage.php?origin=".o, true);
//     ajx.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     ajx.send();


//    return false;

// }

// function getFormData() {
//     //var form=document.getElementById(idForm);
//     var elements = document.getElementById("mainform").elements;
//     var data = "";
//     for (var i = 0; i < elements.length; i++) {
//         var item = elements.item(i);

//         data += [item.name] + "=" + item.value;

//         if ((i + 1) != elements.length) {
//             data += "&";
//         }
//     }

//     return data;
// }

function getFormData() {
    //var form=document.getElementById(idForm);
    var elements = document.getElementById("mainform").elements;
    var data = new FormData();
    for (var i = 0; i < elements.length; i++) {
        var item = elements.item(i);

        data.append([item.name], item.value);

        
    }

    return data;
}

function sendDataNav(o, a, content) {

    var cont = document.getElementById(content);
    var ajx = new XMLHttpRequest();
    ajx.onreadystatechange = function () {
        if (ajx.readyState == 4 && ajx.status == 200) {
            let data = JSON.parse(ajx.responseText);
            var cont=document.getElementById(content)
            cont.innerHTML = data['page'];
            //document.getElementById(idForm).innerHTML = ajx.responseText;
        }
    };



    ajx.open("POST", `index.php?origin=${o}&action=${a}`, true);
    //ajx.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajx.send();

}

function sendData1(o,cont,is_dataPost) {


        var ajx = new XMLHttpRequest();
        ajx.onreadystatechange = function () {
            if (ajx.readyState == 4 && ajx.status == 200) {
                let data = JSON.parse(ajx.responseText);
                    
                cont.innerHTML = data['page'];
                //document.getElementById(idForm).innerHTML = ajx.responseText;
            }
        };


      var  data="";
        if(is_dataPost=="true")
        {
         data=getFormData();
        
        }
        ajx.open("POST", `index.php?origin=${o}`, true);
        //ajx.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        //ajx.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        ajx.send(data);


        return false;
}



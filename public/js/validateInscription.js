var containerbis=document.getElementById('container');


containerbis.addEventListener('change',function()
{
    const input1s = document.getElementsByTagName("input");
    for(let input of input1s)
    {
        input.addEventListener("keyup",function(e)
        {
            if(e.target.hasAttribute("error"))
            {
                var idDivError=e.target.getAttribute("error");
                if(e.target.getAttribute("type")=="password")
                {
                    if(e.target.value.length < 5)
                    {
                        document.getElementById(idDivError).innerText="Doit contenir au moins 5 caracteres";
                    }
                    else
                    {
                        document.getElementById(idDivError).innerText="";
                    }
                }
                else
                {
                    document.getElementById(idDivError).innerText="";
                }
            }
        })
    }

document.getElementById("cpwd").addEventListener("keyup",function()
{
    var pwd=document.getElementById("pwd").value;
    var pwd_c=document.getElementById("cpwd").value;
    if(pwd_c===pwd)
    {
        document.getElementById('error-cpwd').innerText="";

    }
    else
    {
        document.getElementById('error-cpwd').innerHTML="les mots de passes ne sont pas identiques";

    }
});

    document.getElementById("form_register").addEventListener("submit",function(e)
    {   
        const inputs=document.getElementsByTagName("input");
        var error=false;
        for(let input of inputs)
        {
            if(input.hasAttribute("error"))
            {
                var idDivError = input.getAttribute("error");
                if(!input.value.trim())
                {
                    if(input.type==='file')
                    {
                        document.getElementById(idDivError).innerText='choisir une photo';
                    }
                    else
                    {
                        document.getElementById(idDivError).innerText='ce champ est obligatoitre';
                    }
                    error=true;
                }
            }

        }

        
        var pwd=document.getElementById("pwd").value.trim();
        var pwd_c=document.getElementById("cpwd").value.trim();
        let errorpwd=false;
        if(pwd!==pwd_c || pwd.length<5)
        {
            document.getElementById('error-pwd').innerText="le mot de passe doit avoir au moins 5 caracteres";
            errorpwd=true;
        }
        
        if(error || errorpwd)
        {
            e.preventDefault();
            return false;
        }
        else
        {
            sendData2('inscription', page, true);
        }
    })
});


function getFormData1() {

    var elements = document.getElementById("form_register");
    var data = new FormData(elements);

    return data;
}


function sendData2(o, cont, is_dataPost)
{

    var ajx = new XMLHttpRequest();
    ajx.onreadystatechange = function () {
        if (ajx.readyState == 4 && ajx.status == 200) {

            let data = JSON.parse(ajx.responseText);
            if(typeof data['page']!== "undefined")
            {
                cont.innerHTML = data['page'];
            }
            if(typeof data['message']!== 'undefined')
            {
                cont.innerHTML=data['message'];
            }
            
        }
    };

    var data = "";
    if (is_dataPost) {
        data = getFormData1();
    }
    ajx.open("POST", `index.php?origin=${o}`, true);
    //ajx.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajx.send(data);

    return false;
}

<style>

.rowimg{
position: relative;
left: -10px;
width: 50%;
height:70px;
/* background: #3C716D; */
border: 2px solid #FFFFFF;
box-sizing: border-box;
box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
}
.btn_img
{
    background: #3C716D;
    color:white;
    height:50px;

}

.ic
{
    float:right;
    width:40px;
    height:40px;
}

.lab_ph
{
    line-height:2.5em;
    font-weight:bold;
}
.img
{
    position:relative;
    top:-25px;
    left:-10px;
    width:120px;
    height:120px;
}
</style>


<script type='text/javascript'>


//     const inputs = document.getElementsByTagName("input");
//     for(input of inputs)
//     {
//         input.addEventListener("keyup",function(e)
//         {
//             if(e.target.hasAttribute("error"))
//             {
//                 var idDivError=e.target.getAttribute("error");
//                 if(e.target.getAttribute("type")=="password")
//                 {
//                     if(e.target.value.length < 5)
//                     {
//                         document.getElementById(idDivError).innerText="Doit contenir au moins 5 caracteres";
//                     }
//                     else
//                     {
//                         document.getElementById(idDivError).innerText="";
//                     }
//                 }
//                 else
//                 {
//                     document.getElementById(idDivError).innerText="";
//                 }
//             }
//         })
//     }

// document.getElementById("pwd_c").addEventListener("keyup",function()
// {
//     var pwd=document.getElementById("pwd").value;
//     var pwd_c=document.getElementById("pwd_c").value;
//     if(pwd_c===pwd)
//     {
//         document.getElementById('pwd_ctxt').innerText="";

//     }
//     else
//     {
//         document.getElementById('pwd_ctxt').innerText="les mots de passes ne sont pas identiques";

//     }
// });

//     document.getElementById("form_register").addEventListener("submit",function(e)
//     {   
//         const inputs=document.getElementsByTagName("input");
//         var error=false;
//         for(input of inputs)
//         {
//             if(input.hasAttribute("error"))
//             {
//                 var idDivError = input.getAttribute("error");
//                 if(!input.value.trim())
//                 {
//                     if(input.type==='file')
//                     {
//                         document.getElementById(idDivError).innerText='choisir une photo';
//                     }
//                     else
//                     {
//                         document.getElementById(idDivError).innerText='ce champ est obligatoitre';
//                     }
//                     error=true;
//                 }
//             }

//         }

        
//         var pwd=document.getElementById("pwd").value.trim();
//         var pwd_c=document.getElementById("pwd_c").value.trim();
//         errorpwd=false;
//         if(pwd!==pwd_c || pwd.length<5)
//         {
//             document.getElementById('error_4').innerText="le mot de passe doit avoir au moins 5 caracteres";
//             errorpwd=true;
//         }
        
//         if(error || errorpwd)
//         {
//             e.preventDefault();
//             return false;
//         }
//     })

</script>

          <div class="h4 text-center  ">Inscription</div>
        <br>
        <form id="form_register" action="Javascript:void(0);" enctype="multipart/form-data">
          <div class="row rowip">
            <div class="labip  col-md-3  col-lg-3 col-sm-3 col-3">Prenom</div>
            <div class="quadip "></div>
            <div class="ipd ">
                <input type="text" error="error-fn" name="firstname" id="prenom" class="form-control ip"/>
            </div>
         </div>
        <small id="error-fn" class="error text-danger pull-right">
        </small>
        <br>
          <div class="row rowip">
            <div class="labip  col-md-3  col-lg-3 col-sm-3 col-3">Nom</div>
            <div class="quadip "></div>
            <div class="ipd ">
                <input type="text" error="error-ln" name="lastname" id="nom" class="form-control ip"/>
            </div>
         </div>
        <small id="error-ln" class="error text-danger pull-right">
        </small>
        <br>
          <div class="row rowip">
            <div class="labip  col-md-3  col-lg-3 col-sm-3 col-3">Login</div>
            <div class="quadip "></div>
            <div class="ipd ">
                <input type="text" error="error-log" name="login" id="login" class="form-control ip"/>
            </div>
         </div>
        <small id="error-log" class="error text-danger pull-right">
        </small>
        <br>
         <div class="row rowip">
            <div class="labip  col-md-3  col-lg-3 col-sm-3 col-3">Password</div>
            <div class="quadip"></div>
            <div class="ipd ">
                <input type="text" name="pwd" error='error-pwd' class="form-control ip" id="pwd" />
          </div>
        </div>
        <small id="error-pwd" class="error text-danger "></small>
        <br>
         <div class="row rowip">
            <div class="labip  col-md-3  col-lg-3 col-sm-3 col-3 small"> C.password</div>
            <div class="quadip"></div>
            <div class="ipd ">
                <input type="text" name="cpwd" error='error-cpwd' class="form-control ip" id="cpwd" />
          </div>
        </div>
        <small id="error-cpwd" class="error text-danger "></small>
        <br>
        <br>
        <div class="row">
            <div class="rowimg py-2 px-3">
                <div class="btn_img form-control font-weigth-bold rounded-lg"><label class="col-sm-12 col-md-12" for="avatar"> <span class="lab_ph">Choisir</span><span> <img class="ic " src="./public/images/icones/add_a_photo-24px.svg" alt=""/></span><input type="file" id="avatar" name="avatar" onchange="prevUpload(); " class="form-control invisible"> </label></div> 
                <!-- <input type="file" id="avatar"  class="form-control"> -->
            </div>
                <img class="rounded-circle img-fluid img border-white border" id="photo" src="./public/images/photo/giraffe.png" alt=""/>
            
        </div>
        <br>
        <div class="row">
            <button type="submit" value='inscription' id="inscription2" name="inscription" class="form-control ubtn">S'Inscription</button>
        </div>
      </div>
      </form>

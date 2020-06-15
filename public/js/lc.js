
const URL_ROOT="index.php?origin";

$(function(){
     
     const  $error_message=$("#error_message")
     const $btn_deconnexion=$("#btn_deconnexion")
      const container=$("#container"); 
      $valInput=$(".requireinput");
      const all=$("#all"); 

      //Au chargement on cache le div  Message d'erreur d'un formulaire
        $error_message.hide()

      for (let input of $valInput) {
        input.addEventListener("keyup", function (e) {
            if (e.target.hasAttribute("error")) {
                var idDivError = e.target.getAttribute("error");
                $error_message.hide();
                document.getElementById(idDivError).innerText = "";
            }
        })
    }

   //Traitement de la Connexion 
   $("#form-connexion").submit((event)=>{ 
            event.preventDefault();
            $form=$("#form-connexion")
            var error=false;
            url = $form.attr("action" );
            //Faire ici la Validation du Formulaire

            for (let input of $valInput) {
                    var idDivError = input.getAttribute("error");
                    if (!input.value) {
                        document.getElementById(idDivError).innerText = 'ce champ est obligatoitre';
                        error = true;
                    }
            }

            if(!error){
                $.post(url,  $form.serialize() ,
                   function(data, status){
                         if(data.trim()!="error"){
                            if(data.trim()=='admin')
                            {
                                all.load(`${URL_ROOT}=admin`);
                            }
                            else
                            {

                                all.load(`${URL_ROOT}=player`);
                            }
                           // all.html(data);
                          // window.location.replace(`${URL_ROOT}=admin`)
                         }else{
                          //alert('erreur d');
                            $error_message.show();
                         }
                   // 
                  });   
          }  
    })
    //Page d'inscription du Joueur
    $("#inscription").on("click",function(){
          //Chargent de la vue Inscription dans le fichier layout.php
        container.load(`${URL_ROOT}=inscription`);
    })

    //Traitement de Déconnexion
    $btn_deconnexion.on("click",()=>{
      $.get(`${URL_ROOT}=deconnexion`, (data, status)=>{
               window.location.replace("index.php")
          });
    })


    //Traitement au niveau du Menu Admin

    $(".nav-link").on("click",function(){
       //Récuperation du lien sur lequel l'admin à cliquer
           $lien_encour=$(this);
      //Récuperation de l'url sauvegarder dans l'attribut lien
           const url= $lien_encour.attr("lien");
      //Récuperation de la partie droite de la page layout_admin.php      
           const $container=$("#container-admin"); 
           //Vider le Condenu avant de Faire le Load
             $container.html("")
             $container.load(`${url}`);

})
     

  
});
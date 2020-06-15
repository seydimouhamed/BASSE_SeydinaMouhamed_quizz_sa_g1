<?php ob_start();?>

<style>
     #container_player
     {
     	min-height: 400px;
     }
     .color_panel
     {
		   background: beige;
		   box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.5);
		   background: #C4C4C4;
		    border: 2px solid #FFFFFF;
     }
     .shadow
     {
		   box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.5);
     }
     .color_text
     {
     	color:#3C716D;
     }
</style>
<div id="container_player"  class="container-fluid p-0 col-11 text-white">
	<div class=" row col h-100 justify-content-around">
    
        <div class="push-left left col-3 h-100 align-items-center ">
        	<ul class="list-group shadow" id=''>
			  <li class="list-group-item list-group-item-success"><span class="float-left">Moussa samb</span><span class="float-right"> 120 pts</span></li>
			  <li class="list-group-item list-group-item-secondary">Ibrahima Kane</li>
			  <li class="list-group-item list-group-item-info">Arame FALL</li>
			  <li class="list-group-item list-group-item-warning">Ahmed SECK</li>
			  <li class="list-group-item list-group-item-danger">Omar BASSE</li>
			</ul>
            
        </div>
        <div class="push-right right col-9 h-100 justify-content-center text-center">
        	<div id="container_jeux" class="col border-white rounded-lg justify-content-center color_panel p-3">
		        	<div class=" border-white border h3 p-2 rounded-lg mt-1 "> Les différents régions du Sénégal ?</div>
		        	<div class="row  justify-content-between"><div class="border-white border rounded-sm h6 p-1">plusieurs réponse possible</div><div  class="border-white border rounded-sm h6 p-1">Score: 7</div></div>
		        	<br>
		        	<form id="form" class="justify-content-center" action="Javascript:void(0);">
		        		<div class="row  justify-content-between"><label class="float-left"> Deuxieme question</label><input class="float-right" type="checkbox" name="check[]" value="1"></div>
		        		<div class="row justify-content-between"><label class="float-left"> Deuxieme question</label><input class="float-right" type="checkbox" name="check[]" value="2"></div>
		        		<div class="row w-75 justify-content-between"><label class="float-left"> Troisieme question</label><input class="float-right" type="checkbox" name="check[]" value="3"></div>
		        		<br>
		        		<div class="row w-100 justify-content-between"><input id="precedent" type="submit" name="precedent" class="float-left" /><input type="submit" name="suivant" id="suivant" value="Suivant" class="float-right suivant" /></div>
		        	</form>
            </div>
        </div>
    </div>
</div>
<script>
	$(document).ready(function(){

    	const URL='http://smb.alwaysdata.net/quizzbdV2/index.php?origin';
		//const URL='http://localhost/quizzbdV2/index.php?origin';
		var currentQtn=1;
        var tabChoix={"cs":"Un seul choix","ct":"", "cm":"plusieurs choix possible"};
        var tabType={"cs":"radio",'cm':"checkbox"};
        var tabValide={1:"checked",0:""};
         const cont=$("#container_jeux");
		cont.on("click",'#suivant',function(){
			
			data=$("#form").serialize();
			currentQtn++;
			getQuestions(cont,currentQtn,URL,data);
				return false;
		}).
		on('click', '#precedent',function(){

			data=$("#form").serialize();
			currentQtn--;
			getQuestions(cont,currentQtn,URL,data);
				return false;
		});

		getQuestions(cont,currentQtn,URL,reponseUser="");

		 function getQuestions(cont,currentQtn,URL,reponseUser="")
		 {
		    $.ajax({
		            type: "POST",
		            url: `${URL}=services&action=getQuestionJeu`,
		            data: {post:reponseUser,currentQtn:currentQtn},
		            dataType: "JSON",
		            success: function (data) {
		            	//console.log(data);
		                cont.html('');
		                  printQuestions(data,cont);
		                 // nbrpage=data['nbrelement'];
		                  //showhidenav(offset,nbrpage);
		            }
		        });
		 }


function printQuestions(qtn,container){
	var htmqtn=`<div class=" border-white border h3 p-2 rounded-lg mt-1 color_text"> ${qtn[0].libele}</div>
        	<div class="row col-10 justify-content-between"><div class="border-white border rounded-sm h6 p-1 ">${tabChoix[qtn[0].type]}</div><div  class="border-white border rounded-sm h6 p-1 ">SCORE : <span class="color_text h3 ">${qtn[0].score}</span></div></div>
        	<br>
        	<form id="form">`;

			if(qtn[0].type==='cm' || qtn[0].type==='cs')
			{
				$.each(qtn,function(id,q)
				{
						 htmqtn+=`<div class="row col-10 justify-content-between"><label class="float-left color_text font-weight-bold"> ${q.reponse}</label><input class="float-right" type="${tabType[qtn[0].type]}" name="check[]" value="1">
			        		</div>`
	        	  })
	        }
	       else
	       {
       		htmqtn+=`
					<div class="col-8 justify-content-between offset-1">
						<input type="text" name="reponse[]" />
					</div>`;
			}
        		htmqtn+=`
        		<br>
					<div class="row  col-10 justify-content-between">
					        <button type="button" id="precedent" name="precedent" value='nav_pre' class="btn_nav btn-sm ubtn float-left">Précédent</button>
					        <button type="button" id="suivant" name="suivant" value='nav_suiv' class="btn_nav btn-sm ubtn float-right">Suivant</button>
					</div>
        	</form>
		`

		container.append(htmqtn)
}

	})

</script>

<?php
 $content = ob_get_clean(); ?>

<?php require_once("./views/commons/template_presentation.php"); ?>

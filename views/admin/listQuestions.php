<style>
.custom-control-label:before{
  background-color:#3C716D;
  border-color:white;
}
.custom-checkbox .custom-control-input:checked~.custom-control-label::before{
  background-color:#c3c3c3;
  color:#3C716D;
}
     tr
     {
         background-color:#C4C4C4;
         border:none;
        background-color:none;
     }

    table {
    border-collapse: separate;
    border-spacing: 0 0.5em;
    }
    tbody > tr:hover
    {
        background-color:#3C716D;
        color:white;
    }
    .bg-grey 
    {
        background-color:#C4C4C4;
    }
    .custom-control-input
    {
    }
    /*#scrollZone
    {
        max-height:250px;
    overflow: scroll;
    }*/


	.panel, .flip {
	 /* /text-align: center;*/
	  background-color: lightgrey;
        box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.5);
	  color:#3C716D;
	  border: solid 1px #c3c3c3;
	}

	.panel {
	 /* padding: 50px;*/
	  display: none;
	}
	.flip 
	{

        background-color:#C4C4C4;
	}
    </style>
<div class="container-fluid col-11 justify-content-center">

    
    <div class="h6 text-center ">Liste des Questions</div>

    <div class="row bg-grey justify-content-around border-white border col-md-11 col-lg-11 col-sm-11 col-11 ">
        <span id="deltete_user"><img src="./public/images/icones/delete_sweep-24px.svg" alt="dqs"></span>
        <span id="rafresh_list"><img src="./public/images/icones/refresh-24px.svg" alt="dqs"></span>
    </div>
    <br>
    <div class="zonequestions col " id="scrollZone">

    		<div class="text-danger h3 text-center">	aucune question à afficher</div>
            <!-- 
            <div class="d_question mt-1">
	            <div class="row col flip justify-content-between p-3">
	                     <div class="custom-control custom-checkbox">
	                        <input type="checkbox" class="custom-control-input" id="customCheck-0">
	                        <label class="custom-control-label" for="customCheck-0"></label>
	                    </div><div> <b> 3 </b>.Click to slide the panel down or up</div><div id="flic" class="float-right flic">+</div></div>
				<div class="panel col-11">
					<div class="row justify-content-between px-5">
						<div>
							<label>Score</label>
							<label class="border border-white">8</label></div>
						<div>
							<label>Type</label>
							<label class="border border-white">Choix Multiple</label>
						</div>
					</div>
					<div class="col-8 justify-content-between offset-1">
						<label class="col-9">Ma premiere reponse ......</label>
					</div>
				</div>  
			</div>
 -->


    </div>

    <br>
    <br>
    <br>
    <div class="col justify-content-end pull-bottom position-absolute fixed-bottom">
        <button type="button" id="btn_precedent" name="precedent" value='nav_pre' class="btn_nav btn-sm ubtn float-left">Précédent</button>
        <button type="button" id="btn_suivant" name="suivant" value='nav_suiv' class="btn_nav btn-sm ubtn float-right">Suivant</button>
    </div>
</div>


   <!-- <script src="../assets/js/jquery.js"></script> -->



<script>
 
$(document).ready(function(){
//----------------------------------------------

    	const URL='http://smb.alwaysdata.net/quizzbdV2/index.php?origin';

  $(".zonequestions").on("click",".flic",function(){
  	 ($(this).parent()).siblings('.panel').slideToggle("slow");
  });


        //const date = $('#date').val();
        let offset = 0;
        let nbrpage=0;
        const cont = $('.zonequestions');
        var tabChoix={"cs":"Choix Simple","ct":"Choix Text", "cm":"Choix Multiple"};
        var tabType={"cs":"radio",'cm':"checkbox"};
        var tabValide={1:"checked",0:""};
         showhidenav(offset,nbrpage);
        	getQuestions(cont,offset,URL);
        $('.btn_nav').click(function(){
        	if($(this).attr('id')==="btn_suivant")
        	{
        		offset+=5;
        	}
        	else if($(this).attr('id')==="btn_precedent")
        	{
        		offset-=5;
        	}
        	getQuestions(cont,offset,URL);
        })

function showhidenav(offset,nbrpage)
{
	if(offset===0 || nbrpage===0)
	{
		$('#btn_precedent').hide();
	}
	else
	{
		$('#btn_precedent').show();
	}
	if((nbrpage-offset)<5)
	{

		$('#btn_suivant').hide();
	}else
	{
		$('#btn_suivant').show();
	}
}
 function getQuestions(cont,offset,URL)
 {
    $.ajax({
            type: "POST",
            url: `${URL}=services&action=getQuestions`,
            data: {limit:5,offset:offset},
            dataType: "JSON",
            success: function (data) {
				cont.html('');
				console.log(data);
                 printQuestions(data['qcm'],cont);
                 nbrpage=data['nbrelement'];
                 showhidenav(offset,nbrpage);
            }
        });

 }

function printQuestions(data,container){

        $.each(data, function(id,qtn){
        	//console.log(qtn);

        	  $htmqtn=`

		            <div>
			            <div class="row col flip justify-content-between p-3 mt-3  border-white border rounded-sm">
			                     <div class="custom-control custom-checkbox">
			                        <input type="checkbox" class="custom-control-input" id="customCheck-${id}">
			                        <label class="custom-control-label" for="customCheck-${id}"></label>
			                    </div><div class="col-10"> <b> ${qtn[0].id_questions}. ${qtn[0].libele}</b></div><div id="flip" class="float-right flic">+</div></div>
						<div class="panel col-11">
							<div class="row justify-content-between px-5">
								<div>
									<label>Score</label>
									<label class="border border-white px-3">${qtn[0].score}</label></div>
								<div><label>Type</label>
									<label class="border border-white px-3">${tabChoix[qtn[0].type]}</label>
								</div>
							</div>
							<div>
							`;
							if(qtn[0].type==='cm' || qtn[0].type==='cs')
        					{
        						$.each(qtn,function(id,q)
        						{
        	  				 $htmqtn+=`
									
								<div class="col-10 justify-content-between offset-1">
									<label class="col-9">${q.reponse}</label><input type="${tabType[qtn[0].type]}" name="check_${qtn[0].id_questions}" ${tabValide[q.valide]} value="id"/>
								</div>`;

        						});
							}
							else
							{
								$htmqtn+=`
								<div class="col-8 justify-content-between offset-1">
									<label class="col-9">${qtn[0].reponse[0]}</label>
								</div>`;
							}
				$htmqtn+=`</div>
						</div>  
					</div>`;

        	   container.append($htmqtn);

        	 
        });
}

		
//----------------------------------------------
});




</script>
          <br>
          <div class="h4 text-center  ">CREER QUESTION</div>
        <br>
        <br>
        <br>
        <div class="col-11">
        <form id="form-question" method="POST" action="Javascript:void(0)">
          <div class="row rowip">
            <div class="labip col-md-3  col-lg-3 col-sm-3 col-3">Question</div>
            <div class="quadip "></div>
            <div class="ipd ">
                <input type="text" error="error-log" name="libele" id="question" class="form-control ip"/>
            </div>
         </div>
        <small id="error-qtn" class="error text-danger pull-right">
        </small>
        <br>
         <div class="row col-6 rowip">
            <div class="labip col-md-3 col-lg-3 col-sm-3 col-3">Score </div>
            <div class="quadip"></div>
            <div class="ipd ">
                <input type="number" name="score" error='error-score' class="form-control ip " id="score" />
          </div> 
        </div>
        <br>
        <div class="row col-10 ">
         <div class="row col-10 rowip">
            <div class="labip col-md-3 col-lg-3 col-sm-3 col-3">Type choix </div>
            <div class="quadip"></div>
            <div class="ipd select">
            	<select name="type" id="type" class="form-control ip">
            		<option value="cm">Choix Multiple </option>
            		<option value="cs">Choix Simple </option>
            		<option value="ct">Choix Texte </option>
            	</select>
               <!-- <input type="text" name="pwd" error='error-pwd' class="form-control ip " id="pwd" />-->
          </div> 
        </div>
          <img id="add_champs" class="ic h100" src="./public/images/icones/add_box-24px.svg" alt="">
    </div>
        <small id="error-pwd" class="error text-danger "></small>
        <br>
        <div id="error_reponses"></div>
        <div id="div_reponse" class="col-10">
        	
        </div>
        <br>
        <div class="col justify-content-end pull-bottom position-absolute fixed-bottom">
            <button type="submit" id="btn_register"name="register" value='register' class=" btn-sm ubtn float-right">Enregistrer</button>
        </div>

</form>
</div>

 <script>
$(function(){
 $i=0;

    // $(".nav-link").on("click",function(){
    //     $lien_encour=$(this);
    //     const url=$lien_encour.attr("lien");
    //     const $container_admin=$("#container_admin");
    //     $container_admin.html("");
    //     $container_admin.load(`${url}`);
    // })
    

    $("#type").on("change",function(){
    	$("#div_reponse").html('');
    	if($('#type').val()=='ct')
    	{
    		var r=$("<div class='row'></div>");
            var l=$("<label class='col-3'></label>");
            l.text('Reponse');
            var y = $("<input type='text' class='form-control col-6' name='reponse[]' />");
            r.append(l,y);
            $('#div_reponse').append(r);
    	}
    	else
    	{
    		addChampCk();
    		addChampCk();
    	}
    })
$('#div_reponse').on("click",".btn_remove",function()
{
	$(this).parent('div').remove();
})

function addChampCk()
{
	$i++;
	 $type=$("#type").val();
        if($type==="cm" || $type==="cs")
         {
            var r = $("<div class='row'></div>");
            // creattion du label
            var l=$("<label class='col-3'></label>");
            l.text('Reponse');
            var y = $("<input type='text' class='form-control col-6' name='reponse_"+$i+"' />");
                var g = $("<input type='button' class='btn_remove col-1' value='-'/>");
                	var check="";
                    if($type=='cm')
                    {
                		var check = $("<input type='checkbox' name='check[]' value='"+$i+"' class='col-1'/>");
                    }
                    else
                    {                    	
                		var check = $("<input type='radio' name='check[]' value='"+$i+"' class='col-1'/>");
                    }

                    r.append(l,y,check,g);
            $("#div_reponse").append(r);
            //appéle la function de génération de labels reponse 
              //genRepNumb();
            // appele de function de limitation des chmaps   
              //disabledBtn();
        }
}

$("#add_champs").on("click",function(e)
    {
    	addChampCk();
        
    });
})

	$('#form-question').submit(function(){
		$form=$(this);
		$data=$form.serialize();
		console.log($data);
		$.post("index.php?origin=services&action=registerQuestion",$data,function(data){
			console.log(data)
			alert('retour des données du serveur'+data);

		})
		return false;
	})
</script>

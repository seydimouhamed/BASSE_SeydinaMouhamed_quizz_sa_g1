
          <br>
          <div class="h4 text-center  ">Connexion</div>

        <br>
        <form id="mainform" action="Javascript:void(0);">
          <div class="row rowip">
            <div class="labip col-md-3  col-lg-3 col-sm-3 col-3">Login</div>
            <div class="quadip "></div>
            <div class="ipd ">
                <input type="text" error="error-log" name="login" id="login" class="form-control ip"/>
            </div>
         </div>
        <small id="error-log" class="error text-danger pull-right">
        </small>
        <br>
         <div class="row rowip">
            <div class="labip col-md-3 col-lg-3 col-sm-3 col-3">Password </div>
            <div class="quadip"></div>
            <div class="ipd ">
                <input type="text" name="pwd" error='error-pwd' class="form-control ip " id="pwd" />
          </div> 
        </div>
        <small id="error-pwd" class="error text-danger "></small>
        <br>
        <div class="row">
            <button type="submit" id="connexion" name="connexion" value='connexion' class="form-control ubtn">Connexion</button>
        </div>
        <div class="text-center">OU</div>
        <div class="row">
            <button  value='inscription' id="inscription" class="form-control ubtn" >Inscription</button>
        </div>
      </div>
      </form>
      <button id="test">test</button>
<script src="public/js/validateInput.js"></script>
<script src="./public/js/validateInscription.js"></script>

<script src="./public/js/router.js"></script>

          <br>
          <div class="h4 text-center  ">Connexion</div>
            <small id="error_message" class="text-danger text-center">Erreur sur le login et/ou le mot de passe</small>
        <br>
        <form id="form-connexion" method="POST" action="index.php?origin=connexion">
          <div class="row rowip">
            <div class="labip col-md-3  col-lg-3 col-sm-3 col-3">Login</div>
            <div class="quadip " ></div>
            <div class="ipd ">
                <input type="text" error="error-log" name="login" id="login" class="requireinput form-control ip"/>
            </div>
         </div>
        <small id="error-log" class="error text-danger pull-right">
        </small>
        <br>
         <div class="row rowip">
            <div class="labip col-md-3 col-lg-3 col-sm-3 col-3">Password </div>
            <div class="quadip"></div>
            <div class="ipd ">
                <input type="password" name="pwd" error='error-pwd' class="requireinput form-control ip " id="pwd" />
          </div> 
        </div>
        <small id="error-pwd" class="error text-danger "></small>
        <br>
        <div class="row">
            <button type="submit" id="btn_connexion" name="connexion" value='connexion' class="form-control ubtn">Connexion</button>
        </div>
        <div class="text-center"><small>OU</small></div>
        <div class="row">
            <a  value='inscription' id="inscription" class="form-control ubtn text-center" >Inscription</a>
        </div>
      </div>
      </form>
<!-- <script src="public/js/validateInput.js"></script>
<script src="./public/js/validateInscription.js"></script -->>


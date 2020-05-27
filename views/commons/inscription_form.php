
        <br>
        <form id="mainform" method="post">
          <div class="row rowip">
            <div class="labip col-md-3">Prenom</div>
            <div class="quadip "></div>
            <div class="ipd ">
                <input type="text" error="error-fn" name="login" id="login" class="form-control ip"/>
            </div>
         </div>
        <small id="error-fn" class="error text-danger pull-right">
        </small>
        <br>
          <div class="row rowip">
            <div class="labip col-md-3">Nom</div>
            <div class="quadip "></div>
            <div class="ipd ">
                <input type="text" error="error-ln" name="login" id="login" class="form-control ip"/>
            </div>
         </div>
        <small id="error-ln" class="error text-danger pull-right">
        </small>
        <br>
          <div class="row rowip">
            <div class="labip col-md-3">Login</div>
            <div class="quadip "></div>
            <div class="ipd ">
                <input type="text" error="error-log" name="login" id="login" class="form-control ip"/>
            </div>
         </div>
        <small id="error-log" class="error text-danger pull-right">
        </small>
        <br>
         <div class="row rowip">
            <div class="labip col-md-3">Mot de passe</div>
            <div class="quadip"></div>
            <div class="ipd ">
                <input type="text" name="pwd" error='error-pwd' class="form-control ip" id="pwd" />
          </div>
        </div>
        <small id="error-pwd" class="error text-danger "></small>
        <br>
         <div class="row rowip">
            <div class="labip col-md-3">Confirme mot de passe</div>
            <div class="quadip"></div>
            <div class="ipd ">
                <input type="text" name="cpwd" error='error-cpwd' class="form-control ip" id="pwd" />
          </div>
        </div>
        <small id="error-cpwd" class="error text-danger "></small>
        <br>
        <div class="row">
            <input type="file" id="avatar"  class="form-control">
        </div>
        <br>
        <div class="row">
            <button  value='inscription' id="inscription" class="form-control ubtn" onclick="test();">S'Inscription</button>
        </div>
      </div>
      </form>
<script src="public/js/validateInput.js"></script>
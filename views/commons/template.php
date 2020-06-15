<!doctype html>
<html lang="fr">
  <head>
    <title>QUIZZ</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/main.css" class="href">

</head>
  <body class="all">
    <div id="all">
        <div id="nav">
            <?php require_once "./views/commons/navbarre.php";?>
        </div>

             <!-- <div id="container" class="container-fluid">  -->
        <div id="container" class="container col-md-6 col-sm-9 col-10 justify-content-center  "> 
            <?php  require_once "./views/commons/connexion.php";?>          
            <?php //require_once "./views/admin/accueil.php";?>
        </div>
    </div>    
    <!-- Optional JavaScript -->
    <!-- <script src="./public/js/router.js"></script> -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="<?=WEBROOT?>/public/js/lc.js" ></script>
  </body>
</html>
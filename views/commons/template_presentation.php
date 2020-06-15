<!-- <!doctype html>
<html lang="fr">
  <head>
    <title>Admin</title>
    Required meta tags -->
<!--     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    Bootstrap CSS -->
   <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/main.css" class="href"> -->

<!-- </head> 
  <body class="all">
    <div id="all"> -->
<div id="nav">
    <?php require_once "./views/commons/navbarrev2.php";?>
</div>

<div id="container" class="container-fluid">        
    <?= $content ;?>
</div>
<script>
    $('#btn_deconnexion').click(function(){
 
      $.get(`${URL_ROOT}=deconnexion`, (data, status)=>{
               window.location.replace("index.php")
          });
    })
           
</script>

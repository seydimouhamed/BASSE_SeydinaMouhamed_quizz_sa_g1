<?php ob_start();?>

<style>
     
</style>
<div class="container-fluid p-0 col-md-11 col-sm-11 col-11 ">
    <h1> PAGE JEU</h1>
</div>
<?php
 $content = ob_get_clean(); ?>

<?php require_once("./views/commons/template_presentation.php"); ?>

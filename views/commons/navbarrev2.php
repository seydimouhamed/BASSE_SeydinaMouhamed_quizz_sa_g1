<?php
    $fn="";
    $ln="";
    $photo="";
    if(isset($_SESSION['info_user']))
    {
        $i_u=$_SESSION['info_user'];
        $fn=$i_u['firstname'];
        $ln=$i_u['lastname'];
        $photo=$i_u['photo'];
    }
?>

<style>
.logo
{
}
.titre
{
    background-color:#3C716D;
}
.btn-decon,.name
{
    color:#3C716D;
    font-size:10px;
}
.ph
{
    height:50px;
    width:70px;
}

</style>
<div class="row m-1  justify-content-center">
    <div class="logo pull-left m-0">
    </div>
    <div class="col-md-9 col-lg-9 col-sm-9 col-8 mt-2">
        <div class=" row titre justify-content-center font-weight-bold  text-white text-center h5 p-2">
            LE PLAISIR DE JOUEUR
        </div>
        <div class="row"><button id="btn_deconnexion" class="btn-decon border-0 rounded-lg font-weight-bold small p-1">Deconnexion</button></div>
    </div>
    <div class="mt-0">
         <div class=" row ml-1 mt-2  pull-right h-50"><img class="ph" src="./public/images/photo/<?= $photo ?>"/> </div>
        <div class="name row small ml-1 font-weight-bold"><?= $fn.' '.$ln ?></div>
    <div>
</div>

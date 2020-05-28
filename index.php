<?php
 require_once "./controller/front.php";

    if(isset($_GET['origin']))
    {
        $o=$_GET['origin'];
        if($o=="inscription")
        {
            var_dump($_POST);
            require_once './views/commons/inscription_form.php';
        }
    }
    else
    {
       require_once './views/commons/template.php';
    }
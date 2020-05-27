<?php

    if(isset($_GET['origin']))
    {
       require_once './views/commons/inscription_form.php';
        
    }
    else
    {
       require_once './views/commons/template.php';
    }
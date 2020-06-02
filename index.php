<?php
    require_once './controller/front.php';
    if(isset($_GET['origin']))
    {
            if($_GET['origin']==="connexion")
            {
                if(!empty($_POST))
                {
                    connexion($_POST);

                }
            }
            else if($_GET['origin']==="inscription")
            {
                if(!empty($_POST))
                {
                    // var_dump($_POST);
                    // var_dump($_FILES);
                   register($_POST,$_FILES);
                }
                else
                {
                    require_once './views/commons/inscription_form.php';
                }
            }
            else if($_GET['origin']==='deconnexion')
            {
                unset($_SESSION['info_user']);
                require_once './views/commons/temp_con.php';
            }
    }
    else
    {
       require_once './views/commons/template.php';
    }
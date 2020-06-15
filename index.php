<?php
// define("WEBROOT","http://localhost/quizzbdV2");
 define("WEBROOT","http://smb.alwaysdata.net/quizzbdV2");
   define("ORIGIN","origin");
   define("ACTION","action");
    require_once './controller/front.php';
    require_once './controller/services.php';
    if(isset($_GET[ORIGIN]))
    {
            if($_GET[ORIGIN]==="connexion")
            {
                
                if(!empty($_POST))
                 {
                    connexion($_POST);

                 }
            }
            else if($_GET[ORIGIN]==="inscription")
            {
                if(!empty($_POST))
                {
                   register($_POST,$_FILES);
                }
                else
                {
                        require_once './views/commons/inscription_form.php';
                }
            }
            else if($_GET[ORIGIN]==='deconnexion')
            {
                unset($_SESSION['info_user']);
                header('location:index.php');
            }
            else if($_GET[ORIGIN]==='admin')
            {
                if(isset($_GET[ACTION]))
                {
                //$url='./views/admin/dashboard.php';
                    $url='./views/admin/'.$_GET[ACTION].'.php';
                  //  ob_start();
                        include $url;
                    // $content=ob_get_clean();
                    // echo json_encode(array('page' => $content));
                }else
                {
                    require_once './views/admin/accueil.php';
                }
            }
            else if($_GET[ORIGIN]=='player')
            {
                    require_once './views/player/pageJeu.php';
            }
            else if($_GET[ORIGIN]=='services')
            {
                $post=[];
                if(isset($_POST))
                {
                    $post=$_POST;
                }
                services($_GET[ACTION],$post);
            }
    }
    else
    {
       require_once './views/commons/template.php';
    }
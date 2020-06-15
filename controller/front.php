<?php
session_start();
 require_once './model/model.php';
 require_once './model/question.model.php';

 function connexion($p)
 {
    $log=$p['login'];
    $pwd=$p['pwd'];
    $result=checkUserLog($log,$pwd);
		$data=$result->fetch();
    if($data!==false)
    {
		$_SESSION['info_user']=$data;
        if($data['profil']==="admin")
        {
			   echo "admin";
        }
        else
        {
			$_SESSION['jeux']=getAllQuestions(5,0);
			echo "jeux";
        }
    }
    else
    {
        echo "error";
    }
 }


 // --------------------------------------------------------------------------------------------------------------------------------------------------------

function register($post,$file)
{

      $d=$post;
      $f=$file;
      $profil="play";


       if(isset($_SESSION['profil']) && $_SESSION['profil']==='admin')
       {
            $profil='admin';
       }

      if(getUserByUserName($d["login"])!==false)
      {
            $message['msg'] = array('text' => "Ce login existe déjà","type"=>'alert' );
            echo json_encode($message);

      }else
        {
      		$result=registeruser($d["login"],$d["pwd"],$d["firstname"],$d["lastname"],$profil,$f["avatar"]);

            if($result!==false)
            {
                    $userInfo=getUserByUserName($d["login"]);
                    $message['msg'] = array('text' => "connecter avec succes","type"=>'success' );
                    $message['info_user']=$userInfo;
                    if($profil=="play")
                    {
						$_SESSION['info_user']=$userInfo;
						$_SESSION['jeux']=getAllQuestions(5,0);
                    }
                    
                    echo json_encode($message);
            }
            else
            {		$message['erreur']=$result;
                    $message['msg'] = array('text' => "Echec lors de l'inscription","type"=>'alert' );
                    echo json_encode($message);
            }
        }
 }
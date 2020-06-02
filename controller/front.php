<?php
session_start();
 require_once './model/model.php';

 function connexion($p)
 {
    $log=$p['login'];
    $pwd=$p['pwd'];
    $result=checkUserLog($log,$pwd);
    if($result!==false)
    {
        $_SESSION['info_user']=$result;
        if($result['profil']==="admin")
        {
           require_once './views/admin/accueil.php';
        }
        else
        {
            //echo "ca marche player";
           require_once './views/player/pageJeu.php';
        }
    }
    else
    {
        echo "erreur";
    }
 }


 // --------------------------------------------------------------------------------------------------------------------------------------------------------
 	function register($d=array(),$f=array())
	{
        var_dump($d);
		//array_walk($d, 'trim_value');
		if(empty($d))
		{
            echo "c'est vide";
			//require("view/player/inscriptionPlayer.php");
		}
		else
		{
			
                //$msg=array();
                echo "on est lsda";
	
				if( empty($d["login"]) || empty($d["firstname"]) || empty($d["pwd"]))
				{
					// $msg[]=array('type'=>'alert','text'=>'veuillez remplir tous les champs');
                    // $_SESSION['msg']=$msg;
                    echo "c'est vide";
					//header("Location:index.php?origin=inscription");
				}
				else
				{
                    
					if(!empty(getUserByUserName($d["login"])))
					{
                        echo "le login existe déjà";
						//$msg[]=array('type'=>'alert','text'=>'Ce login est déjà utilisé!Veuillez choisir un autre login!');
						// $_SESSION['msg']=$msg;
						// $_SESSION['form']=$d;
						
					}
					else
					{
                        $result=registeruser($d["login"],$d["pwd"],$d["firstname"],$d["lastname"],"admin",$f["avatar"]);
                        var_dump($result);
						if(!empty($result))
						{
							echo " erreur lors de l'inscription";
							//header("Location:index.php?action=register");
		
						}
						else
						{
                            echo "enregistrement reussie";
							// $msg[]=array('type'=>'succes','text'=>'Le compte a été créer avec succes!');
							// $_SESSION['msg']=$msg;
							// $_SESSION['form']=array();

							// if($d["profil"]=="user")
							// {
							// 	$dl=array('username'=>$d['login'],'password'=>$d['pwd']);
							// 	login($dl);
							// }
							// else
							// {
							// 	header("Location:index.php?origin=admin");
							// }
						}
					}
				}
			}
		
	}

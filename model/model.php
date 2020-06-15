<?php
    function getConnexion()
    {
        $oPDO="";
        
            try
            {
                //$oPDO = new PDO('mysql:host=localhost;dbname=quizzbd;charset=utf8', 'root', 'passemouhamed');
                $oPDO = new PDO('mysql:host=mysql-smb.alwaysdata.net;dbname=smb_quizz2;charset=utf8', 'smb', 'passemouhamed');
            }
            catch (PDOException $e)
            {
                die('Une erreur interne est survenue');
            }
            
            $oPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $oPDO;
    }

    function getData($d="connexions")
    {
         $db=getConnexion();
         
         $reponse=$db->query('SELECT * FROM '.$d);
    	return $reponse->fetch();
    }


    
	function checkUserLog($log,$pwd)
	{
        $db=getConnexion();
        $req=$db->prepare('SELECT c.id,c.profil,c.login,u.firstname, u.lastname, u.photo FROM connexions c JOIN utilisateur u on c.id=u.id_connexions WHERE c.login = :login AND c.password = :password');

        $req->execute(array('login'=>$log,'password'=>$pwd));

        return $req;
        

    }	
    
        function getAllUsers($limit=5,$offset=0)
    {
      //  $db=$GLOBALS['db'];//statut a ajouter apres 
        $db=getConnexion();
        $sql ="
            SELECT c.id,c.profil,c.login, u.firstname, u.lastname, u.photo
            FROM  connexions c JOIN utilisateur u on c.id=u.id_connexions
            LIMIT {$limit} 
            OFFSET {$offset}
    ";

       // $req=$db->query('SELECT c.id,c.profil,c.login, u.firstname, u.lastname, u.photo FROM connexions c JOIN utilisateur u on c.id=u.id_connexions LIMIT 5');
        $req=$db->query($sql);
          //  $req->execute();

        return $req->fetchAll(2);
           

    }


//----------------------------------------------------------------------------------------------------------------


    function registerUserAvatar($avatar)
    {
        $target_dir = "public/images/photo/";
        //avoir le temps en millisecondes
        $mt = explode(" ",microtime());
        $currenttime = (((int)$mt[1]) * 1000 + ((int)round($mt[0] * 1000)));
        $newBasename=$currenttime.basename($avatar["name"]);
        $target_file = $target_dir .$newBasename;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"]))
        {
            $check = getimagesize($avatar["tmp_name"]);
            if($check !== false)
            {
                //dsklsfdkml
                $uploadOk = 1;
            } 
            else
            {
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) 
        {
            $uploadOk = 0;
        }
        // Check file size
        if ($avatar["size"] > 500000)
        {
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" )
        {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) 
        {
            return "default.png";
        } 
        else 
        {
            if (move_uploaded_file($avatar["tmp_name"], $target_file))
            {
                return $newBasename;
                
            } else 
            {
                return "default.png";
            }
        }
    }

//----------------------------------------------------------------------------------------------------------------

function registeruser($log,$pwd,$fn,$ln,$pfl,$f_imguser)
{ 
			$db=getConnexion();          
                    
            //$avatar="lion.png";
           $avatar=registerUserAvatar($f_imguser);

            //hachage du mot de passe!
           // $passwordHash = password_hash($pwd, PASSWORD_BCRYPT, array("cost" => 12));
             $passwordHash = $pwd;

            $infocon=array("login"=>$log,"pwd"=>$passwordHash,"profil"=>$pfl);

            $sql_con='INSERT INTO connexions VALUES(DEFAULT,:login,:pwd,:profil, default)';
            $sql_user='INSERT INTO utilisateur VALUES(DEFAULT,:firstname,:lastname,:photo,now(),:id)';
            
            try
            {
            //commencer la transaction

                //$db->beginTransaction();
                $req_con=$db->prepare($sql_con);

                $req_con->execute($infocon);
                $id=$db->lastInsertId();

                
                $userInfo=array("firstname"=>$fn,"lastname"=>$ln,"photo"=>$avatar,"id"=>$id);
                
                $req_insert=$db->prepare($sql_user);
                $req_insert->execute($userInfo);

                // $db->commit();
                return true;

            }
            catch(PDOException $e)
            {
                return $e;
            }
            
}

function getUserByUserName($login)
{
        $db=getConnexion();
        $req=$db->prepare('SELECT * FROM connexions WHERE login = :login');

        $req->execute(array('login'=>$login));

        return $req->fetch();

}
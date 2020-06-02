<?php
    function getConnexion()
    {
        $oPDO="";
        
            try
            {
                $oPDO = new PDO('mysql:host=localhost;dbname=quizzbd;charset=utf8', 'root', 'passemouhamed');
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
        $req=$db->prepare('SELECT * FROM connexions WHERE login = :login AND password = :password');

        $req->execute(array('login'=>$log,'password'=>$pwd));

        return $req;
        

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
            $avatar=registerUserAvatar($f_imguser);

            $infocon=array("login"=>$log,"pwd"=>$pwd,"profil"=>$pfl);

            $sql_con=('INSERT INTO connexions VALUES(DEFAULT,:login,:pwd,:profil)');
            $req_con=$db->prepare($sql_con);

            $req_con->execute($infocon);
            $id=$db->lastInsertId();

            $sql_user=('INSERT INTO utilisateur VALUES(DEFAULT,:firstname,:lastname,:photo,now(),:id)');
            
            $userInfo=array("firstname"=>$fn,"lastname"=>$ln,"photo"=>$avatar,"id"=>$id);
            
            $req_insert=$db->prepare($sql_user);
            $req_insert->execute($userInfo);

           return $req_insert->fetch();
            
}

function getUserByUserName($login)
{
        $db=getConnexion();
        $req=$db->prepare('SELECT * FROM connexions WHERE login = :login');

        $req->execute(array('login'=>$login));

        return $req->fetch();

}
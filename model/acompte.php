<?php
///require_once 'model.php';
	

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
vard_dump($req->fetch());

        return $req;
        

	}	



	function checkUserNameExist($un)
	{
		$c=getData();
		return array_search($un,array_column($c,"login"));
	}



    

//----------------------------------------------------------------------------------------------------------------

	function getUserByUserName($un)
	{
        $c=getData();
        $i=0;
		foreach ($c as $i => $val) 
		{
			if($val['login']==$un)
			{
                $val['id']=$i;
               return $val;
			}
			$i++;
		}

		return "";
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
			$c=getData();          
            $avatar=registerUserAvatar($f_imguser);

            $userDetInfo=array("login"=>$log,"pwd"=>$pwd,"firstname"=>$fn,"lastname"=>$ln,"avatar"=>$avatar,"score"=>0,"type"=>$pfl,"statut"=>"on","question_repondu"=>[]);
            $c[]=$userDetInfo;
            $jsonData=json_encode($c);

             if(file_put_contents('db/connexion.json',$jsonData))
             {
             	return true;
             }

      return false;       
             
}
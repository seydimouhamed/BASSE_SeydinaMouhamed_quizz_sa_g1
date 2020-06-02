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
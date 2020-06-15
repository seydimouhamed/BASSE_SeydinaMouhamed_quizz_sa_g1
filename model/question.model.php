<?php 
    function getConnexion1()
    {
        $oPDO="";
        
            try
            {
                $oPDO = new PDO('mysql:host=localhost;dbname=quizzbd;charset=utf8', 'root', 'passemouhamed');
               // $oPDO = new PDO('mysql:host=mysql-smb.alwaysdata.net;dbname=smb_quizz;charset=utf8', 'smb', 'passemouhamed');
            }
            catch (PDOException $e)
            {
                die('Une erreur interne est survenue');
            }
            
            $oPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $oPDO;
    }

    

	function saveQuestion($question,$reponse)
	{
		$db=getConnexion1();

		$sql_qtn = "INSERT INTO questions VALUES( DEFAULT, :libele, :score, :type)";
        
		$req_qtn=$db->prepare($sql_qtn);
		$req_qtn->bindParam(":libele",$question['libele'], PDO::PARAM_STR);
		$req_qtn->bindParam(":score",$question['score'], PDO::PARAM_INT);
		$req_qtn->bindParam(":type",$question['type'], PDO::PARAM_STR);
		try
            {
            //commencer la transaction
                $db->beginTransaction();
                	$req_qtn->execute();

                	//recupere le dernier id inséré!
               		$id=$db->lastInsertId();
               			foreach ($reponse as $key => $rep) {
	               				$param_rep= array('id' =>$id ,"reponse" =>$rep['reponse'], "valide"=>$rep['valide']);
								$sql_rps="INSERT INTO reponses VALUES(DEFAULT,:reponse,:valide,:id)";
								$req_rep=$db->prepare($sql_rps);
								$req_rep->execute($param_rep);
               			}

                $db->commit();
                return true;
            }
            catch(PDOException $e)
            {
                return $e -> getMessage();
            }

	}
	function getAllQuestions($limit,$offset)
	{

      //  $db=$GLOBALS['db'];//statut a ajouter apres 
        $db=getConnexion1();
        $sql ="
            SELECT *
            FROM  questions q JOIN reponses r on q.id=r.id_questions
    ";

       // $req=$db->query('SELECT c.id,c.profil,c.login, u.firstname, u.lastname, u.photo FROM connexions c JOIN utilisateur u on c.id=u.id_connexions LIMIT 5');
        $req=$db->query($sql);
          //  $req->execute();


        $all= $req->fetchAll(\PDO::FETCH_GROUP);
        $nbrelement=count($all);
       $qtns= array_slice($all, $offset,$limit);

       	$arrayReturn = array('nbrelement' => $nbrelement,"qcm"=>$qtns);
       return $arrayReturn;
	}
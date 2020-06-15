<?php
 require_once './model/model.php';
 require_once './model/question.model.php';
function services($action,$post)
{
     $action($post);
	
}


function getUsers($post)
{
	$limit=5;
    $offset=0;
    if(isset($post['limit']))
    {
        $limit=$post['limit'];
    }

    if(isset($post['offset']))
    {
        $offset=$post['offset'];
    }
    
    
    $users=getAllUsers($limit,$offset);

    echo json_encode($users);
	
}

function getQuestionJeu($post)
{
    if($post['currentQtn']!==0)
    {
    $idqtn=$post['currentQtn'] - 1; 
    }
    else
    {
        $idqtn=0;
    }
    $jeux=$_SESSION['jeux']['qcm'][$idqtn];
    echo json_encode($jeux);
}

function getQuestions($post)
{
    $limit=5;
    $offset=0;
    if(isset($post['limit']))
    {
        $limit=$post['limit'];
    }

    if(isset($post['offset']))
    {
        $offset=$post['offset'];
    }

    $qtns=getAllQuestions($limit,$offset);

    echo json_encode($qtns);
    //echo json_encode(array('msg'=>"text"));

}

        function registerQuestion($post)
        {
            $questions=array();
            $reponses=array();
            $questions['libele']=$post['libele'];
            $questions['score']=$post['score'];
            $questions['type']=$post['type'];
            $is_rep_valide=false;


             // var_dump($post);

            if($post["type"]!=="ct")
            {
                $index=1;
                foreach ($post as $key => $p) 
                {
                    if(strpos($key, "reponse")!== FALSE)
                    {
                        if($p!="")
                        {
                            $reponsevalide=0;

                            if(in_array(substr($key, 8), $_POST['check']))
                            {
                                $reponsevalide=1;
                            }

                            $reponses[]=array('reponse' => $p, 'valide' => $reponsevalide );
                            
                        }
                        $index++;
                    }
                }

                if(count($reponses)>=2)
                {
                    $is_rep_valide=true;
                }
                 
            }
            else
            {
                $reponses[]=array('reponse'=>$post['reponse'],'valide'=>1);
                if(trim($post['reponse'])!=="")
                {
                    $is_rep_valide=true;
                }
            }

            
            //validations 
            if(!empty($questions['libele']) && !empty($questions['score']) && $is_rep_valide )
            {
               $result= saveQuestion($questions,$reponses);
               if($result!==true)
               {
                    echo "$result";
               }
               else 
               {
                    echo "success";
               }           
            }
            else
            {
                echo "veuillez remplir tous les champs";
            }   
        }

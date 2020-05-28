<?php
 require_once './model/model.php';

 function connexion($p)
 {
    $log=$p['login'];
    $pwd=$p['pwd'];

    return checkUserLog($log,$pwd);
 }
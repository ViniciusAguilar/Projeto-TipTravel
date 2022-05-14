<?php

    if(!isset($_SESSION['usuario'])){
    session_start();
    }
    $sessao = $_SESSION['usuario'];
    $pes = $_SESSION['pes'];
    $follow = $_POST['follow'];
    
    require_once('./api.php');

    $api = new api;
    $id = $api->setid($sessao);
    $pesid = $api->setpes_id($pes);
    $api->follow($follow);
    

  


?>
<?php

    if(!isset($_SESSION['usuario'])){
    session_start();
    }
    $sessao = $_SESSION['usuario'];
    $local = $_POST['local'];
    $descricao = $_POST['descricao'];
    
    require_once('./api.php');

    $api = new api;
    $id = $api->setid($sessao);
    $api->setlocal($local);
    $api->setdescricao($descricao);
    $api->postagem();

  


?>
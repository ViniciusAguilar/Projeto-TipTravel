<?php

    //PEGA OS DADOS DO FORMULARIO E VERIFICA SE NAO ESTA VAZIO

    if(!empty($_POST["usuario"]))
    {
    $usuario = $_POST["usuario"];
    }

    if(!empty($_POST["senha"]))
    {
        $senha = $_POST["senha"];  
    }

    if(!empty($_POST["email"]))
    {
    $email = $_POST["email"];
    }



    //ATIVA A API

    require_once('./api.php');
    $api = new api;

    //SE TIVER USUARIO,SENHA E E-MAIL CADASTRA NO BANCO DE DADOS

    if(!empty($usuario))
    {      
        $api->setusuario(strtolower($usuario));
    } 

    if(!empty($senha))
    {
        $api->setsenha($senha);  
    }

    if(!empty($email))
    {
        $api->setemail($email);
        $api->addDados();
        $api->setid($email);
        $api->id();
    }

    //SE NÃO TIVER O CADASTRO VOLTA PARA A PÁGINA DE CADASTRO
    
    else
    { 
        header('Location: /AAP/html/cadastro.html'); 
    }

    ?>

    <html>
        <--! LINK PARA VOLTAR PARA TELA DE LOGIN -->
        <body>
        <br><a  href="/AAP/html/index.html">Voltar ao inicio</a></br>
        </body>
    </html>
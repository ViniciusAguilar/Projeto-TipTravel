<?php 

    //VERIFICA SE ESTÁ LOGADO

    session_start();
    include('verifica_login.php');
    
?>
<html>

    <head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tip Travel - A Rede Social de Viagens</title>

    <!--link dos icons-->

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">

    <!--Arquivos de css -->

    <link rel="stylesheet" href="/AAP/css/pginicio.css">

    </head>

    <!-- FORMULÁRIO DE POST -->

    <form method = "POST" action = "/AAP/php/post.php" enctype="multipart/form-data" class = "postagem">
        
    <h3>POST</h3><br><br>
        
        <label>Local</label>
        <input type = "text" name = "local" id="localid" placeholder= "local visitado: "><br>

        <label>Descricao</label>
        <input type = "text" name = "descricao" id="descricaoid" placeholder = "Escreva o que está pensando sobre este local:"  ><br>

        <!-- BOTAO PARA ENVIAR ARQUIVO -->
        <input type = "hidden" name = "MAX_FILE_SIZE" value="99999999"/>
        <br>
        <tr>
        <td><input type="file" id="imagem" name="imagem"></td>
        </tr>
        <div class = "imgcontainer">
            <img src = "/AAP/images/camera.png" alt="selecione uma imagem" id= "ImgPhoto">
        </div>
        <script src= "/AAP/javascript/script.js"></script>
        <br>
      
        <input type = "submit" name = "botao"  for="create-post" class="btn btn-primary">
    </form>

    <body>

    </body>

<html>
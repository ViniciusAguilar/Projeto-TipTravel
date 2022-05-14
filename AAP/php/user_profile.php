<?php 
    session_start();
    include('verifica_login.php');
    print_r ($_SESSION);
?>
<!DOCTYPE html>
<html>

  
   
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tip Travel - A Rede Social de Viagens</title>
  <!--link dos icons-->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
  <link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Dancing Script">

  <!--Arquivos de css -->
  <link rel="stylesheet" href="/AAP/css/pginicio.css">

  <script>
            function pop()
            {
                jan = window.open("/AAP/php/new_post.php","dd","width = 700, height = 700,border-collapse:collapse");
            }
    </script>


<body>
  <nav>
    <div class="container">
    <h2 class="logo">
       <a href = "./painel.php"> Tip Travel</a>
      </h2>
      
      <div class="search-bar">
      
      <form method="POST" class="search-bar"action="/AAP/php/search.php"> 
         
        <input type="search" name = "pes" placeholder="Procure por pessoas que você conhece!">
        </form>
      </div>
      <div class="create">
        <label class="btn btn-primary" for="create-post" onclick = "pop()"> Criar
        </label>
        <div class="profile-photo">
          <img <?php
          require_once("./api.php");
          $api = new api;
            $session = $_SESSION['usuario'];
            $id = $api->setid($session);
            $api->showminiImage();
          ?> alt="foto-de-perfil">
        </div>
      </div>

    </div>
    </div>
  </nav>

  <!-------------------------------MAIN PARTE DO SITE--------------->
  <main>
    <div class="container">
      <!-----------------------DIV DA ESQUERDA---------------------------->
      <div class="left">
        <a class="profile">
          <div class="profile-photo">
          <img <?php
          require_once("./api.php");
          $api = new api;
            $session = $_SESSION['usuario'];
            $id = $api->setid($session);
            $api->showminiImage();
          ?> alt="foto-de-perfil">
          </div>
          <div class="name-profile">
            <h4> <?php
          require_once("./api.php");
          $api = new api;
            $session = $_SESSION['usuario'];
            $id = $api->setid($session);
            $api->showname($id);
          ?> </h4>
            <p class="text-muted">
              
          </div>
        </a>
        <!------------------SIDEBAR---------------------->
        <div class="sidebar">
          <a class="menu-item active" href ="./painel.php">
            <span><i class="uil uil-home"></i></span>
            <h3>Home </h3>
          </a>
          <a class="menu-item" href = "./user_profile.php">
            <span><i class="uil uil-user"></i></span>
            <h3>Perfil </h3>
          </a>
          <a link href="#" class="menu-item" id="notifications">
            <span><i class="uil uil-bell"><small class="notification-count">3+</small></i></span>
            <h3>Notificações </h3>
            
          </a>
        
          <a class="menu-item" href= "./pagina_perfil.php">
            <span><i class="uil uil-setting"></i></span>
            <h3>Configurações do perfil</h3>
          </a>
          <a class="menu-item" href= "./logout.php">
            <span><i class="uil uil-exit"></i></span>
            <h3>sair</h3>
        </a>
        </div>
       
        <!------------------FINAL DAS NOTIFICAÇÕES---------------------->
        
      
        <a for="create-post" class="btn btn-primary" onclick = "pop()"> Create Post </a>
      </div>

      
      <div class="middle">
        <!------------------CRIAÇÃO DE POSTAGENS---------------------->
     
        <!------------------FEEDS---------------------->
        <div class="feeds">
          <!------------------FEED 1---------------------->
          <div class="feed">
            <div class="head">
              <div class="user">
                <div class="profile-photo">
                  <img s<?php
          require_once("./api.php");
          $api = new api;
            $session = $_SESSION['usuario'];
            $id = $api->setid($session);
            $api->showminiImage();
            echo ($id);
          ?>  alt="foto-do-feed-1">
                </div>
                <div class="info">
                  <h3> <?php
                    require_once("./api.php");
                    $api = new api;
                    $session = $_SESSION['usuario'];
                    $id = $api->setid($session);
                    
                    $api->showname($id);
                    print_r($id);
                    
                    
          ?> <br> <b> <label style="font-family: 'Dancing Script', serif;">Followers: <?php $api->showfollowers();?></label> </b> </h3>
                   
                </div>
                
                
              </div>
            <br>
           
            
            <br>
             <label style = "right: 500px;"> <?php  $api->showbio();?></label>
              
        </div>
        
        <a  for="create-post" class="btn btn-primary" style = "float: right; left: 500px"> Seguir </a>
        <br>
        <br>
        
        </div>
        
        
        <!-- FEED 2 -->
        
          <!------------------FEED 1---------------------->
           
          
          <?php
          require_once("./api.php");
          $api = new api;
            $session = $_SESSION['usuario'];
            $id = $api->setid($session);
            $api->get_profileposts($id);
            $api->show_profileposts($id);
            echo ($id);
          ?>
          
           
        </div>
     
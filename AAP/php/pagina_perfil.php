<html>
    <head>
    <link rel="stylesheet" href="/AAP/css/pginicio.css">
        <?php
            if(!isset($_SESSION['usuario'])){
                session_start();
            }       
            ?>
      <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tip Travel - A Rede Social de Viagens</title>
  <!--link dos icons-->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
  <script>
            function pop()
            {
                jan = window.open("/AAP/php/new_post.php","dd","width = 700, height = 700,border-collapse:collapse");
            }
    </script>
    </head>

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
          <a class="menu-item" href ="./user_profile.php">
            <span><i class="uil uil-user"></i></span>
            <h3>Perfil </h3>
          </a>
          <a link href="#" class="menu-item" id="notifications">
            <span><i class="uil uil-bell"><small class="notification-count">3+</small></i></span>
            <h3>Notificações </h3>
            <!------------------POPUP DE NOTIFICAÇÃO---------------------->
            <div class="notifications-popup">
              <!------------------NOTIFICAÇÃO 1---------------------->
              <div>
                <div class="profile-photo">
                  <img src="/AAP/images/profile-2.jpg">
                </div>
                <div class="notification-body">
                  <b>Jhow Silva</b> aceitou seu pedido de amizade
                  <small class="text-muted"> 2 dias atrás</small>
                </div>
              </div>
              <!------------------NOTIFICAÇÃO 2---------------------->
              <div>
                <div class="profile-photo">
                  <img src="/AAP/images/profile-3.jpg">
                </div>
                <div class="notification-body">
                  <b>Kelly Santos</b> comentou em sua postagem
                  <small class="text-muted"> 3 dias atrás</small>
                </div>
              </div>

              <!------------------NOTIFICAÇÃO 3---------------------->
              <div>
                <div class="profile-photo">
                  <img src="/AAP/images/profile-4.jpg">
                </div>
                <div class="notification-body">
                  <b>Marina Ester</b> gostou da sua postagem
                  <small class="text-muted"> 5 dias atrás</small>
                </div>
              </div>

            </div>
          </a>
      
          <a class="menu-item" href= "./pagina_perfil.php">
            <span><i class="uil uil-setting"></i></span>
            <h3>Configurações do perfil </h3>
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
      
      
    
                
      <form method ="POST" action = "/AAP/php/perfil.php" enctype="multipart/form-data">
            
                <h3>Perfil</h3><br> 
        <center>
            <label> Mudar foto de perfil </label>
            <input type = "hidden" name = "MAX_FILE_SIZE" value="99999999" style = "display: none;"/>
        <br>
        <tr>
        <td><input type="file" id="imagem" name="imagem"></td>
        <br>
        </tr>
        
        <div class = "imgcontainer">
            <img src = "/AAP/images/camera.png" alt="selecione uma imagem" id= "ImgPhoto" width = 10% height = 13%>
        </div>
        <script src= "/AAP/javascript/script.js"></script>

        
        </center>
             
        <br>
            <label>Nome:</label>
            <input type = "text" name = "usuario" id="nomeid" placeholder= <?php
            $session = $_SESSION['usuario'];
            $id = $api->setid($session);
            $api-> getInformation("nome","dados_de_usuario");
            ?>><br>
             <label>BIO:</label>
            <input type = "text" name = "bio" id="bioid" placeholder= <?php
            $api-> getInformation("bio","dados_de_usuario");
            ?>><br>
            <label>Email:</label>
            <input type = "text" name = "email" id="emailid" placeholder= <?php
            $api-> getInformation("email","dados_de_usuario");
            ?>><br>
            <label>Telefone:</label>
            <input type = "text" name = "telefone" id="telefoneid" placeholder= <?php
            $api-> getInformation("telefone","dados_de_usuario");
            ?>><br>
            <label>Idade:</label>
            <input type = "text" name = "idade" id="idadeid" placeholder= <?php
            $api-> getInformation("idade","dados_de_usuario");
            ?>><br>
            <label>Cidade:</label>
            <input type = "text" name = "cidade" id="cidadeid" placeholder= <?php
            $api-> getInformation("endereco","dados_de_usuario");
            ?>><br>
            <label>CPF:</label>
            <input type = "text" name = "cpf" id="cpfid" placeholder= <?php
            $api-> getInformation("cpf","dados_de_usuario");
            ?>><br>
            
            <input type = "submit"name = "botao" value = "Update">
    
        </form>
                 
               
        
       
        </div>
        
     
      

       

    
</html>
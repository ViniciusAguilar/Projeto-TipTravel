<html>
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
        Tip Travel
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
          <a class="menu-item" href = "./user_profile.php">
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
       

        <div class="feeds">
         
          <div class="feed">
            <div class="head">
              <div class="user">
                <div class="info">
                <?php
     
     //coloca a barra de menu
  
      if(!isset($_SESSION['usuario'])){
          session_start();
          }
          
      $sessao = $_SESSION['usuario'];
   
      if(!empty($_POST["usuario"])){
          $usuario = $_POST["usuario"];
      }
      if(!empty($_POST["telefone"])){
          $telefone = $_POST["telefone"];
      }
      
     if(!empty($_POST["email"])){
      $email = $_POST["email"];
     }
     if (!empty($_POST["idade"])){
      $idade = $_POST["idade"];
     }
      if (!empty($_POST["cidade"])){
          $cidade = $_POST["cidade"];
      }
      if (!empty($_POST["cpf"])){
          $cpf = $_POST["cpf"];
      }
      if (!empty($_POST["bio"])){
        $bio = $_POST["bio"];
    }
      
      require_once('./api.php');
  
      //Cria objeto da api
  
      $api = new api;
      $campos = 0;
  
      //Verifica se há os dados e aciona os metodos sets 
  
      if (!empty($usuario))
      {
          $api->setusuario(strtolower($usuario));
          $api->updatePerfil();
   
      } else echo "Nome não modificado<br>";
      if (!empty($telefone))
      {
          $api->setTelefone($telefone);
          $api->updatetelefone();
        
      }else echo "Telefone não modificado<br>";
      if (!empty($email))
      {
          $api->setemail(strtolower($email));
         
      }
      if (isset($idade))
      {
          $api->setIdade($idade);
          $api->updateidade();
         
      }echo "idade não modificada<br>";
      if (!empty($cidade)) 
      {
          $api->setCidade(strtolower($cidade));
          $api->updateendereco();  
      }echo "Cidade não modificada<br>";
      if (!empty($cpf)){
          $api->setCPF($cpf);
          $api->updatecpf();
      }
      if (!empty($bio)) 
      {
          $api->setbio(strtolower($bio));
          $api->updatebio();  
      }echo "Cidade não modificada<br>";
      
      $id = $api->setid($sessao);
      
      
      $api->upload();
  
  
  ?>
                  
                </div>
              </div>
        </div>
    </div>
    </div>
    </div>
        
        </body>
</html>

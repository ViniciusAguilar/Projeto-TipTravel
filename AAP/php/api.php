<?php

//CRIAR A CLASSE DA API COM VARIAS FUNÇÕES

    class api 
    {
        
        //PEGA O USUARIO

        function setusuario($usuario)
        {
            $this->usuario = $usuario;
        }
        function getusuario()
        {
            return $this->usuario;
        }

        //PEGA O EMAIL

        function setemail($email)
        {
            $this->email = $email;
        }
        function getemail()
        {
            return $this->email;
        }

        //PEGA A SENHA

        function setsenha($senha)
        {
            $this->senha = $senha;
        }
        function getsenha($senha)
        {
            return $this->senha;
        }

        //FUNÇÃO DE CONEXÃO

        function connect()
        {
            include_once('./connection.php');
            $con = new conexao;
            $conn = $con->conexao();

            return $conn;
        }
  
        //FUNÇÃO DE ADICIONAR DADOS NO BANCO

        function addDados()
        {
            $con = $this->connect();

            $sql = "INSERT INTO dados_de_usuario(nome,senha,email) VALUES(
                '$this->usuario','$this->senha','$this->email')"; 
            
            
            $rs = mysqli_query($con,$sql) or die(mysqli_error($con));
           
        }

        //-------------------------------------------------------- PEGAR O ID -----------------------------------------------------------------------------------

        function setid ($usuario)
        {
            
            $con = $this->connect();
            $id = "SELECT id_dados_de_usuario FROM dados_de_usuario WHERE email = '$usuario'";
            
            $rs3 = mysqli_query($con,$id);
            $ar = mysqli_fetch_row($rs3);
    
            $this->ids = intval($ar[0]);
            
        }

        function getid()
        {
            return $this->ids;
        }

        function setpes_id($ids)
        {
            $con = $this->connect();
            $id = "SELECT id_dados_de_usuario FROM dados_de_usuario WHERE id_dados_de_usuario = '$ids'";
            
            $rs3 = mysqli_query($con,$id);
            $ar = mysqli_fetch_row($rs3);
    
            $this->pesids = intval($ar[0]);

        }
        function getpes_id()
        {
            return $this->pesids;
        }

        //-------------------------------------------------- ATUALIZA O ID NO BANCO DE DADOS ---------------------------------------------------------------------

        function id()
        {   

            $con = $this->connect();

            
            $sql2 = "INSERT INTO usuario(id_usuario) VALUES(
                '$this->ids')"; 

            $sql3 = "UPDATE `dados_de_usuario` SET `ID_USUARIO` = '$this->ids' WHERE `dados_de_usuario`.`ID_DADOS_DE_USUARIO` ='$this->ids'"; 

            $sql4 = "INSERT INTO perfil(id_perfil) VALUES(
                '$this->ids')"; 

            $sql5 = "UPDATE `usuario` SET `ID_PERFIL` = '$this->ids' WHERE `usuario`.`ID_USUARIO` = '$this->ids'"; 
             
            $sql7 = "UPDATE perfil SET ID_USUARIO ='$this->ids' WHERE perfil.id_perfil = '$this->ids'"; 

            $sql18 = "  UPDATE usuario SET id_dados_de_usuario = '$this->ids' WHERE id_usuario ='$this->ids'";

      
                
                
            $rs2 = mysqli_query($con,$sql2) or die('Erro rs2 '.mysqli_error($con)); 
            $rs4 = mysqli_query($con,$sql3) or die('Erro rs4 '.mysqli_error($con)); 
            $rs5 = mysqli_query($con,$sql4) or die('Erro rs5 '.mysqli_error($con));
            $rs6 = mysqli_query($con,$sql5) or die('Erro rs6 '.mysqli_error($con));
            $rs8 = mysqli_query($con,$sql7)or die('Erro rs8 '.mysqli_error($con));
            $rs9 = mysqli_query($con,$sql18)or die('Erro rs9 '.mysqli_error($con));
       
        }
        
        //---------------------------------------------------------- PEGAR DADOS DO PERFIL --------------------------------------------------------------------------

        //Telefone

        function setTelefone($telefone)
        {
            $this->telefone = $telefone;
        }
        function getTelefone()
        {
            return $this->telefone;
        }

        //Idade

        function setIdade($idade)
        {
            $this->idade = $idade;
        }
        function getIdade()
        {
            return $this->idade;
        }

        //Cidade

        function setCidade($cidade)
        {
            $this->cidade = $cidade;
        }
        function getCidade()
        {
            return $this->cidade;
        }

        
        //CPF

        function setCPF($cpf)
        {
            $this->cpf = $cpf;
        }
        function getCPF()
        {
            return $this->cpf;
        }

        //BIO

        function setbio($bio)
        {
            $this->bio = $bio;
        }
        function getbio()
        {
            return $this->bio;
        }
        

        //-------------------------------------------------------- ALTERA OS DADOS DO PERFIL -----------------------------------------------------------------------

        //AlTERA NOME

        function updatePerfil()
        {   
            //CONEXAO

            $con = $this->connect();

            $sessao = $_SESSION['usuario'];

            //AREA DE UPDATE
            
            $sql = "  UPDATE dados_de_usuario usuario SET nome = '$this->usuario' WHERE email ='$sessao'" ;

            //AREA DE QUERY

            $rs = mysqli_query($con,$sql) or die ("Falha ao inserir, tente novamente.".mysqli_error($con));
        }

        //ALTERA O TELEFONE 

        function updatetelefone()
        {
            //CONEXAO

            $con = $this->connect();
            $sessao = $_SESSION['usuario'];
            
            //UPDATE

            $sql1 = "  UPDATE dados_de_usuario usuario SET telefone = '$this->telefone' WHERE email ='$sessao'" ;

            //QUERY

            $rs1 = mysqli_query($con,$sql1) or die ("Falha ao inserir, tente novamente.".mysqli_error($con));
        }

        //ALTERA IDADE

        function updateidade()
        {
            //CONEXAO

            $con = $this->connect();
            $sessao = $_SESSION['usuario'];

            //UPDATE

            $sql2 = "  UPDATE dados_de_usuario usuario SET idade = '$this->idade' WHERE email ='$sessao'" ;
            
            //QUERY

            $rs2 = mysqli_query($con,$sql2) or die ("Falha ao inserir, tente novamente.".mysqli_error($con));
        }

        //ALTERA O ENDEREÇO

        function updateendereco()
        {
            //CONEXAO

            $con = $this->connect();
            $sessao = $_SESSION['usuario'];

            //UPDATE

            $sql3 = "  UPDATE dados_de_usuario usuario SET endereco = '$this->cidade' WHERE email ='$sessao'" ;
  
            //QUERY

            $rs3 = mysqli_query($con,$sql3) or die ("Falha ao inserir, tente novamente.".mysqli_error($con));
        }

        //ALTERA O CPF

        function updatecpf()
        {
            //CONEXAO

            $con = $this->connect();
            $sessao = $_SESSION['usuario'];

            //UPDATE
            $sql4 = "  UPDATE dados_de_usuario usuario SET cpf = '$this->cpf' WHERE email ='$sessao'" ;
      
            //QUERY

            $rs4 = mysqli_query($con,$sql4) or die ("Falha ao inserir, tente novamente.".mysqli_error($con));
        }
        
        function updatebio()
        {
            //CONEXAO

            $con = $this->connect();
            $sessao = $_SESSION['usuario'];

            //UPDATE
            $sql4 = "  UPDATE dados_de_usuario usuario SET bio = '$this->bio' WHERE email ='$sessao'" ;
      
            //QUERY

            $rs4 = mysqli_query($con,$sql4) or die ("Falha ao inserir, tente novamente.".mysqli_error($con));
        }


        function updatenomeusuario()
        {
            $con = $this->connect();

            $sessao = $_SESSION['usuario'];

            if(isset($this->usuario)){
                $sql5 = "  UPDATE usuario SET nome = '$this->usuario' WHERE id_usuario ='$this->ids'" ;
                $sql5 = "  UPDATE usuario SET id_dados_de_usuario = '$this->ids' WHERE id_usuario ='$this->ids'";
                $rs5 = mysqli_query($con,$sql5) or die ("Falha ao inserir, tente novamente.".mysqli_error($con)); 
            }
        
        }

        //----------------------------------------------------------FAZER UPLOAD DE IMAGENS------------------------------------------------------------------------
        
        function upload()
        {
            //CONEXÃO COM O BANCO DE DADOS
   
            $conn = $this->connect();

            //VERIFICA SE A IMGEM FOI COLOCADA NO CAMPO
 
            if(is_uploaded_file($_FILES['imagem']['tmp_name']))
            {   
                //VARIÁVEIS QUE RECEBERÃO AS INFORMAÇÕES DAS IMAGENS

                $imgData = file_get_contents($_FILES['imagem']['tmp_name']);
                $tamanho = getimagesize($_FILES['imagem']['tmp_name']);
                $imgsize = $_FILES['imagem']['size'];
                $caminho =  $_FILES['imagem']['tmp_name'];
                $imagem = $imgData;
                $tipo = $_FILES['imagem']['type'];
                $nome = $_FILES['imagem']['name'];
            }
        
            //COLOCA A IMAGEM NO BANCO DE DADOS

            if(isset($imagem))
            {
               
                $fp = fopen($caminho,'rb');
                $conteudo = fread($fp, $imgsize);
                $conteudo = addslashes($conteudo);
                fclose($fp);
    
                $qi = "UPDATE perfil,dados_de_usuario SET foto ='$conteudo' WHERE id_perfil = '$this->ids'";
                mysqli_query($conn,$qi) or die ("Falha ao inserir, tente novamente.".mysqli_error($conn));
            
                if(mysqli_affected_rows($conn)>0)
                    print "A  imagem foi salva na base de dados";
                else
                    print_r ("Não foi possivel salvar imagem na base de dados".mysqli_error($conn));
            }else
                print "Falha ao carregar imagem.";
        }

        //----------------------------------------------------------- MOSTRAR IMAGENS ------------------------------------------------------------------------------

        function showImage($id)
        {
            //CONEXAO

            $con = $this->connect();
           
            //VERIFICA SE HÁ O ID

      

            //SELECIONA A FOTO COM BASE NO ID

            $sql2 = "SELECT foto FROM perfil WHERE id_perfil = '$id'";

            //QUERY

            $rs2 = mysqli_query($con,$sql2) or die ("fala".mysqli_error($con));
           
            //MOSTRA A IMAGEM ENQUANTO ESTA NA TELA

            while ($row = mysqli_fetch_array($rs2))
            {
                ?>
                <tr> 
                    <td><?php echo '<img src ="data:image;base64,'.base64_encode($row['foto']).'"alt="Image" 
                    style = "width: 100px; height: 100px; border-radius: 50%;"
                    >'?></td>
                </tr>
                <?php
                }

            return $row;
        }
        function showpesImage()
        {
            //CONEXAO

            $con = $this->connect();
           
            //VERIFICA SE HÁ O ID

      

            //SELECIONA A FOTO COM BASE NO ID

            $sql2 = "SELECT foto FROM perfil WHERE id_perfil = '$this->pesids'";

            //QUERY

            $rs2 = mysqli_query($con,$sql2) or die ("fala".mysqli_error($con));
           
            //MOSTRA A IMAGEM ENQUANTO ESTA NA TELA

            while ($row = mysqli_fetch_array($rs2))
            {
                ?>
                <tr> 
                    <td><?php echo '<img src ="data:image;base64,'.base64_encode($row['foto']).'"alt="Image" 
                    style = "width: 100px; height: 100px; border-radius: 50%;"
                    >'?></td>
                </tr>
                <?php
                }

            return $row;
            }


        //MOSTRA PEQUENAS IMAGENS
        
        function showminiImage()
        {
            //CONEXAO

            $con = $this->connect();
            
            //VERIFICA SE HÁ O ID

            $sql2 = "SELECT foto FROM perfil WHERE id_perfil = '$this->ids'";

            //QUERY

            $rs2 = mysqli_query($con,$sql2) or die ("fala".mysqli_error($con));

            //MOSTRA A IMAGEM ENQUANTO ESTA NA TELA

            while ($row = mysqli_fetch_array($rs2))
            {
                ?>
                <tr> 
                    <td><?php echo '<img src ="data:image;base64,'.base64_encode($row['foto']).'"alt="Image" 
                    style = "width: 25px; height: 25px;"
                    >'?></td>
                </tr>
                <?php
            }
            return $row;
        }
        function showpes_miniImage()
        {
            //CONEXAO

            $con = $this->connect();
            
            //VERIFICA SE HÁ O ID

            $sql2 = "SELECT foto FROM perfil WHERE id_perfil = '$this->pesids'";

            //QUERY

            $rs2 = mysqli_query($con,$sql2) or die ("fala".mysqli_error($con));

            //MOSTRA A IMAGEM ENQUANTO ESTA NA TELA

            while ($row = mysqli_fetch_array($rs2))
            {
                ?>
                <tr> 
                    <td><?php echo '<img src ="data:image;base64,'.base64_encode($row['foto']).'"alt="Image" 
                    style = "width: 25px; height: 25px;"
                    >'?></td>
                </tr>
                <?php
            }
            return $row;
        }
        function show_miniImage($id)
        {
            //CONEXAO

            $con = $this->connect();
            
            //VERIFICA SE HÁ O ID

            $sql2 = "SELECT foto FROM perfil WHERE id_perfil = '$id'";

            //QUERY

            $rs2 = mysqli_query($con,$sql2) or die ("fala".mysqli_error($con));

            //MOSTRA A IMAGEM ENQUANTO ESTA NA TELA

            while ($row = mysqli_fetch_array($rs2))
            {
                ?>
                <tr> 
                    <td><?php echo '<img src ="data:image;base64,'.base64_encode($row['foto']).'"alt="Image" 
                    style = "width: 25px; height: 25px;"
                    >'?></td>
                </tr>
                <?php
            }
            return $row;
        }

        //----------------------------------------------------------MOSTRAR O NOME NA TELA--------------------------------------------------------------------------

        function showname($id)
        {

            //CONEXAO

            $con = $this->connect();

            //PEGAR O NOME NO BANCO DE DADOS COM BASE NO ID

            $sql = "SELECT nome FROM dados_de_usuario WHERE id_dados_de_usuario = '$this->ids'";

            //QUERY

            $rs = mysqli_query($con,$sql) or die ("fala".mysqli_error($con));

            //MOSTRAR O NOME NA TELA ENQUANTO ESTIVER RODANDO O CODIGO

            while($row = mysqli_fetch_array($rs))
            {      
            print $row['nome'];              
            }   
            
        }

        function showpes_name($id)
        {

            //CONEXAO

            $con = $this->connect();

            //PEGAR O NOME NO BANCO DE DADOS COM BASE NO ID

            $sql = "SELECT nome FROM dados_de_usuario WHERE id_dados_de_usuario = '$this->pesids'";

            //QUERY

            $rs = mysqli_query($con,$sql) or die ("fala".mysqli_error($con));

            //MOSTRAR O NOME NA TELA ENQUANTO ESTIVER RODANDO O CODIGO

            while($row = mysqli_fetch_array($rs))
            {      
            print $row['nome'];              
            }     
        }

        function show_name($id)
        {

            //CONEXAO

            $con = $this->connect();

            //PEGAR O NOME NO BANCO DE DADOS COM BASE NO ID

            $sql = "SELECT nome FROM dados_de_usuario WHERE id_dados_de_usuario = '$id'";

            //QUERY

            $rs = mysqli_query($con,$sql) or die ("fala".mysqli_error($con));

            //MOSTRAR O NOME NA TELA ENQUANTO ESTIVER RODANDO O CODIGO

            while($row = mysqli_fetch_array($rs))
            {      
            print $row['nome'];              
            }     
        }
    
        //-------------------------------------------------------------- FUNÇÃO DE POSTAGEM ------------------------------------------------------------------------

        //PEGAR O LOCAL

        function setlocal($local)
        {
            $this->local = $local;
        }
        function getlocal()
        {
            return $this->local;
        }

        //PEGAR A DESCRIÇÃO

        function setdescricao($descricao)
        {
            $this->descricao = $descricao;
        }
        function getdescricao()
        {
            return $this->descricao;
        }

        //FUNÇÃO DA POSTAGEM

        function contador()
        {
            $con = $this->connect();
            
            $sql = "SELECT COUNT(*) FROM post WHERE id_perfil = '$this->ids'";
            $rs = mysqli_query($con,$sql) or die ("fala".mysqli_error($con));
            $ar= mysqli_fetch_row($rs);

            $this->conta = $ar[0] + 1;

            return $this->conta;
        }

        function postagem()
        {   
            //CONEXÃO

            $conn = $this->connect();

            //VERIFICA SE A IMGEM FOI COLOCADA NO CAMPO
 
            if(is_uploaded_file($_FILES['imagem']['tmp_name']))
            {   
                //VARIÁVEIS QUE RECEBERÃO AS INFORMAÇÕES DAS IMAGENS

                $imgData = file_get_contents($_FILES['imagem']['tmp_name']);
                $tamanho = getimagesize($_FILES['imagem']['tmp_name']);
                $imgsize = $_FILES['imagem']['size'];
                $caminho =  $_FILES['imagem']['tmp_name'];
                $imagem = $imgData;
                $tipo = $_FILES['imagem']['type'];
                $nome = $_FILES['imagem']['name'];
            }
        
            //COLOCA A IMAGEM NO BANCO DE DADOS

            if(isset($imagem))
            {
                $fp = fopen($caminho,'rb');
                $conteudo = fread($fp, $imgsize);
                $conteudo = addslashes($conteudo);
                fclose($fp);
                $this->contador();

    
                $qi = "INSERT INTO post (descricao,locals,id_perfil,imagem,contador) VALUES('$this->descricao','$this->local','$this->ids','$conteudo','$this->conta') ";
                mysqli_query($conn,$qi) or die ("Falha ao inserir, tente novamente.".mysqli_error($conn));
            
                if(mysqli_affected_rows($conn)>0)
                    print "A  imagem foi salva na base de dados";
                else
                    print_r ("Não foi possivel salvar imagem na base de dados".mysqli_error($conn));
            }else
                print "Falha ao carregar imagem.";            
        }

    
        //-------------------------------------------------------------- BARRA DE PESQUISA -------------------------------------------------------------------------

        //PEGAR O QUE ESTÁ ESCRIO NA BARRA DE PESQUISA

        function setpes($pes)
        {
            $this->pes = $pes;
        }
        function getpes()
        {
            return $this->pes;
        }

        //FUNÇÃO DE PESQUISA

    

        function search()
        {
            $con = $this->connect();
            $sql2 = "SELECT COUNT(id_dados_de_usuario) FROM dados_de_usuario WHERE nome = '$this->pes'";
            $rs2 = mysqli_query($con, $sql2) or die(mysqli_error($con));
            $ar2 = mysqli_fetch_row($rs2);

            
            


           for($i = 0; $i <=$ar2[0];$i++)
           {
               if($i >= 0){
             ?>  
            <div class="feeds">
         
            <div class="feed">
              <div class="head">
                
                <a href = "./profiles.php" class="btn btn-primary" style = "float: right;">Visite o perfil!</a>
               
                <div class="user">
                  <div class="info">
                      <?php
                  $sql = "SELECT id_dados_de_usuario FROM dados_de_usuario WHERE nome = '$this->pes'";
                    $rs = mysqli_query($con,$sql) or die ("fala".mysqli_error($con));
                    $ar = mysqli_fetch_row($rs);
                    $_SESSION['pes'] = $ar[0];
    
                $id = intval($ar[0]);

                $sql2 = "SELECT nome FROM dados_de_usuario WHERE nome = '$this->pes'";
                $rs2 = mysqli_query($con,$sql2) or die ("fala".mysqli_error($con));
                $ar2 = mysqli_fetch_row($rs2);

            

                $this->showImage($id);
                print_r($ar2[0]);
                  
                ?>
       
        

                
                  </div>
                 
                </div>
                </div>
                
                </div>
               
                </div>
                <?php
               }
           }
            
  
        }

        //---------------------------------------------------- FEED DA PAGINA DE PERFIL ---------------------------------------------------------------------------

        //Pega os posts feitos pelo usuario

        function get_profileposts($id)
        {
            //CONEXÃO

            $con = $this->connect();

            //SELECIONAR OS POSTS FEITOS PELO USUARIO

            $sql = "SELECT * FROM post WHERE id_perfil = '$id'";

            //QUERY

            $rs = mysqli_query($con,$sql) or die ("fala".mysqli_error($con));

            $this->profilePost = mysqli_fetch_array($rs);

            return $this->profilePost;
        }

        function get_pesprofileposts()
        {
            //CONEXÃO

            $con = $this->connect();

            //SELECIONAR OS POSTS FEITOS PELO USUARIO

            $sql = "SELECT * FROM post WHERE id_perfil = '$this->pesids'";

            //QUERY

            $rs = mysqli_query($con,$sql) or die ("fala".mysqli_error($con));

            $this->pesprofilePost = mysqli_fetch_array($rs);

            return $this->pesprofilePost;
        }


        //Coloca na tela o post feito pelo usuario
        function show_profileposts($sessao)
        {
           
            $con = $this->connect();
          
           
            //VERIFICA SE HÁ O ID

            if (!isset($id))
            {
                $id = $this->ids;
            } 
            else
            {
                $this->id = $id;
            }

            //pega o numero de postagens feitas pelo usuário
            $sql3 = "SELECT COUNT(id_post) FROM post WHERE id_perfil = '$this->ids'";
            $rs3 = mysqli_query($con,$sql3) or die ("fala".mysqli_error($con));
            $row1= mysqli_fetch_row($rs3);
            


            //SELECIONA A FOTO COM BASE NO ID

            for($i = $this->profilePost['ID_POST']; $i <= $row1[0]; $i++)
            {
                if ($i >= 1){

                
                ?>
                <div class="feed">
                <div class="head">
                  <div class="user">
                    <div class="profile-photo">
                      <img s<?php
          
                        $this->showminiImage($id);
              ?>  alt="foto-do-feed-1">
              
               </div>
               <h3 style = "float: left;"> <?php
                    $this->showname($id);
          ?> </h3>
               </div>
               <br>
                <div class="info">
                <?php            //PEGAR O NOME NO BANCO DE DADOS COM BASE NO ID

                $sql = "SELECT descricao FROM post WHERE id_perfil= '$id' AND contador = '$row1[0]' - '$i' +1  ORDER BY contador DESC";

                //QUERY

                $rs = mysqli_query($con,$sql) or die ("fala".mysqli_error($con));

                //MOSTRAR O NOME NA TELA ENQUANTO ESTIVER RODANDO O CODIGO

                while($row = mysqli_fetch_array($rs))
                {      
                print $row['descricao'];              
                }     ?>
               
                   
                </div>
              <?php
             
                $sql2 = "SELECT imagem FROM post WHERE id_perfil= '$id' AND contador ='$row1[0]' - '$i' +1  ORDER BY contador DESC";

                //QUERY
    
                $rs2 = mysqli_query($con,$sql2) or die ("fala".mysqli_error($con));
               
                //MOSTRA A IMAGEM ENQUANTO ESTA NA TELA
                ?>
                <div class="photo">
                <?php   while ($row = mysqli_fetch_array($rs2))
                {
                    ?>
                   
                     <?php echo '<img src ="data:image;base64,'.base64_encode($row['imagem']).'"alt="foto-do-feed-1" 
                        style = "width: 700px; height: 510px;"
                        >'?>
                   
                    <?php

                    }?> 
                </div>

                <small>
                <?php            //PEGAR O NOME NO BANCO DE DADOS COM BASE NO ID

                $sql = "SELECT locals FROM post WHERE id_perfil= '$id' AND contador ='$row1[0]' - '$i' +1  ORDER BY contador DESC";

                //QUERY

                $rs = mysqli_query($con,$sql) or die ("fala".mysqli_error($con));

                //MOSTRAR O NOME NA TELA ENQUANTO ESTIVER RODANDO O CODIGO

                while($row = mysqli_fetch_array($rs))
                {      
                print $row['locals'];              
                }     ?></small>
                </div>
                
               
            </div>
           
            
                <?php
                

            }
            }
           

            return $row;
        }

        function show_pesprofileposts($sessao)
        {
           
            $con = $this->connect();
          
           
            //VERIFICA SE HÁ O ID

            if (!isset($id))
            {
                $id = $this->pesids;
            } 
            else
            {
                $this->pesid = $id;
            }

            //pega o numero de postagens feitas pelo usuário
            $sql3 = "SELECT COUNT(id_post) FROM post WHERE id_perfil = '$id'";
            $rs3 = mysqli_query($con,$sql3) or die ("fala".mysqli_error($con));
            $row1= mysqli_fetch_row($rs3);
            


            //SELECIONA A FOTO COM BASE NO ID

            for($i = 0; $i <= $row1[0]; $i++)
            {
                if ($i >= 1){

                
                ?>
                <div class="feed">
                <div class="head">
                  <div class="user">
                    <div class="profile-photo">
                      <img s<?php
          
                        $this->showpes_miniImage($id);
              ?>  alt="foto-do-feed-1">
              
               </div>
               <h3 style = "float: left;"> <?php
                    $this->showpes_name($id);
          ?> </h3>
               </div>
               <br>
                <div class="info">
                <?php            //PEGAR O NOME NO BANCO DE DADOS COM BASE NO ID

                $sql = "SELECT descricao FROM post WHERE id_perfil= '$id' AND contador = '$row1[0]' - '$i' +1  ORDER BY contador DESC";

                //QUERY

                $rs = mysqli_query($con,$sql) or die ("fala".mysqli_error($con));

                //MOSTRAR O NOME NA TELA ENQUANTO ESTIVER RODANDO O CODIGO

                while($row = mysqli_fetch_array($rs))
                {      
                print $row['descricao'];              
                }     ?>
               
                   
                </div>
              <?php
             
                $sql2 = "SELECT imagem FROM post WHERE id_perfil= '$id' AND contador ='$row1[0]' - '$i' +1  ORDER BY contador DESC";

                //QUERY
    
                $rs2 = mysqli_query($con,$sql2) or die ("fala".mysqli_error($con));
               
                //MOSTRA A IMAGEM ENQUANTO ESTA NA TELA
                ?>
                <div class="photo">
                <?php   while ($row = mysqli_fetch_array($rs2))
                {
                    ?>
                   
                     <?php echo '<img src ="data:image;base64,'.base64_encode($row['imagem']).'"alt="foto-do-feed-1" 
                        style = "width: 700px; height: 510px;"
                        >'?>
                   
                    <?php

                    }?> 
                </div>

                <small>
                <?php            //PEGAR O NOME NO BANCO DE DADOS COM BASE NO ID

                $sql = "SELECT locals FROM post WHERE id_perfil= '$id' AND contador ='$row1[0]' - '$i' +1  ORDER BY contador DESC";

                //QUERY

                $rs = mysqli_query($con,$sql) or die ("fala".mysqli_error($con));

                //MOSTRAR O NOME NA TELA ENQUANTO ESTIVER RODANDO O CODIGO

                while($row = mysqli_fetch_array($rs))
                {      
                print $row['locals'];              
                }     ?></small>
                </div>
                
               
            </div>
           
            
                <?php
                

            }
            }
           

            return $row;
           

            
        }



        function getInformation($info,$table)
        {
            $con = $this->connect();

            $sql = "SELECT $info FROM $table WHERE id_dados_de_usuario = '$this->ids'";
            $rs = mysqli_query($con,$sql);
         

            $ar = mysqli_fetch_array($rs);


            if(!empty($ar[$info]))
            {
                
                print_r($ar[$info]);
                
            } else {
                print_r($info.":");
                
            }
            
        }
        //-------------------------------------------------------- SISTEMA DE SEGUIDORES ---------------------------------------------------------------------

        function follow($follow)
        {
            if($follow == true)
            {
              
                $con = $this->connect();
                $sql2 = "SELECT * FROM amigos WHERE id_perfil = '$this->ids' AND id_amigo = '$this->pesids'";
                $rs2 = $rs = mysqli_query($con,$sql2) or die(mysqli_error());
                $ar = mysqli_fetch_array($rs);
                print_r($ar['ID_AMIGO']);
                

                if($ar['ID_AMIGO'] != $this->pesids){
                    $perfil = $this->ids;
                $amigoper = $this->pesids;
                $sql = "INSERT INTO amigos(id_perfil,id_amigo) VALUES ('$perfil','$amigoper')";
                $rs = mysqli_query($con,$sql) or die(mysqli_error());
                echo("VOCÊ AGORA ESTÁ SEGUINDO ");
                echo($this->showpes_name($this->pesids));
                }else {
            echo ("VOCÊ JÁ ESTÁ SEGUINDO ");
            echo ($this->showpes_name($this->pesids));
            }
                
            }
        }

        //VERIFICAR SE JÁ ESTÁ SEGUINDO

        function checkfollow()
        {
            $con = $this->connect();
            $sql2 = "SELECT * FROM amigos WHERE id_perfil = '$this->ids' AND id_amigo ='$this->pesids'";
            $rs2 = $rs = mysqli_query($con,$sql2) or die(mysqli_error());
            $ar = mysqli_fetch_array($rs);

            if($ar['ID_AMIGO'] == $this->pesids)
            {
                echo 'checked="checked"';
            }
        }

        //-----------------------------------------------BIO-------------------------------------------------------------------------------

        function showbio()
        {

            //CONEXAO

            $con = $this->connect();

            //PEGAR O NOME NO BANCO DE DADOS COM BASE NO ID

            $sql = "SELECT bio FROM dados_de_usuario WHERE id_dados_de_usuario = '$this->ids'";

            //QUERY

            $rs = mysqli_query($con,$sql) or die ("fala".mysqli_error($con));

            //MOSTRAR O NOME NA TELA ENQUANTO ESTIVER RODANDO O CODIGO

            while($row = mysqli_fetch_array($rs))
            {      
            print $row['bio'];              
            }     
        }

        // MOSTRAR A BIO

        function showpesbio()
        {

            //CONEXAO

            $con = $this->connect();

            //PEGAR O NOME NO BANCO DE DADOS COM BASE NO ID

            $sql = "SELECT bio FROM dados_de_usuario WHERE id_dados_de_usuario = '$this->pesids'";

            //QUERY

            $rs = mysqli_query($con,$sql) or die ("fala".mysqli_error($con));

            //MOSTRAR O NOME NA TELA ENQUANTO ESTIVER RODANDO O CODIGO

            while($row = mysqli_fetch_array($rs))
            {      
            print $row['bio'];              
            }     
        }

        // mostrar quantidade de seguidores

        function showfollowers()
        {

            //CONEXAO

            $con = $this->connect();

            //PEGAR O NOME NO BANCO DE DADOS COM BASE NO ID

            $sql = "SELECT COUNT(*) FROM amigos WHERE id_perfil = '$this->ids'";

            //QUERY

            $rs = mysqli_query($con,$sql) or die ("fala".mysqli_error($con));

            //MOSTRAR O NOME NA TELA ENQUANTO ESTIVER RODANDO O CODIGO

            while($row = mysqli_fetch_row($rs))
            {      
            print $row[0];              
            }     
        }
        function showpesfollowers()
        {

            //CONEXAO

            $con = $this->connect();

            //PEGAR O NOME NO BANCO DE DADOS COM BASE NO ID

            $sql = "SELECT COUNT(*) FROM amigos WHERE id_amigo = '$this->pesids'";

            //QUERY

            $rs = mysqli_query($con,$sql) or die ("fala".mysqli_error($con));

            //MOSTRAR O NOME NA TELA ENQUANTO ESTIVER RODANDO O CODIGO

            while($row = mysqli_fetch_row($rs))
            {      
            print $row[0];              
            }     
        }

        //--------------------------------------- FEED PRINCIPAL ----------------------------------------------------------------------------------------

        function get_feedposts($id)
        {
            //CONEXÃO

            $con = $this->connect();

            //SELECIONAR OS POSTS FEITOS PELO USUARIO

            $sql = "SELECT id_amigo FROM amigos WHERE id_perfil ='$this->ids'  ";

            //QUERY

            $rs = mysqli_query($con,$sql) or die ("fala".mysqli_error($con));

            $this->feedPost = mysqli_fetch_array($rs);

            return $this->feedPost;
        }

        function show_feedposts($sessao)
        {
           
            $con = $this->connect();

            //SELECIONA O ID DOS AMIGOS
          
           $sql = "SELECT id_amigo from amigos WHERE id_perfil = '$this->ids' ORDER BY id_amigo ASC ";
           $rs = mysqli_query($con,$sql) or die(mysqli_error($con));
           $ar = mysqli_fetch_all($rs);
           //print_r($ar);
           //echo '<br>';
           

           //CONTAR QUANTIDADE DE AMIGOS

           $sql2 = "SELECT COUNT(id_amigo) FROM amigos WHERE id_perfil = '$this->ids'";
           $rs2 = mysqli_query($con,$sql2) or die(mysqli_error($con));
           $ar2 = mysqli_fetch_row($rs2);
           //print_r("ar2:".$ar2[0]);
           //echo '<br>';

           //LAÇO QUE SELECIONA 1 AMIGO E MOSTRA TODAS AS POSTAGENS DELE

           for($a =1;$a <= $ar2[0];$a++)
           {
               
                
                //SELECIONA O AMIGO

               $sql3 = "SELECT id_amigo from amigos WHERE id_perfil = '$this->ids' AND id_amigo = $a";
               $rs3 = mysqli_query($con,$sql3) or die(mysqli_error($con));
               $ar3 = mysqli_fetch_row($rs3);
               
               
               //CONTAR QUANTIDADE DE POSTS DO AMIGO

               $sql4 = "SELECT COUNT(id_post) FROM post WHERE id_perfil = '$ar3[0]'";
               $rs4 = mysqli_query($con,$sql4) or die(mysqli_error($con));
               $ar4 = mysqli_fetch_row($rs4);
              
               /*
               //INFORMAÇÕES PARA CASO BUGAR TUDO
               print_r("a:".$a);
               echo '<br>';
               print_r("id do amigo :".$ar3[0]);
               echo '<br>';
               print_r("quantidade de postagens:".$ar4[0]);
               echo '<br>';
               */

               if($a >= 1){
                for($i =0 ; $i <= $ar4[0]; $i++)
                {
                    if ($i >= 1){
    
                    
                        ?>
                        <div class="feed">
                        <div class="head">
                          <div class="user">
                            <div class="profile-photo">
                              <img s<?php
                  
                                $this->show_miniImage($ar3[0]);
                                
                      ?>  alt="foto-do-feed-1">
                      
                       </div>
                       <h3 style = "float: left;"> <?php
                       
                            $this->show_name($ar3[0]);
                           
                  ?> </h3>
                       </div>
                       <br>
                        <div class="info">
                        <?php            //PEGAR O NOME NO BANCO DE DADOS COM BASE NO ID
        
                        $sql = "SELECT descricao FROM post WHERE id_perfil= '$ar3[0]' AND contador = '$ar4[0]' - '$i' +1  ORDER BY contador DESC";
        
                        //QUERY
        
                        $rs = mysqli_query($con,$sql) or die ("fala".mysqli_error($con));
        
                        //MOSTRAR O NOME NA TELA ENQUANTO ESTIVER RODANDO O CODIGO
        
                        while($row = mysqli_fetch_array($rs))
                        {      
                        print $row['descricao'];              
                        }     ?>
                       
                           
                        </div>
                      <?php
                     
                        $sql2 = "SELECT imagem FROM post WHERE id_perfil= '$ar3[0]' AND contador ='$ar4[0]' - '$i' +1  ORDER BY contador DESC";
        
                        //QUERY
            
                        $rs2 = mysqli_query($con,$sql2) or die ("fala".mysqli_error($con));
                       
                        //MOSTRA A IMAGEM ENQUANTO ESTA NA TELA
                        ?>
                        <div class="photo">
                        <?php   while ($row = mysqli_fetch_array($rs2))
                        {
                            ?>
                           
                             <?php echo '<img src ="data:image;base64,'.base64_encode($row['imagem']).'"alt="foto-do-feed-1" 
                                style = "width: 700px; height: 510px;"
                                >'?>
                           
                            <?php
        
                            }?> 
                        </div>
        
                        <small>
                        <?php            //PEGAR O NOME NO BANCO DE DADOS COM BASE NO ID
        
                        $sql = "SELECT locals FROM post WHERE id_perfil= '$ar3[0]' AND contador ='$ar4[0]' - '$i' +1  ORDER BY contador DESC";
        
                        //QUERY
        
                        $rs = mysqli_query($con,$sql) or die ("fala".mysqli_error($con));
        
                        //MOSTRAR O NOME NA TELA ENQUANTO ESTIVER RODANDO O CODIGO
        
                        while($row = mysqli_fetch_array($rs))
                        {      
                        print $row['locals'];              
                        }     ?></small>
                        </div>
                        
                       
                    </div>
                   
                    
                        <?php
                        
        
                    }
                    }
                   
               }
            }
           

             
        }  
    }
           
                
            

                
?>
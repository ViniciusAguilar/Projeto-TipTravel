<?php

//CLASSE PARA O UPLOAD DE IMAGENS

    class upload 
    {

        function upload()
        {
            //CONEXÃO COM O BANCO DE DADOS

            require('./connection.php');
            $con = new conexao;
            $conn = $con->conexao();

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
        
                $qi = "UPDATE perfil SET foto ='$conteudo'";
                mysqli_query($conn,$qi) or die ("Falha ao inserir, tente novamente.");
                echo "Registrado com sucesso.";
                header('location: imagens.php');
                if(mysql_affected_rows($conn)>0)
                    print "A  imagem foi salva na base de dados";
                else
                    print "Não foi possivel salvar imagem na base de dados";
            }else
                print "Falha ao carregar imagem.";
        }
    }

//CRIA  O OBJETO DE UPLOAD E ACESSA A FUNÇÃO UPLOAD

    $upload = new upload;
    $upload->upload();
?>
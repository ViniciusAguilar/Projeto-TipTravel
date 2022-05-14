<?php

//CLASSE DE VERIFICAÇÃO DE LOGIN

    class verificar
    {
        //CRIA A FUNÇÃO DE VERIFICAÇÃO

        function verificar()
        {
            session_start();

            //VERIFICA SE O FORMULÁRIO ESTÁ VAZIO
            if (empty($_POST["senha"])||empty($_POST["email"]))
            {
                header('Location: /AAP/html/index.html');
            } 
            else
            {
                //PEGA OS DADOS NO FORMULÁRIO
                $senha = $_POST["senha"];
                $email = $_POST["email"];
                
                // CONEXÃO COM O BANCO DE DADOS

                require('./connection.php');
                $con = new conexao;
                $conn = $con->conexao();
            
                //VERIFICA SE OS DADOS ESTÃO NO BANCO

                if(isset($senha, $email))
                {
                $sql = "SELECT senha,email,nome FROM dados_de_usuario WHERE senha = '$senha' and email = '$email'";
                $rs = mysqli_query($conn,$sql);

                // VERIFICA SE TEVE A CONEXÃO COM O BANCO E O QUERY E COLOCA AS INFORMAÇÕES NA TELA

                    if ($rs)
                    {
                        echo "Logado com sucesso<br>";
                        $row = mysqli_num_rows($rs);
                        if ($row == 1){
                            $_SESSION['usuario'] = $email;
                            header('Location: painel.php');
                        } else {
                            header('Location: /AAP/html/index.html');
                        }
                    }
                    else
                    {
                        echo "falha no login".mysqli_error();
                    }
                }
            }
        }

       
    }
//CRIA O OBJETO DE VERIFICAÇÃO E ACESSA A FUNÇÃO

    $verificar = new verificar;
    $verificar->verificar();
?>
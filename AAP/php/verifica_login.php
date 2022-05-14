<?php

//CRIA A CLASSE DE VERIFICAÇÃO SE ESTÁ LOGADO

    class login_verification 
    {
        function verification()
        {

            if(!$_SESSION['usuario'])
            {
                header('Location: /AAP/html/index.html');
            }
        }
    }

//CRIA NOVO OBJETO DE VERIFICAÇÃO E ACESSA A FUNÇÃO

    $verification = new login_verification;
    $verification->verification();

?>
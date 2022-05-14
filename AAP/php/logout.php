<?php 

//CRIA UMA CLASSE DE LOGOUT
    class logout
    {   
        //EXECUTA A FUNÇÃO DE LOGOUT
        function logout()
        {
            session_start();
            session_destroy();
            header('Location: /AAP/html/index.html');
        }
    }
    
//CRIA OBJETO DE LOGOUT E EXECUTA A FUNÇÃO DE LOGOUT

    $logout = new logout;
    $logout->logout();

?>
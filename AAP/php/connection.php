<?php

//CRIA A CLASSE DE CONEXÃO QUE SERÁ USADA EM QUASE TODAS OS OUTROS CODIGOS

    class conexao
    {
        //VARIÁVEIS QUE RECEBERÃO AS INFORMAÇÕES DO BANCO DE DADOS

        private $dbhost = "localhost";
        private $dbuser = "root";
        private $dbpassword = "1234";
        private $database = "teste";

        //FUNÇÃO DE CONEXÃO
        
        function conexao($dbhost = "localhost",$dbuser = "root",$dbpassword = "1234",$database = "teste")
        {
            $this->dbhost = $dbhost;
            $this->dbuser = $dbuser;
            $this->dbpassword = $dbpassword;
            $this->database = $database;

            $conn = mysqli_connect($dbhost,$dbuser,$dbpassword,$database );

            if(!$conn)
            {
                die("Falha na conexão".mysqli_connect_error());
            } 
            $this->CONN = $conn;

            return $this->CONN;;
        }
    }
?>

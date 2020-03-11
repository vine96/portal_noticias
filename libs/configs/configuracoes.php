<?php
    function configuracoes(){
        //define("URL", "http://localhost/portal")
        error_reporting(true);
    }

    function openConection(){
        global $mysqli;
        
        $host = "localhost";
        $user = "root";
        $pass = "";
        $data = "anaj";
    
        $mysqli = new mysqli($host, $user, $pass, $data);
        if($mysqli->connect_error){
            printf("Erro de conexão: %s", $mysqli->connect_error);
        }
    }
?>
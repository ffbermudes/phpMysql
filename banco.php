<?php
    $banco = new mysqli('localhost', 'root', '123456','bd_games');

    if($banco->connect_errno) 
    {
        echo '<h1>Encontrei um erro $banco -> errno --> $banco->connect_error </h1>';
        die();
    }
    // Configurações para caracteres utf8
    $banco->query("SET NAMES 'urf8mb4'");
    $banco->query("SET character_set_connection=utf8mb4");
    $banco->query("SET character_set_client=utf8mb4");
    $banco->query("SET character_set_results=utf8");

    $busca = $banco->query("select * from generos");

?>

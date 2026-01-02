<?php
    DEFINE('HOST', 'localhost');
    DEFINE('USER', 'root');
    DEFINE('PASSWORD', '');
    DEFINE('DB', 'gerenciador_jogos');

    $conexao = mysqli_connect(HOST, USER, PASSWORD, DB) or die('Não foi possível conectar ao banco de dados.');
?>
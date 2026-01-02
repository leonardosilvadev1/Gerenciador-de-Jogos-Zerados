<?php
    include('conexao.php');

    if(empty($_POST['nome']) || empty($_POST['data_conclusao']) || empty($_POST['plataforma']) || empty($_POST['genero']) || empty($_POST['platina'])) {
        $_SESSION['mensagem'] = "Campos não preenchidos!";
        header('Location: index.php');
        exit();
    }

    $nome = $_POST['nome'];
    $data_conclusao = $_POST['data_conclusao'];
    $plataforma = $_POST['plataforma'];
    $genero = $_POST['genero'];
    $platina = $_POST['platina'];

    $query = "INSERT INTO jogos (nome_jogo, data_conclusao, plataforma, genero, completo) VALUES ('$nome', '$data_conclusao', '$plataforma', '$genero', '$platina')";

    if(mysqli_query($conexao, $query)) {
        $_SESSION['mensagem'] = "Jogo adicionado com sucesso!";
        Header('Location: index.php');
        exit();
    } else {
        $_SESSION['mensagem'] = "Erro ao adicionar o jogo.";
        Header('Location: index.php');
        exit();
    }
?>
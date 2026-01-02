<?php
include('conexao.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM jogos WHERE id_jogo = $id";

    if (mysqli_query($conexao, $query)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Erro ao deletar o jogo.";
    }
} else {
    echo "ID do jogo não informado.";
}
?>
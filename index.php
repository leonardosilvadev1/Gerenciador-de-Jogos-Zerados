<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Jogos Zerados</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    table{
        border-radius: 10px;
        background-color: white;
        height: 70px;
        color: #0f1587;
    }
    th{
        padding: 20px;
    }

    .acoes_delete{
        background-color: #a80a0aff;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
    }

    .table{
        display: flex;
        justify-content: center;
    }
</style>
<body>
    <h1>
        Gerenciador de Jogos Zerados
    </h1>
    <div class="table">
        <table>
            <tr>
                <th>Nome do Jogo</th>
                <th>Data de Conclusão</th>
                <th>Plataforma em que zerou</th>
                <th>Gênero do Jogo</th>
                <th>Fez 100% do Jogo</th>
                <th>Ações</th>
            </tr>
            <?php
            include('conexao.php');

            $query = "SELECT id_jogo, nome_jogo, data_conclusao, plataforma, genero, completo FROM jogos";
            $result = mysqli_query($conexao, $query);

            $row = mysqli_num_rows($result);

            if ($row > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                        echo "<td style='padding: 20px;'>".$row['nome_jogo']."</td>";
                        echo "<td style='padding: 20px;'>".date("d/m/Y", strtotime($row['data_conclusao']))."</td>";
                        echo "<td style='padding: 20px;'>".$row['plataforma']."</td>";
                        echo "<td style='padding: 20px;'>".$row['genero']."</td>";
                        echo "<td style='padding: 20px;'>".$row['completo']."</td>";
                        echo "<td style='padding: 20px;'>
                                <a href='deletar.php?id=".$row['id_jogo']."' 
                                onclick=\"return confirm('Tem certeza que deseja excluir este jogo?');\">
                                    <button class='acoes_delete'>Deletar</button>
                                </a>
                            </td>";
                }
            }else {
                echo "<tr><td colspan='10'>Nenhum jogo cadastrado!</td></tr>";
            }
            ?>
        </table>
    </div>
    
    <button name="adicionar" id="adicionar">Adicionar Jogo</button>
    <dialog id="form_modal">
        <form action="config.php" method="POST">
            <label for="game-title">Nome do Jogo</label>
            <input type="text" id="nome" name="nome" required autofocus>
            <br>
            <label for="completion-date">Data de Conclusão</label>
            <input type="date" id="data" name="data_conclusao" required>
            <br>
            <label for="plataforma">Plataforma</label>
            <select name="plataforma" id="plataforma" required>
                <option selected disabled>Selecione</option>
                <option value="PlayStation">PlayStation</option>
                <option value="Xbox">Xbox</option>
                <option value="PC">PC</option>
                <option value="Nintendo">Nintendo</option>
            </select>
            <br>
            <label for="genero">Gênero</label>
            <select name="genero" id="genero" required>
                <option selected disabled>Selecione</option>
                <option value="Ação">Ação</option>
                <option value="Aventura">Aventura</option>
                <option value="RPG">RPG</option>
                <option value="Esporte">Esporte</option>
                <option value="Corrida">Corrida</option>
                <option value="Estratégia">Estratégia</option>
                <option value="FPS">FPS</option>
                <option value="Survival Horror">Survival Horror</option>
                <option value="Soulslike">Soulslike</option>
                <option value="Simulação">Simulação</option>
                <option value="Plataforma">Plataforma</option>
                <option value="Quebra-Cabeça">Quebra-Cabeça</option>
                <option value="Roguelike">Roguelike</option>
                <option value="Casual">Casual</option>
            </select>
            <br>
            <label for="platina">100% do Game</label>
            <select name="platina" id="platina" required>
                <option selected disabled>Selecione</option>
                <option value="Sim">Sim</option>
                <option value="Não">Não</option>
                <option value="Ainda não">Ainda não</option>
            </select>
            <br>
            <button class="button_modal" type="submit">Salvar</button>
            <button class="button_modal" type="button" onclick="this.closest('dialog').close()">Cancelar</button>
        </form>
    </dialog>
    <script src="script.js"></script>
</body>
</html>
<?php
// conexão com o banco de dados
require_once 'processa_filmes.php';

//instancia d classe BancoDadosPDO
$bancoPDO = new BancoDadosPDO('localhost', 'root', '', 'cinema');


//consulta para buscar todos os filmes
$sql = "SELECT * FROM filmes_tb"; // instrução SQL para consultar dados de uma tablea específica (filmes_tb)
$result = $bancoPDO->executarConsulta($sql); // executa a consulta SQL no banco de dando e armazena o resultado na variável ($result)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="main-table">
        <h2>Lista de Filmes</h2>
        <?php
//verifica se a consulta retornou resultados
if($result && $result->rowCount() > 0){
    echo "<table>";
    echo "<tr>
            <th>Título</th>
            <th>Categoria</th>
            <th>Duração</th>
            <th>Diretor</th>
            <th>Sinopse</th>
            <th>Ano</th>
            <th>Ação</th>
          </tr>";

          foreach ($result as $linha) {
            echo '<tr>';
            echo '<td>' . $linha['titulo'] . '</td>';
            echo '<td>' . $linha['categoria'] . '</td>';
            echo '<td>' . $linha['duracao'] . '</td>';
            echo '<td>' . $linha['diretor'] . '</td>';
            echo '<td class="sinopse">' . $linha['sinopse'] . '</td>';
            echo '<td>' . $linha['ano'] . '</td>';
            echo '<td class="actions">
                    <a id="editar" href="editar.php?id=' . $linha['filme_id'] . '">Editar</a>
                    <a id="excluir" href="excluir.php?id=' . $linha['filme_id'] . '" onclik="confirmarExclusao()">Excluir</a>
                  </td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "Nenhum resultado encontrado.";
    }
    
//fecha a conexão
$bancoPDO->fecharConexao();
?>
<div class="voltar"><a id="Voltar" href="index.php?">Voltar</a></div>

    </main>
    
</body>
</html>


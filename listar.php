<?php
require_once "user.php";

$result = User::listar();

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
        <h2>Lista de Usuários</h2>
        <?php
//verifica se a consulta retornou resultados
if($result && $result->rowCount() > 0){
    echo "<table>";
    echo "<tr>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Data de Nascimento</th>
            <th>Telefone</th>
            <th>CPF</th>
            <th>RG</th>
            <th>Email</th>
            <th>Ação</th>
          </tr>";

          foreach ($result as $linha) {
            echo '<tr>';
            echo '<td>' . $linha['nome'] . '</td>';
            echo '<td>' . $linha['endereco'] . '</td>';
            echo '<td>' . $linha['data_nascimento'] . '</td>';
            echo '<td>' . $linha['telefone'] . '</td>';
            echo '<td>' . $linha['cpf'] . '</td>';
            echo '<td>' . $linha['rg'] . '</td>';
            echo '<td>' . $linha['email'] . '</td>';
            echo '<td class="actions">
                    <a id="editar" href="editar.php?id=' . $linha['usuario_id'] . '">Editar</a>
                    <a id="excluir" href="excluir.php?id=' . $linha['usuario_id'] . '">Deletar</a>
                    <a id="voltar" href="index.php">Voltar</a>
                  </td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "Nenhum resultado encontrado.";
    }   
?>
    </main>
    
</body>
</html>


<?php
// Incluir o arquivo que contém a classe 'BancoDadosPDO' e outras configurações
require_once 'processa_filmes.php';

// instância da classe BancoDadosPDO para se conectar ao banco de dados
$bancoPDO = new BancoDadosPDO('localhost', 'root', '', 'cinema');

$id = $_GET['id']; // recebe o ID do filme a ser editado a partir do parâmetro GET

// Consulta para buscar os dados do filme pelo ID
$sql = "SELECT * FROM filmes_tb WHERE filme_id = :filme_id";
$stmt = $bancoPDO->prepare($sql);
$stmt->bindParam(':filme_id', $id, PDO::PARAM_INT);
$stmt->execute();
$filme = $stmt->fetch(PDO::FETCH_ASSOC);

// Verifica se o filme foi encontrado
if (!$filme) {
    echo "Filme não encontrado!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Filme</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="main-cadastro">
        <h2>Editar Filme</h2>
        <form action="update.php" method="POST">
            <!-- Campo oculto para armazenar o ID do filme -->
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($filme['filme_id']); ?>">
            <!-- Campo de entrada para o título do filme, preenchido com o valor atual -->
             <!-- A utilização do PHP é para preencher o valor do campo id com o identificador (filme_id) do filme que está sendo editado e garante que o formulário envie o ID correto do filme quando for submetido para atualização. -->
            <div>
                <label for="titulo">Título</label>
                <input type="text" name="titulo" id="titulo" value="<?php echo htmlspecialchars($filme['titulo']); ?>" required>
            </div>
            <!-- Campo de entrada para a categoria do filme, preenchido com o valor atual -->
            <div>
                <label for="categoria">Categoria</label>
                <input type="text" name="categoria" id="categoria" value="<?php echo htmlspecialchars($filme['categoria']); ?>" required>
            </div>
            <!-- Campo de entrada para a duração do filme, preenchido com o valor atual -->
            <div>
                <label for="duracao">Duração</label>
                <input type="text" name="duracao" id="duracao" value="<?php echo htmlspecialchars($filme['duracao']); ?>" required>
            </div>
            <!-- Campo de entrada para o diretor do filme, preenchido com o valor atual -->
            <div>
                <label for="diretor">Diretor</label>
                <input type="text" name="diretor" id="diretor" value="<?php echo htmlspecialchars($filme['diretor']); ?>" required>
            </div>
            <!-- Campo de entrada para a sinopse do filme, preenchido com o valor atual -->
            <div>
                <label for="sinopse">Sinopse</label>
                <textarea name="sinopse" id="sinopse" rows="4" required><?php echo htmlspecialchars($filme['sinopse']); ?></textarea>
            </div>
            <!-- Campo de entrada para o ano do filme, preenchido com o valor atual -->
            <div>
                <label for="ano">Ano</label>
                <input type="number" name="ano" id="ano" value="<?php echo htmlspecialchars($filme['ano']); ?>" required>
            </div>
            <!-- Botão para submeter o formulário e salvar as alterações -->
            <input type="submit" value="Salvar">
        </form>
    </main>
</body>
</html>

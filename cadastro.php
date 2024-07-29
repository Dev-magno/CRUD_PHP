<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Filmes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="main-cadastro">
        <h2>Adicionar Filme</h2>
        <form action="insert.php" method="POST">
            <div>
                <label for="titulo">Título</label>
                <input type="text" name="titulo" id="titulo" required>
            </div>

            <div>
                <label for="categoria">Categoria</label>
                <input type="text" name="categoria" id="categoria" required>
            </div>

            <div>
                <label for="duracao">Duração</label>
                <input type="text" name="duracao" id="duracao" required>
            </div>

            <div>
                <label for="diretor">Diretor</label>
                <input type="text" name="diretor" id="diretor" required>
            </div>

            <div>
                <label for="sinopse">Sinopse</label>
                <textarea name="sinopse" id="sinopse" rows="4" width="700px" required></textarea>
            </div>

            <div>
                <label for="ano">Ano</label>
                <input type="number" name="ano" id="ano" required>
            </div>

            <input type="submit" value="Adicionar">
        </form>
    </main>
</body>
</html>

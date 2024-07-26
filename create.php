<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adiconar filmes</title>
</head>
<body>
    <main>
        <h2>Adiconar Filmes</h2>
        <form action="" method="POST">
            <div>
                <label for="">Título</label>
                <input type="text" name="titulo" require>
            </div>

            <div>
                <label for="">Categoria</label>
                <input type="text" name="categoria" id="categoria" require>
            </div>

            <div>
                <label for="">Duração</label>
                <input type="text" name="duracao" id="duracao" require>
            </div>

            <div>
                <label for="">Diretor</label>
                <input type="text" name="diretor" id="diretor" require>
            </div>

            <div>
                <label for="">Sinopse</label>
                <input type="text" name="sinopse" id="sinopse" require>
            </div>

            <div>
                <label for="">Ano</label>
                <input type="number" name="ano" id="ano" require>
            </div>
            <input type="submit" value="Adiconar">

        </form>
    </main>
</body>
</html>
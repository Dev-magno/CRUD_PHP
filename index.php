<?php
require_once "conexao.php";
require_once "user.php";

$result = new User();
$res = $result->criar();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD usuario</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="main-cadastro">
        <h2>Cadastrar Usuáiro</h2>
        <form action="insert.php" method="POST">
            <div>
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" required>
            </div>

            <div>
                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" id="endereco" required>
            </div>

            <div>
                <label for="data_nascimento">Dada de Nascimento</label>
                <input type="date" name="data_nascimento" id="data_nascimento" required>
            </div>

            <div>
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" id="telefone" required>
            </div>

            <div>
                <label for="cpf">CPF</label>
                <input type="text" name="cpf" id="cpf" required></input>
            </div>

            <div>
                <label for="rg">RG</label>
                <input type="text" name="rg" id="rg" required>
            </div>

            <div>
                <label for="email">Email</label>
                <input type="text" name="email" id="email" required>
            </div>

            <div>
                <label for="senha">Senha</label>
                <input type="text" name="senha" id="senha" required>
            </div>

            <div>
                <label for="senha">Confirmar Senha</label>
                <input type="text" name="senha" id="senha" required>
            </div>

            <input type="submit" value="Adicionar">
        </form>
    </main>
</body>
</html>

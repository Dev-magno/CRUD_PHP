<?php
//Conexão com o banco
require_once "conexao.php";

//Classe User
require_once "user.php";

$id = $_GET['id']; // recebe o ID a ser editado a partir do parâmetro GET

$user = new User($id);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="main-cadastro">
        <h2>Editar Usuário</h2>
        <form action="edit_controler.php" method="POST">
            <!-- Campo oculto para armazenar o ID do filme -->
            <input type="hidden" name="usuario_id" value="<?= $user->getUsuarioId();?>">
           
            <div>
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" value="<?= $user->getNome();?>" required>
            </div>
            <!-- Campo de entrada para a categoria do filme, preenchido com o valor atual -->
            <div>
                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" id="endereco" value="<?= $user->getEndereco();?>" required>
            </div>
            <!-- Campo de entrada para a duração do filme, preenchido com o valor atual -->
            <div>
                <label for="data_nasmento">Data de Nascimento</label>
                <input type="text" name="data_nascimento" id="data_nascimento" value="<?= $user->getDataNascimento();?>" required>
            </div>
            <!-- Campo de entrada para o diretor do filme, preenchido com o valor atual -->
            <div>
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" id="telefone" value="<?= $user->getTelefone();?>" required>
            </div>
            <!-- Campo de entrada para a sinopse do filme, preenchido com o valor atual -->
            <div>
                <label for="cpf">CPF</label>
                <input type="text" name="cpf" id="cpf" required><?= $user->getCpf();?></input>
            </div>
            <!-- Campo de entrada para o ano do filme, preenchido com o valor atual -->
            <div>
                <label for="rg">RG</label>
                <input type="text" name="rg" id="rg" value="<?= $user->getRg();?>" required>
            </div>

            <div>
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="<?= $user->getEmail();?>" required>
            </div>

            <div>
                <label for="senha">Senha</label>
                <input type="text" name="senha" id="senha" value="<?= $user->getSenha();?>" required>
            </div>

            <div>
                <label for="senha">Confirmar Senha</label>
                <input type="text" name="senha" id="senha" value="<?= $user->getSenha();?>" required>
            </div>
            <!-- Botão para submeter o formulário e salvar as alterações -->
            <input type="submit" value="Salvar">
        </form>
    </main>
</body>
</html>

<?php
// conexão com o banco de dados
require_once 'user.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {// verifica se o método de requisição HTTP usado para acessar a página é POST
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $data_nascimento = $_POST['data_nascimento'];
    $telefone = $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $user = new User();
    $user->setNome($nome);
    $user->setEndereco($endereco);
    $user->setDataNascimento($data_nascimento);
    $user->setTelefone($telefone);
    $user->setCpf($cpf);
    $user->setRg($rg);
    $user->setEmail($email);
    $user->setSenha($senha);
    $user->criar();

    header("Location: login.php");
    exit();
}
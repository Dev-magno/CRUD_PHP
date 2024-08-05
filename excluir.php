<?php
require_once "conexao.php"; //Conexão com  banco
require_once "user.php"; //Chama a classe User

$id = $_POST['id'];

$user = new User($id); //Instancia um novo usuario e chamando o construtor

$user->deletar();//Acessa o método deletar

header('location: index.php');
exit();
?>



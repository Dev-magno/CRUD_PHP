<?php
// Incluir o arquivo que contém a classe 'BancoDadosPDO' e outras configurações
require_once 'processa_filmes.php';

// Cria uma nova instância do banco de dados
$bancoPDO = new BancoDadosPDO('localhost', 'root', '', 'cinema');
$id = $_GET['id'];


    // Consulta para excluir o filme pelo ID
    $sql = "DELETE FROM filmes_tb WHERE filme_id = :filme_id";
    $stmt = $bancoPDO->prepare($sql);
    $stmt->bindParam(':filme_id', $id, PDO::PARAM_INT);
    $result = $stmt->execute(); // Executa a consulta

    // Verifica se a exclusão foi bem-sucedida
    if ($result) {
        // Redireciona para a página de listagem após a exclusão
        header("Location: listar.php"); // Redireciona para a página de listagem
        exit; // Encerra o script
    } else {
        echo "Falha ao excluir o filme.";
    }
?>



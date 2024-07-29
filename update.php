<?php
// Incluir o arquivo que contém a classe 'BancoDadosPDO' e outras configurações
require_once 'processa_filmes.php';

// instância da classe BancoDadosPDO para se conectar ao banco de dados
$bancoPDO = new BancoDadosPDO('localhost', 'root', '', 'cinema');

// Verificar se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verificar se todos os campos esperados estão presentes na requisição POST
    // uso a função isset() para evitar erros ao acessar variáveis não definidas
    //se uma variavel for definida como null retorna false; se as variaveis estiverem definidas e não null retorna true.
    if (isset($_POST['id'], $_POST['titulo'], $_POST['categoria'], $_POST['duracao'], $_POST['diretor'], $_POST['sinopse'], $_POST['ano'])) {
        // Obter os valores dos campos do formulário
        $id = $_POST['id']; // Converter o valor do ID para inteiro
        $titulo = $_POST['titulo'];
        $categoria = $_POST['categoria'];
        $duracao = $_POST['duracao'];
        $diretor = $_POST['diretor'];
        $sinopse = $_POST['sinopse'];
        $ano = $_POST['ano']; // Converter o valor do ano para inteiro
        //Cada uma dessas linhas está acessando um valor enviado pelo formulário HTML via método POST.
        //O usuário preenche um formulário HTML com os campos titulo, categoria, duracao, diretor, sinopse e ano
        //Quando o formulário é submetido, os dados são enviados para o servidor via método POST.
        //o PHP verifica se a requisição foi feita com método POST. Se for os valores dos campos são acessados usando a superglobal '$_POST'.

        try {
            // Preparar a consulta SQL para atualizar os dados do filme
            $sql = "UPDATE filmes_tb SET 
                    titulo = :titulo,
                    categoria = :categoria,
                    duracao = :duracao,
                    diretor = :diretor,
                    sinopse = :sinopse,
                    ano = :ano
                    WHERE filme_id = :id";
            $stmt = $bancoPDO->prepare($sql);

            // O objeto PDO permite que você prepare e execute instruções SQL de forma segura e prepara para interagir com o banco de dados
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':categoria', $categoria);
            $stmt->bindParam(':duracao', $duracao);
            $stmt->bindParam(':diretor', $diretor);
            $stmt->bindParam(':sinopse', $sinopse);
            $stmt->bindParam(':ano', $ano);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            // O método bindParam vincula variáveis PHP a parâmetros em uma instrução SQL preparada com PDO. Evita SQL injection

            // Executar a consulta SQL para atualizar os dados do filme
            $stmt->execute();

            // Exibir uma mensagem de sucesso
            echo "Filme atualizado com sucesso!";
        } catch (Exception $e) {
            // Exibir uma mensagem de erro se ocorrer uma exceção durante a atualização
            echo "Erro ao atualizar o filme: " . $e->getMessage();
        }
    } else {
        // Exibir uma mensagem de erro se algum campo estiver ausente
        echo "Por favor, preencha todos os campos.";
    }
} else {
    // Exibir uma mensagem de erro se o método de requisição não for POST
    echo "Método de requisição inválido.";
}

// redireciona para a página index.php após inserção bem-sucedida
header("Location: listar.php");

// Fecha a conexão
$bancoPDO->fecharConexao();
?>


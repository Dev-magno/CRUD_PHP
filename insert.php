<?php
// conexão com o banco de dados
require_once 'processa_filmes.php';

//instancia d classe BancoDadosPDO
$bancoPDO = new BancoDadosPDO('localhost', 'root', '', 'cinema');

if($_SERVER['REQUEST_METHOD'] === 'POST') {// verifica se o método de requisição HTTP usado para acessar a página é POST
    $titulo = $_POST['titulo'];
    $categoria = $_POST['categoria'];
    $duracao = $_POST['duracao'];
    $diretor = $_POST['diretor'];
    $sinopse = $_POST['sinopse'];
    $ano = $_POST['ano'];
    //Cada uma dessas linhas está acessando um valor enviado pelo formulário HTML via método POST.
    //O usuário preenche um formulário HTML com os campos titulo, categoria, duracao, diretor, sinopse e ano
    //Quando o formulário é submetido, os dados são enviados para o servidor via método POST.
    //o PHP verifica se a requisição foi feita com método POST. Se for os valores dos campos são acessados usando a superglobal '$_POST'.
}

//instrução SQL para inserir o filme no banco de dados
$sql = "INSERT INTO filmes_tb(titulo, categoria, duracao, diretor, sinopse, ano) VALUES (:titulo, :categoria, :duracao, :diretor, :sinopse, :ano)"; // os parâmetros nomeados (:titulo, :categoria, :duracao, :diretor, :sinopse, :ano) ajudam a evitar ataques de injeção SQL e torna o código mais legível. Ao invés de inserir os valores diretamente na consulta SQL, uso esses placeholders.

//O objeto PDO permite que você prepare e execute instruções SQL de forma segura e prepara para interagir com o banco de dados
$stmt = $bancoPDO->prepare($sql);
$stmt->bindParam(':titulo', $titulo);
$stmt->bindParam(':categoria', $categoria);
$stmt->bindParam(':duracao', $duracao);
$stmt->bindParam(':diretor', $diretor);
$stmt->bindParam(':sinopse', $sinopse);
$stmt->bindParam(':ano', $ano);
// O método bindParam vincula variáveis PHP a parâmetros em uma instrução SQL preparada com PDO

//Esta linha tenta executar a instrução SQL preparada anteriormente usando o método execute() do objeto $stm (um objeto PDOStatement).
if($stmt->execute()) {
    echo "Filme inserido com sucesso!"; //Se execute() retornar true, ou seja, se a inserção no banco de dados for bem-sucedida, exibe a mensagem
    
}else {
    echo "Erro ao inserir o filme.";// se execute() retornar false, exibe a mensagem
}
// redireciona para a página index.php após inserção bem-sucedida
header("Location: index.php");
//fecha a conexão
$bancoPDO->fecharConexao();
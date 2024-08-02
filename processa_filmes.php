<?php
// classe BancoDadosPDO - o PDO (PHP Data Objects) é mais robusta, ajuda evitar ataques de injeção SQL, é compatível com vários sistemas de gerencimaneto de banco de dados e facilita a integraçao com paradgmas orientados a objetos do PHP.
class BancoDadosPDO{
    private $conn; // atributo que armazena a instância da conexão

    //método construtor com os parâmetros, configura a conexão com o banco de dados usando as informações passadas.
    public function __construct($host, $user, $password, $dbname){
        //busca a conexão e captura qualquer exceção (PDOException) que possa ocorrer, exibindo uma mensagem de erro.
        try{
            // cria uma string de conexão DSN (Data Source Name) para o PDO
            $dsn = "mysql:host=$host; dbname=$dbname"; 
            $this->conn = new PDO($dsn, $user, $password); // cria uma nova instância da classe PDO, estabelecendo uma conexão com o banco de dados.
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//configura o comportamento do objeto PDO em relação ao tratamento de erros.
        }catch (PDOException $e){//captura a exceção do tipo PDOException se ocorrer algum erro no bloco try
            die("Erro na conexão: " . $e->getMessage());// termina a execução do script (die()) e exibe uma mensagem personalizada e retora a mensagem de erro da exceção ($e->getMessage()). 
        }
    }

    //método público que aceita uma string SQL como argumento e executa uma consulta no banco de dados
    public function executarConsulta($sql) {
        return $this->conn->query($sql); //Executa a consulta SQL usando o método query do objeto PDO armazenado em $this->conn e retorna o resultado da consulta.
    }

    //método prepare() que é necessário para preparar a instrução SQL antes de executa
    public function prepare($sql) {
        return $this->conn->prepare($sql);
    }

    //método público para fechara a conexão
    public function fecharConexao() {
        $this->conn = null; //fecha a conexão com o banco de dados.
    }
    
}

//instanciando a classe BancoDadosPDO
$bancoPDO = new BancoDadosPDO('localhost', 'root', '', 'cinema');

//fecha a conexão
//$bancoPDO->fecharConexao()
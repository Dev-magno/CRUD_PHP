<?php
//Uso conexão aqui e não preciso usar em outros aquivos
require_once 'conexao.php';

Class User {
    private $usuario_id;
    private $nome;
    private $endereco;
    private $data_nascimento;
    private $telefone;
    private $cpf;
    private $rg;
    private $email;
    protected $senha;

    //Contrutor com o parmâmento $id inicializado em false.
    public function __construct($id = false) {
        //Verifica se há o ecebimento de id. SE true troca o id atual pelo que está recendo
        if($id){
            $this->usuario_id = $id;//Se chamar um new user e não passar o id, não acontece nada. Se passar, o objeto é inicializado
            $this->carregar(); //Quando o id for passado ao msmo que atribui um id para o objeto vai fazer um carregar. Usa o id para carregar o restante das informações
        }
    }

     // Settesr responsável por modificar o valor do nome
     public function setNome($nome) {
        return $this->nome = $nome;
    }

    public function setEndereco($endereco) {
        return $this->endereco = $endereco;
    }

    public function setDataNascimento($data_nascimento) {
        return $this->data_nascimento = $data_nascimento;
    }

    public function setTelefone($telefone) {
        return $this->telefone = $telefone;
    }

    public function setCpf($cpf) {
        return  $this->cpf = $cpf;
    }

    public function setRg($rg) {
        return $this->rg = $rg;
    }
    public function setEmail($email) {
        return  $this->email = $email;
    }

   // Utilizando hash para a senha
   public function setSenha($senha) {
    $this->senha = password_hash($senha, PASSWORD_DEFAULT);
    } 
    // Getters para retornar o nome do objeto
    public function getUsuarioId() {
        return $this->usuario_id;
    }
   public function getNome() {
        return $this->nome;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function getDataNascimento() {
        return $this->data_nascimento;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getRg() {
        return $this->rg;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }

    //Método para criar usuário
    public  function criar() {
        try {
            $conexao = Conexao::conectar();
            $sql = "INSERT INTO usuario_tb (nome, endereco, data_nascimento, telefone, cpf, rg, email, senha) VALUES (:nome, :endereco, :data_nascimento, :telefone, :cpf, :rg, :email, :senha)";
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':nome', $this->getNome());
            $stmt->bindValue(':endereco', $this->getEndereco());
            $stmt->bindValue(':data_nascimento', $this->getDataNascimento());
            $stmt->bindValue(':telefone', $this->getTelefone());
            $stmt->bindValue(':cpf', $this->getCpf());
            $stmt->bindValue(':rg', $this->getRg());
            $stmt->bindValue(':email', $this->getEmail());
            $stmt->bindValue(':senha', $this->getSenha());
            $stmt->execute();
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

     //Método carregar
     public function carregar() {
        $conexao = Conexao::conectar();
        $sql = "SELECT * FROM usuario_tb WHERE usuario_id = :id";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue('id', getUsuarioId());
        $stmt->execute();
        $resutado = $stmt->fetch();

        $this->setNome($resultado['nome']);
        $this->setEndereco($resultado['endereco']);
        $this->setDataNascimento($resultado['data_nascimento']);
        $this->setTelefone($resutado['telefone']);
        $this->setCpf($resultado['cpf']);
        $this->setRg($resultado['rg']);
        $this->setEmail($resultado['email']);
        $this->setSenha($senha, $resultado['senha']);
    }

    //Método para listar usuário
    public static function listar() {
        //Tratamento de erro
        try {
            $conexao = Conexao::conectar();
            $sql = "SELECT * FROM usuario_tb";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    //Método atualizar
    public function atualizar() {
        try {
            $conexao = Conexao::conectar();
            $sql = 'UPDATE usuario_tb SET :nome, :endereco, :data_nascimento, :telefone, :cpf, :rg, :email, :senha WHERE usuario_id = :id';
            $stmt = $conexao->prepare($sql);
            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':nome', $this->getNome());
            $stmt->bindValue(':endereco', $this->getEndereco());
            $stmt->bindValue(':data_nascimento', $this->getDataNascimento());
            $stmt->bindValue(':telefone', $this->getTelefone());
            $stmt->bindValue(':cpf', $this->getCpf());
            $stmt->bindValue(':rg', $this->getRg());
            $stmt->bindValue(':email', $this->getEmail());
            $stmt->bindValue(':senha', $this->getSenha());
            $stmt->bindValue(':id', $this->getUsuarioId());
            $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function deletar() {
        try {
            //conexão com o banco
            $conexao = Conexao::conectar();
            $sql = "DELETE FROM usuario_tb WHERE usuario_id = :id";
            $stmt = $conexao->prepare($sql);
            $stmt->bidValue(':id', $this->getUsuarioId());
            $stmt->execute();
        } catch (PDOException $te) {
            echo $e->getMessage();
        }
    }
}
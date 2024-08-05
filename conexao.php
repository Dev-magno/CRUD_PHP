<?php

require_once "config.php";

class Conexao{

    //método construtor para conexão
    public static function conectar(){
        try{
            $conn = new PDO(DRIVE . ":host=" . LOCAL_DO_BANCO . ";dbname=" . NOME_DO_BANCO . ";charset" . CHARSET, USUARIO, SENHA); 
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }catch (PDOException $e){
            die("Erro na conexão: " . $e->getMessage());// termina a execução do script (die()) e exibe uma mensagem personalizada e retora a mensagem de erro da exceção ($e->getMessage()). 
        }
    }
    
}


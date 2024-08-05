<?php
//Iniciar Sessão
session_start();

require_once "conexao.php";
require_once "user.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <link rel="stylesheet" href="style/styles.css">
</head>
<body>
    <section class="card-detalhes">
        <div class="form-detalhes">
            <h2>Seja Bem Vindo!</h2>
            <p>Troque, descubra e compatilhe livros com leitores apaixonados como você. Faça login para começar sua jornada literária!</p>
        </div>
        <div class="form-box">
            <div class="card-form">
                <h2>Login</h2>
                <form action="login.php">
                    <input type="hidden" name="id" value="<?= $user['usuario_id']?>">
                    <div class="container">
                        <label for="cpf">CPF:</label>
                        <input type="text" name="cpf" placeholder="Digite seu email" required arial-required="true" id="cpf">
                    </div>
        
                    <div class="container">
                        <label for="senha">Senha:</label>
                        <input type="password" name="senha" placeholder="Digite sua senha" required arial-required="true" id="senha">

                    <div class="nav-login">
                        <a href="#" class="link">Recuperar senha?</a>  
                    </div> 
                    </div>
                    
                    
                    <div class="btn">
                        <button type="submit">Entrar</button>

                        <div>
                            <p>Não Tem Uma Conta? <a href="#">Inscrever-se</a></p>
                        </div>
                        <div>
                            <p class="signup">Ou inscreva-se usando</p>
                        </div>

                    </div> 
                        <div class="redes">
                            <a href="#"><img src="img/google.png" width="30px" alt=""></a>
                            <a href="#"><img src="img/facebook.png" width="30px" alt=""></a>    
                        </div>
                </form>
            </div>
        </div>

    </section>
</body>
</html>
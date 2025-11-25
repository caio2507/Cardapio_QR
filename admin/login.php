<?php
session_start();
include 'config.php';

$erro = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = "caio"; 
    $senha_correta = "12345"; 

    $usuario_digitado = $_POST['usuario'] ?? '';
    $senha_digitada = $_POST['senha'] ?? '';
    
    if ($usuario_digitado == $usuario && $senha_digitada == $senha_correta) {
        $_SESSION['admin_logado'] = true;
        
        header("Location: index.php");
        exit();
    } else {
        $erro = "Usuário ou senha inválidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <link rel="stylesheet" href="style.css"> 
    <style>
        
        .login-form {
            width: 400px;
            margin: 150px auto;
            padding: 30px;
            background: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        .login-form h1 {
            color: #0D1B2A;
        }
        .btn-voltar {
        display: inline-block;
        padding: 10px 8px;
        margin-bottom: 20px;
        background-color: #6c757d;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="login-form">
        <h1>Acesso Administrativo</h1>

        <?php if (!empty($erro)): ?>
            <p class="erro"><?php echo $erro; ?></p>
        <?php endif; ?>

        <form method="post" action="login.php">
            <label for="usuario">Usuário:</label>
            <input type="text" id="usuario" name="usuario" required>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>
            
            <button type="submit" class="btn-submit">Entrar</button>
        </form>
         <a href="../index.php" class="btn-voltar">Voltar para o cardapio</a>
    </div>
</body>
</html>
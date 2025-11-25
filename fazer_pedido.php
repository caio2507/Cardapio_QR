<?php
include 'admin/config.php'; 

$mensagem = "";
$item_id = $_GET['item_id'] ?? null;
$quantidade = 1; 

if ($item_id) {
    $item_id_seguro = mysqli_real_escape_string($conn, $item_id);
    $sql = "INSERT INTO pedidos (item_id, quantidade, status) 
            VALUES ('$item_id_seguro', '$quantidade', 'Preparando')";

    if (mysqli_query($conn, $sql)) {
        $mensagem = "✅ Seu pedido foi feito e já está sendo preparado! Obrigado!";
    } else {
        $mensagem = "❌ Erro ao registrar o pedido. Por favor, tente novamente. " . mysqli_error($conn);
    }
} else {
    $mensagem = "❌ Item não especificado para o pedido.";
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Confirmação de Pedido</title>
    <style>
        body { 
            font-family: 'Verdana', sans-serif;
            background-color: #F8F8F8;
            color: #1C1C1C;
            padding: 20px;
            max-width: 900px;
            margin: 0 auto;
            text-align: center; 
        } 
        h1 {
            color: #0D1B2A;
            margin-bottom: 30px;
            font-size: 2.5em;
        }
        .mensagem-sucesso {
            font-size: 1.5em;
            color: #0D1B2A; 
            background-color: #E6F0FF; 
            border: 2px solid #0D1B2A;
            padding: 30px;
            border-radius: 8px;
            margin-top: 50px;
        }
        .btn-voltar {
            display: inline-block;
            margin-top: 40px;
            background-color: #B87333; 
            color: white;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .btn-voltar:hover {
            background-color: #0D1B2A;
        }
    </style>
</head>
<body>
    <h1>🌟 Confirmação de Pedido 🌟</h1>
    
    <div class="mensagem-sucesso">
        <?php echo $mensagem; ?>
    </div>
    
    <a href="index.php" class="btn-voltar">Ver o Cardápio Novamente</a>
</body>
</html>
<?php

include 'admin/config.php'; 

$sql = "SELECT * FROM itens_cardapio ORDER BY categoria, nome";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cardápio do Restaurante</title>
    <style>
    body { 
        font-family: 'Verdana', sans-serif; 
        background-color: #F8F8F8; 
        color: #1C1C1C; 
        padding: 20px;
        max-width: 900px; 
        margin: 0 auto; 
    } 
    
    h1 {
        text-align: center;
        color: #0D1B2A; 
        margin-bottom: 30px;
        font-size: 2.5em;
        letter-spacing: 2px; 
    }

    
    p a {
        color: #B87333; 
        font-weight: bold;
    }

    .menu-item { 
        border-bottom: 1px solid #CCCCCC; 
        padding: 15px 0; 
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .item-details { 
        flex-grow: 1;
    }

    .menu-item h3 { 
        margin: 0; 
        color: #1C1C1C; 
        font-weight: 600; 
        font-size: 1.2em;
    }
    .menu-item p { 
        margin: 5px 0 0 0; 
        font-size: 0.9em; 
        color: #555555; 
    }
    
    .item-price { 
        font-weight: bold; 
        color: #B87333;
        font-size: 1.4em;
        margin-right: 20px; 
        white-space: nowrap; 
    }

    .categoria { 
        color: #0D1B2A; 
        margin-top: 40px; 
        margin-bottom: 15px;
        border-bottom: 3px solid #B87333; 
        padding-bottom: 5px;
        font-size: 1.9em;
        text-transform: uppercase; 
    }

    .btn-pedido {
        background-color: #0D1B2A;
        color: white;
        border: none;
        padding: 10px 18px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        cursor: pointer;
        border-radius: 4px;
        transition: background-color 0.3s;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .btn-pedido:hover {
        background-color: #B87333;
    }
</style>
</head>
<body>
    <h1>🍽️ Nosso Cardápio 🍽️</h1> 
    
    <?php 
    $categoria_atual = "";
    while($item = mysqli_fetch_assoc($result)): 
        if ($item['categoria'] != $categoria_atual) {
            $categoria_atual = $item['categoria'];
            echo "<h2 class='categoria'>{$categoria_atual}</h2>";
        }
    ?>
        <div class="menu-item">
            <div class="item-details"> <h3><?php echo htmlspecialchars($item['nome']); ?></h3>
                <p><?php echo htmlspecialchars($item['descricao']); ?></p>
            </div>
            
            <span class="item-price">R$ <?php echo number_format($item['preco'], 2, ',', '.'); ?></span>

            <a href="fazer_pedido.php?item_id=<?php echo $item['id']; ?>" class="btn-pedido">Fazer Pedido</a>
        </div>
        <?php endwhile; ?>
    <p>Acesse o <a href="admin/index.php">Painel Admin</a> para gerenciar o cardápio.</p>
</body>
</html>
<?php mysqli_close($conn); ?>
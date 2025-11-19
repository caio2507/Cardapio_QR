<?php
include 'config.php';


$sql = "SELECT * FROM itens_cardapio";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Gerenciamento do Cardápio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>🍽️ Gerenciamento do Cardápio</h1>
        <a href="adicionar.php" class="btn-novo">Adicionar Novo Item</a>

        <?php if (mysqli_num_rows($result) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['nome']); ?></td>
                    <td><?php echo htmlspecialchars($row['descricao']); ?></td>
                    <td>R$ <?php echo number_format($row['preco'], 2, ',', '.'); ?></td>
                    <td><?php echo htmlspecialchars($row['categoria']); ?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $row['id']; ?>" class="btn-acao editar">Editar</a>
                        <a href="excluir.php?id=<?php echo $row['id']; ?>" class="btn-acao excluir" onclick="return confirm('Tem certeza que deseja excluir este item?');">Excluir</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php else: ?>
            <p>Nenhum item cadastrado no cardápio.</p>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>
<?php
include 'config.php';

$id = $_GET['id'] ?? null;
$item = null;

if ($id) {
    // Busca o item pelo ID
    $sql = "SELECT * FROM itens_cardapio WHERE id = " . mysqli_real_escape_string($conn, $id);
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) == 1) {
        $item = mysqli_fetch_assoc($result);
    } else {
        die("Item não encontrado.");
    }
} else {
    die("ID do item não fornecido.");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Item do Cardápio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Editar Item: <?php echo htmlspecialchars($item['nome']); ?></h1>
        <a href="index.php" class="btn-voltar">Voltar para a Lista</a>

        <form method="post" action="salvar_edicao.php">
            <input type="hidden" name="id" value="<?php echo $item['id']; ?>">

            <label for="nome">Nome do Item:</label>
            <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($item['nome']); ?>" required>

            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao"><?php echo htmlspecialchars($item['descricao']); ?></textarea>

            <label for="preco">Preço (R$):</label>
            <input type="number" id="preco" name="preco" step="0.01" value="<?php echo $item['preco']; ?>" required>

            <label for="categoria">Categoria:</label>
            <select id="categoria" name="categoria" required>
                <?php $categorias = ['Prato Principal', 'Bebida', 'Sobremesa', 'Entrada']; ?>
                <?php foreach ($categorias as $cat): ?>
                    <option value="<?php echo $cat; ?>" <?php echo ($item['categoria'] == $cat) ? 'selected' : ''; ?>>
                        <?php echo $cat; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            
            <button type="submit" class="btn-submit">Salvar Alterações</button>
        </form>
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>
<?php
include 'config.php';

// CREATE - Lógica para inserir novo item
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
    $preco = mysqli_real_escape_string($conn, $_POST['preco']);
    $categoria = mysqli_real_escape_string($conn, $_POST['categoria']);
    
    // Validação básica
    if (!empty($nome) && !empty($preco) && !empty($categoria)) {
        $sql = "INSERT INTO itens_cardapio (nome, descricao, preco, categoria) VALUES ('$nome', '$descricao', '$preco', '$categoria')";
        
        if (mysqli_query($conn, $sql)) {
            header("Location: index.php"); // Redireciona para a lista
            exit();
        } else {
            $erro = "Erro ao adicionar item: " . mysqli_error($conn);
        }
    } else {
        $erro = "Por favor, preencha todos os campos obrigatórios.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Item ao Cardápio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Adicionar Novo Item</h1>
        <a href="index.php" class="btn-voltar">Voltar para a Lista</a>

        <?php if (isset($erro)): ?>
            <p class="erro"><?php echo $erro; ?></p>
        <?php endif; ?>

        <form method="post" action="adicionar.php">
            <label for="nome">Nome do Item:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao"></textarea>

            <label for="preco">Preço (R$):</label>
            <input type="number" id="preco" name="preco" step="0.01" required>

            <label for="categoria">Categoria:</label>
            <select id="categoria" name="categoria" required>
                <option value="">Selecione a Categoria</option>
                <option value="Prato Principal">Prato Principal</option>
                <option value="Bebida">Bebida</option>
                <option value="Sobremesa">Sobremesa</option>
                <option value="Entrada">Entrada</option>
                </select>
            
            <button type="submit" class="btn-submit">Salvar Item</button>
        </form>
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>
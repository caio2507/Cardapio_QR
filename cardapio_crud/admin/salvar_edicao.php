<?php
include 'config.php';

// UPDATE - Lógica para atualizar item
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
    $preco = mysqli_real_escape_string($conn, $_POST['preco']);
    $categoria = mysqli_real_escape_string($conn, $_POST['categoria']);
    
    // Validação básica
    if (!empty($id) && !empty($nome) && !empty($preco) && !empty($categoria)) {
        $sql = "UPDATE itens_cardapio SET nome='$nome', descricao='$descricao', preco='$preco', categoria='$categoria' WHERE id='$id'";
        
        if (mysqli_query($conn, $sql)) {
            header("Location: index.php"); // Redireciona para a lista
            exit();
        } else {
            echo "Erro ao atualizar item: " . mysqli_error($conn);
        }
    } else {
        echo "Dados incompletos para a atualização.";
    }
} else {
    header("Location: index.php"); // Se acessado diretamente, redireciona
    exit();
}

mysqli_close($conn);
?>
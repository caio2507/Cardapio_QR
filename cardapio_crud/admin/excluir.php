<?php
include 'config.php';

// DELETE - Lógica para excluir item
$id = $_GET['id'] ?? null;

if ($id) {
    $sql = "DELETE FROM itens_cardapio WHERE id = " . mysqli_real_escape_string($conn, $id);
    
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php"); // Redireciona para a lista
        exit();
    } else {
        echo "Erro ao excluir item: " . mysqli_error($conn);
    }
} else {
    echo "ID do item não fornecido.";
}

mysqli_close($conn);
?>
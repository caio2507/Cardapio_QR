 
<?php
include 'config.php';

mysqli_begin_transaction($conn);

$id = $_GET['id'] ?? null;

if ($id) {
    
    $id_seguro = mysqli_real_escape_string($conn, $id);

    try {
        $sql_pedidos = "DELETE FROM pedidos WHERE item_id = " . $id_seguro;
        
        if (!mysqli_query($conn, $sql_pedidos)) {
            throw new Exception("Erro ao excluir pedidos relacionados: " . mysqli_error($conn));
        }

        $sql_item = "DELETE FROM itens_cardapio WHERE id = " . $id_seguro;
        
        if (!mysqli_query($conn, $sql_item)) {
            throw new Exception("Erro ao excluir item do cardápio: " . mysqli_error($conn));
        }

        
        mysqli_commit($conn);
        header("Location: index.php"); 
        exit();

    } catch (Exception $e) {
        
        mysqli_rollback($conn);
        echo "Erro ao excluir item: " . $e->getMessage();
    }
} else {
    echo "ID do item não fornecido.";
}

mysqli_close($conn);
?>
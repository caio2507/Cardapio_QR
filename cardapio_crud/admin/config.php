<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";     
$dbname = "cardapio_crud"; 


$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);


if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}
?>
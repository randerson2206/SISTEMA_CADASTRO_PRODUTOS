<?php
include '../db/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO produtos (nome, descricao, preco, estoque) VALUES (?, ?, ?, ?)");
    $stmt->execute([$_POST['nome'], $_POST['descricao'], $_POST['preco'], $_POST['estoque']]);
}

header("Location: ../index.php");
exit();
?>

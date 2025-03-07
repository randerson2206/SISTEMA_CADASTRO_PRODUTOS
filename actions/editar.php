<?php
include '../db/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE produtos SET nome = ?, descricao = ?, preco = ?, estoque = ? WHERE id = ?");
    $stmt->execute([
        $_POST['nome'],
        $_POST['descricao'],
        $_POST['preco'],
        $_POST['estoque'],
        $_POST['id']
    ]);
}

header("Location: ../index.php");
exit();
?>

<?php
include '../db/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("DELETE FROM produtos WHERE id=?");
    $stmt->execute([$_POST['id']]);
}

header("Location: ../index.php");
exit();
?>

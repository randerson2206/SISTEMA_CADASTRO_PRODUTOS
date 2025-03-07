<?php
include 'db/conexao.php';
include 'includes/header.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    die("Produto não encontrado.");
}

$stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = ?");
$stmt->execute([$id]);
$produto = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<h1>Editar Produto</h1>
<form action="actions/editar.php" method="POST">
    <input type="hidden" name="id" value="<?= $produto['id'] ?>">
    <input type="text" name="nome" value="<?= htmlspecialchars($produto['nome']) ?>" required>
    <textarea name="descricao"><?= htmlspecialchars($produto['descricao']) ?></textarea>
    <input type="number" step="0.01" name="preco" value="<?= $produto['preco'] ?>" required>
    <input type="number" name="estoque" value="<?= $produto['estoque'] ?>" required>
    <button type="submit">Salvar Alterações</button>
</form>

<?php include 'includes/footer.php'; ?>

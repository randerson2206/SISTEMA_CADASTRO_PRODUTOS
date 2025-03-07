<?php
include 'db/conexao.php';
include 'includes/header.php';

// Tente buscar os produtos e verifique se a consulta foi bem-sucedida
try {
    $stmt = $pdo->query("SELECT * FROM produtos");
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    die("Erro ao consultar os produtos: " . $e->getMessage());
}
?>

<h1>Cadastro de Produtos</h1>
<form action="actions/cadastrar.php" method="POST">
    <input type="text" name="nome" placeholder="Nome" required>
    <textarea name="descricao" placeholder="Descrição"></textarea>
    <input type="number" step="0.01" name="preco" placeholder="Preço" required>
    <input type="number" name="estoque" placeholder="Estoque" required>
    <button type="submit">Cadastrar</button>
</form>

<h2>Lista de Produtos</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Preço</th>
        <th>Estoque</th>
        <th>Data de Criação</th> <!-- Nova coluna para exibir a data -->
        <th>Ações</th>
    </tr>
    <?php if ($produtos): ?>
        <?php foreach ($produtos as $produto): ?>
        <tr>
            <td><?= $produto['id'] ?></td>
            <td><?= htmlspecialchars($produto['nome']) ?></td>
            <td><?= htmlspecialchars($produto['descricao']) ?></td>
            <td><?= number_format($produto['preco'], 2, ',', '.') ?></td>
            <td><?= $produto['estoque'] ?></td>
            <td><?= date('d/m/Y H:i:s', strtotime($produto['data_criacao'])) ?></td> <!-- Exibindo a data de criação -->
            <td class="actions">
                <a href="editar.php?id=<?= $produto['id'] ?>" class="edit">Editar</a>
                <form action="actions/excluir.php" method="POST" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $produto['id'] ?>">
                    <button type="submit" class="delete" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="7" style="text-align: center;">Nenhum produto encontrado.</td>
        </tr>
    <?php endif; ?>
</table>

<?php include 'includes/footer.php'; ?>

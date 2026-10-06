<?php
require_once __DIR__ . '/../../config/database.php';
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) { header('Location: ?p=clientes'); exit; }

$stmt = $pdo->prepare('SELECT * FROM clientes WHERE id = ?');
$stmt->execute([$id]);
$cliente = $stmt->fetch();
if (!$cliente) { header('Location: ?p=clientes&status=nao-encontrado'); exit; }

$erro = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');
    if ($nome === '' || $email === '' || $telefone === '') {
        $erro = 'Preencha todos os campos.';
    } else {
        $update = $pdo->prepare('UPDATE clientes SET nome = ?, email = ?, telefone = ? WHERE id = ?');
        $update->execute([$nome, $email, $telefone, $id]);
        header('Location: ?p=clientes&status=atualizado');
        exit;
    }
    $cliente['nome'] = $nome; $cliente['email'] = $email; $cliente['telefone'] = $telefone;
}
?>
<h3 class="mt-3 text-primary">Editar Cliente #<?= (int)$cliente['id'] ?></h3>
<?php if ($erro): ?><div class="alert alert-danger"><?= htmlspecialchars($erro) ?></div><?php endif; ?>
<div class="card shadow mt-3"><form method="post" class="m-3">
    <div class="form-group"><label>Nome</label><input type="text" class="form-control" name="nome" required value="<?= htmlspecialchars($cliente['nome']) ?>"></div>
    <div class="form-group"><label>E-mail</label><input type="email" class="form-control" name="email" required value="<?= htmlspecialchars($cliente['email']) ?>"></div>
    <div class="form-group"><label>Telefone</label><input type="text" class="form-control" name="telefone" required value="<?= htmlspecialchars($cliente['telefone']) ?>"></div>
    <button type="submit" class="btn btn-primary">Salvar alterações</button>
    <a href="?p=clientes" class="btn btn-danger">Cancelar</a>
</form></div>

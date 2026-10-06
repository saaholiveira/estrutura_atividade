<?php
require_once __DIR__ . '/../../config/database.php';

$erro = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $telefone = trim($_POST['telefone'] ?? '');

    if ($nome === '' || $email === '' || $telefone === '') {
        $erro = 'Preencha todos os campos.';
    } else {
        $stmt = $pdo->prepare('INSERT INTO clientes (nome, email, telefone) VALUES (?, ?, ?)');
        $stmt->execute([$nome, $email, $telefone]);
        header('Location: ?p=clientes&status=cadastrado');
        exit;
    }
}
?>
<h3 class="mt-3 text-primary">Cadastrar Cliente</h3>
<?php if ($erro): ?><div class="alert alert-danger"><?= htmlspecialchars($erro) ?></div><?php endif; ?>
<div class="card shadow mt-3"><form method="post" class="m-3">
    <div class="form-group"><label>Nome</label><input type="text" class="form-control" name="nome" required value="<?= htmlspecialchars($_POST['nome'] ?? '') ?>"></div>
    <div class="form-group"><label>E-mail</label><input type="email" class="form-control" name="email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"></div>
    <div class="form-group"><label>Telefone</label><input type="text" class="form-control" name="telefone" required value="<?= htmlspecialchars($_POST['telefone'] ?? '') ?>"></div>
    <button type="submit" class="btn btn-primary">Cadastrar</button>
    <a href="?p=clientes" class="btn btn-danger">Cancelar</a>
</form></div>

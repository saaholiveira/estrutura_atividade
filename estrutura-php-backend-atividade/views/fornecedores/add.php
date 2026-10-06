<?php
require_once __DIR__ . '/../../config/database.php';
$erro = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $razao_social = trim($_POST['razao_social'] ?? ''); $email = trim($_POST['email'] ?? ''); $telefone = trim($_POST['telefone'] ?? '');
    if ($razao_social === '' || $email === '' || $telefone === '') $erro = 'Preencha todos os campos.';
    else { $stmt = $pdo->prepare('INSERT INTO fornecedores (razao_social, email, telefone) VALUES (?, ?, ?)'); $stmt->execute([$razao_social, $email, $telefone]); header('Location: ?p=fornecedores&status=cadastrado'); exit; }
}
?>
<h3 class="mt-3 text-primary">Cadastrar Fornecedor</h3>
<?php if ($erro): ?><div class="alert alert-danger"><?= htmlspecialchars($erro) ?></div><?php endif; ?>
<div class="card shadow mt-3"><form method="post" class="m-3">
<div class="form-group"><label>Razão Social</label><input type="text" class="form-control" name="razao_social" required value="<?= htmlspecialchars($_POST['razao_social'] ?? '') ?>"></div>
<div class="form-group"><label>E-mail</label><input type="email" class="form-control" name="email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"></div>
<div class="form-group"><label>Telefone</label><input type="text" class="form-control" name="telefone" required value="<?= htmlspecialchars($_POST['telefone'] ?? '') ?>"></div>
<button type="submit" class="btn btn-primary">Cadastrar</button> <a href="?p=fornecedores" class="btn btn-danger">Cancelar</a>
</form></div>

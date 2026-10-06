<?php
require_once __DIR__ . '/../../config/database.php';
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT); if (!$id) { header('Location: ?p=fornecedores'); exit; }
$stmt = $pdo->prepare('SELECT * FROM fornecedores WHERE id = ?'); $stmt->execute([$id]); $fornecedor = $stmt->fetch();
if (!$fornecedor) { header('Location: ?p=fornecedores&status=nao-encontrado'); exit; }
$erro = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $razao_social = trim($_POST['razao_social'] ?? ''); $email = trim($_POST['email'] ?? ''); $telefone = trim($_POST['telefone'] ?? '');
    if ($razao_social === '' || $email === '' || $telefone === '') $erro = 'Preencha todos os campos.';
    else { $update = $pdo->prepare('UPDATE fornecedores SET razao_social = ?, email = ?, telefone = ? WHERE id = ?'); $update->execute([$razao_social, $email, $telefone, $id]); header('Location: ?p=fornecedores&status=atualizado'); exit; }
    $fornecedor['razao_social']=$razao_social; $fornecedor['email']=$email; $fornecedor['telefone']=$telefone;
}
?>
<h3 class="mt-3 text-primary">Editar Fornecedor #<?= (int)$fornecedor['id'] ?></h3>
<?php if ($erro): ?><div class="alert alert-danger"><?= htmlspecialchars($erro) ?></div><?php endif; ?>
<div class="card shadow mt-3"><form method="post" class="m-3">
<div class="form-group"><label>Razão Social</label><input type="text" class="form-control" name="razao_social" required value="<?= htmlspecialchars($fornecedor['razao_social']) ?>"></div>
<div class="form-group"><label>E-mail</label><input type="email" class="form-control" name="email" required value="<?= htmlspecialchars($fornecedor['email']) ?>"></div>
<div class="form-group"><label>Telefone</label><input type="text" class="form-control" name="telefone" required value="<?= htmlspecialchars($fornecedor['telefone']) ?>"></div>
<button type="submit" class="btn btn-primary">Salvar alterações</button> <a href="?p=fornecedores" class="btn btn-danger">Cancelar</a>
</form></div>

<?php
require_once __DIR__ . '/../../config/database.php';
$fornecedores = $pdo->query('SELECT * FROM fornecedores ORDER BY id DESC')->fetchAll();
$status = $_GET['status'] ?? '';
?>
<div class="col-sm-12 mb-4"><div class="card shadow mb-4"><div class="table-responsive-sm mt-4">
<h3 class="ml-3">Listar Fornecedores <a class="btn btn-success float-right mb-3 mr-3" href="?p=add/fornecedores"><i class="bi bi-database-fill-add"></i> Novo</a></h3>
<?php if ($status === 'atualizado'): ?><div class="alert alert-success mx-3">Fornecedor atualizado com sucesso!</div><?php elseif ($status === 'cadastrado'): ?><div class="alert alert-success mx-3">Fornecedor cadastrado com sucesso!</div><?php endif; ?>
<table class="table table-striped table-sm"><thead><tr><th>ID</th><th>Razão Social</th><th>E-mail</th><th>Telefone</th><th>Ações</th></tr></thead><tbody>
<?php if (!$fornecedores): ?><tr><td colspan="5" class="text-center">Nenhum fornecedor cadastrado.</td></tr><?php endif; ?>
<?php foreach ($fornecedores as $fornecedor): ?><tr><td><?= (int)$fornecedor['id'] ?></td><td><?= htmlspecialchars($fornecedor['razao_social']) ?></td><td><?= htmlspecialchars($fornecedor['email']) ?></td><td><?= htmlspecialchars($fornecedor['telefone']) ?></td><td><a class="btn btn-sm btn-warning" href="?p=edit/fornecedores&id=<?= (int)$fornecedor['id'] ?>"><i class="bi bi-pencil-square"></i> Editar</a></td></tr><?php endforeach; ?>
</tbody></table></div></div></div>

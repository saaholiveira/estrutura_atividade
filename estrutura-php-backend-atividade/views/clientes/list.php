<?php
require_once __DIR__ . '/../../config/database.php';
$clientes = $pdo->query('SELECT * FROM clientes ORDER BY id DESC')->fetchAll();
$status = $_GET['status'] ?? '';
?>
<div class="col-sm-12 mb-4">
<div class="card shadow mb-4"><div class="table-responsive-sm mt-4">
<h3 class="ml-3">Listar Clientes <a class="btn btn-success float-right mb-3 mr-3" href="?p=add/clientes"><i class="bi bi-database-fill-add"></i> Novo</a></h3>
<?php if ($status === 'atualizado'): ?><div class="alert alert-success mx-3">Cliente atualizado com sucesso!</div><?php elseif ($status === 'cadastrado'): ?><div class="alert alert-success mx-3">Cliente cadastrado com sucesso!</div><?php endif; ?>
<table class="table table-striped table-sm"><thead><tr><th>ID</th><th>Nome</th><th>E-mail</th><th>Telefone</th><th>Ações</th></tr></thead><tbody>
<?php if (!$clientes): ?><tr><td colspan="5" class="text-center">Nenhum cliente cadastrado.</td></tr><?php endif; ?>
<?php foreach ($clientes as $cliente): ?><tr><td><?= (int)$cliente['id'] ?></td><td><?= htmlspecialchars($cliente['nome']) ?></td><td><?= htmlspecialchars($cliente['email']) ?></td><td><?= htmlspecialchars($cliente['telefone']) ?></td><td><a class="btn btn-sm btn-warning" href="?p=edit/clientes&id=<?= (int)$cliente['id'] ?>"><i class="bi bi-pencil-square"></i> Editar</a></td></tr><?php endforeach; ?>
</tbody></table></div></div></div>

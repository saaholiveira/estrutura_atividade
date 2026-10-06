<?php
// Configuração do banco de dados MySQL (XAMPP)
$host = '127.0.0.1';
$db   = 'estrutura_php';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die('<div style="font-family:Arial;margin:30px"><h3>Erro de conexão com o banco</h3><p>Verifique se o MySQL está iniciado no XAMPP e confira as configurações em <b>config/database.php</b>.</p><small>' . htmlspecialchars($e->getMessage()) . '</small></div>');
}

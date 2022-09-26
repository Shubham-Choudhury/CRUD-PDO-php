<?php
    require_once 'vendor/autoload.php';

    use App\Database;

    $db = new Database();
    $pdo = $db->connect();

    $id = $_GET['id'];

    $sql = "DELETE FROM users WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':id' => $id]);

    header('Location: index.php');
?>
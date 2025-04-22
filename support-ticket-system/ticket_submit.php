<?php
session_start();
require 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user']) && $_SESSION['user']['role'] === 'user') {
    $title = trim($_POST['title']);
    $desc = trim($_POST['description']);
    $cat = $_POST['category_id'];
    $uid = $_SESSION['user']['id'];

    $stmt = $pdo->prepare("INSERT INTO tickets (user_id, category_id, title, description) VALUES (?, ?, ?, ?)");
    $stmt->execute([$uid, $cat, $title, $desc]);
}

header("Location: dashboard.php");
exit;

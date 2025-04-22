<?php
session_start();
require 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin') {
    $ticket_id = $_POST['ticket_id'];
    $message = trim($_POST['message']);
    $status_id = $_POST['status_id'];
    $admin_id = $_SESSION['user']['id'];

    // Insert response
    $stmt = $pdo->prepare("INSERT INTO responses (ticket_id, admin_id, message) VALUES (?, ?, ?)");
    $stmt->execute([$ticket_id, $admin_id, $message]);

    // Update ticket status
    $update = $pdo->prepare("UPDATE tickets SET status_id = ? WHERE id = ?");
    $update->execute([$status_id, $ticket_id]);

    $_SESSION['msg'] = "Reply sent and status updated!";
}

header("Location: dashboard.php");
exit;

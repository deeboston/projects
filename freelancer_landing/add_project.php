<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';

$title = $_POST['title'];
$description = $_POST['description'];
$url = $_POST['url'];

$image = '';
if (!empty($_FILES['image']['name'])) {
    $image = time() . '_' . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $image);
}

$stmt = $conn->prepare("INSERT INTO projects (title, description, url, image, created_at) VALUES (?, ?, ?, ?, NOW())");
$stmt->bind_param("ssss", $title, $description, $url, $image);
$stmt->execute();

header("Location: admin_projects.php");
exit();

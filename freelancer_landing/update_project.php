<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';

$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$url = $_POST['url'];

$image = '';
if (!empty($_FILES['image']['name'])) {
    $image = time() . '_' . basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $image);

    // Update including new image
    $stmt = $conn->prepare("UPDATE projects SET title=?, description=?, url=?, image=? WHERE id=?");
    $stmt->bind_param("ssssi", $title, $description, $url, $image, $id);
} else {
    // Update without image
    $stmt = $conn->prepare("UPDATE projects SET title=?, description=?, url=? WHERE id=?");
    $stmt->bind_param("sssi", $title, $description, $url, $id);
}

$stmt->execute();

header("Location: admin_projects.php");
exit();

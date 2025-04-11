<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
include 'config.php';

// Fetch projects
$sql = "SELECT * FROM projects ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Projects</title>
    <style>
        body { font-family: Arial; padding: 30px; background: #f2f2f2; }
        h1 { margin-bottom: 20px; }
        form { background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 1px 5px rgba(0,0,0,0.1); margin-bottom: 40px; }
        input, textarea { display: block; margin-bottom: 10px; width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; }
        table { width: 100%; border-collapse: collapse; background: #fff; box-shadow: 0 1px 5px rgba(0,0,0,0.1); }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        .delete-btn { color: red; text-decoration: none; }
        img { max-width: 100px; height: auto; border-radius: 6px; }
    </style>
</head>
<body>
    <h1>📂 Manage Projects</h1>

    <!-- Add New Project -->
    <form action="add_project.php" method="POST" enctype="multipart/form-data">
        <h2>Add New Project</h2>
        <input type="text" name="title" placeholder="Title" required>
        <textarea name="description" placeholder="Description" required></textarea>
        <input type="file" name="image" accept="image/*">
        <input type="text" name="url" placeholder="Project URL (e.g. https://github.com/...)" required>
        <button type="submit">➕ Add Project</button>
    </form>

    <!-- Projects Table -->
    <h2>Current Projects</h2>
    <table>
        <tr>
            <th>Image</th>
            <th>Title</th>
            <th>URL</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td>
                    <?php if (!empty($row['image'])): ?>
                        <img src="uploads/<?php echo $row['image']; ?>" alt="Project Image">
                    <?php else: ?>
                        No image
                    <?php endif; ?>
                </td>
                <td><?php echo $row['title']; ?></td>
                <td><a href="<?php echo $row['url']; ?>" target="_blank">Link</a></td>
                <a href="edit_project.php?id=<?php echo $row['id']; ?>">✏️ Edit</a> | 
                <td><a class="delete-btn" href="delete_project.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Delete this project?');">🗑 Delete</a></td>
            </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>

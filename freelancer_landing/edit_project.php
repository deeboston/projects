<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include 'config.php';

$id = $_GET['id'];
$sql = "SELECT * FROM projects WHERE id = $id";
$result = $conn->query($sql);
$project = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-warning text-white">
            ✏️ Edit Project
        </div>
        <div class="card-body">
            <form action="update_project.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $project['id']; ?>">

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="<?php echo $project['title']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3" required><?php echo $project['description']; ?></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Project URL</label>
                    <input type="text" name="url" class="form-control" value="<?php echo $project['url']; ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Current Image:</label><br>
                    <?php if ($project['image']): ?>
                        <img src="uploads/<?php echo $project['image']; ?>" class="img-thumbnail mb-2" style="max-width: 200px;">
                    <?php else: ?>
                        <p class="text-muted">No image uploaded</p>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label class="form-label">Upload New Image (optional)</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">💾 Update Project</button>
                <a href="admin_projects.php" class="btn btn-secondary">⬅️ Cancel</a>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

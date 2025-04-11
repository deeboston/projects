<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>My Projects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<?php include 'navbar.php'; ?>

<div class="container mt-5">
    <h1 class="text-center mb-4">💼 My Portfolio</h1>
    <div class="row g-4">
        <?php
        $sql = "SELECT * FROM projects ORDER BY created_at DESC";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()):
        ?>
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm h-100">
                    <?php if (!empty($row['image'])): ?>
                        <img src="uploads/<?php echo $row['image']; ?>" class="card-img-top">
                    <?php endif; ?>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?php echo $row['title']; ?></h5>
                        <p class="card-text"><?php echo $row['description']; ?></p>
                        <a href="<?php echo $row['url']; ?>" target="_blank" class="btn btn-primary mt-auto">🔗 View Project</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

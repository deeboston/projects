<?php
session_start();
require 'includes/db.php';

// Kick out guests
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$user = $_SESSION['user'];

// Load categories for ticket submission (users)
$categories = $pdo->query("SELECT * FROM categories")->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - SupportSys</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark bg-dark px-4">
    <span class="navbar-text text-white">Welcome, <?= $user['name'] ?> (<?= $user['role'] ?>)</span>
    <a href="logout.php" class="btn btn-outline-light">Logout</a>
</nav>

<div class="container mt-4">

    <!-- ✅ Show success message -->
    <?php if (isset($_SESSION['msg'])): ?>
        <div class="alert alert-success"><?= $_SESSION['msg']; unset($_SESSION['msg']); ?></div>
    <?php endif; ?>

    <?php if ($user['role'] === 'admin'): ?>
        <h2>📋 All Tickets</h2>
        <?php
        $stmt = $pdo->query("SELECT t.*, u.name AS user_name, c.name AS category, s.name AS status 
                            FROM tickets t
                            JOIN users u ON t.user_id = u.id
                            JOIN categories c ON t.category_id = c.id
                            JOIN status s ON t.status_id = s.id
                            ORDER BY t.created_at DESC");
        $tickets = $stmt->fetchAll();

        foreach ($tickets as $ticket):
        ?>
            <div class="card mb-3">
                <div class="card-header">
                    <strong><?= htmlspecialchars($ticket['title']) ?></strong> 
                    by <?= $ticket['user_name'] ?>
                    <span class="badge bg-info"><?= $ticket['status'] ?></span>
                </div>
                <div class="card-body">
                    <p><strong>Category:</strong> <?= $ticket['category'] ?></p>
                    <p><?= nl2br(htmlspecialchars($ticket['description'])) ?></p>
                    <small class="text-muted">Submitted: <?= $ticket['created_at'] ?></small>

                    <!-- Responses -->
                    <hr>
                    <h6>Responses:</h6>
                    <?php
                    $resStmt = $pdo->prepare("SELECT r.*, u.name FROM responses r JOIN users u ON r.admin_id = u.id WHERE ticket_id = ?");
                    $resStmt->execute([$ticket['id']]);
                    $responses = $resStmt->fetchAll();

                    foreach ($responses as $r):
                    ?>
                        <div class="alert alert-secondary mb-1">
                            <strong><?= $r['name'] ?>:</strong> <?= nl2br(htmlspecialchars($r['message'])) ?>
                            <br><small class="text-muted"><?= $r['created_at'] ?></small>
                        </div>
                    <?php endforeach; ?>

                    <!-- Admin reply -->
                    <form method="POST" action="reply_ticket.php" class="mt-3">
                        <input type="hidden" name="ticket_id" value="<?= $ticket['id'] ?>">
                        <div class="mb-2">
                            <textarea name="message" class="form-control" placeholder="Write a reply..." required></textarea>
                        </div>
                        <div class="mb-2">
                            <label>Status:</label>
                            <select name="status_id" class="form-select" required>
                                <?php
                                $statuses = $pdo->query("SELECT * FROM status")->fetchAll();
                                foreach ($statuses as $status):
                                ?>
                                    <option value="<?= $status['id'] ?>" <?= $ticket['status_id'] == $status['id'] ? 'selected' : '' ?>>
                                        <?= $status['name'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button class="btn btn-success">Reply & Update Status</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>

    <?php else: ?>
        <h2>📝 Submit a Ticket</h2>
        <form method="POST" action="ticket_submit.php" class="mb-4">
            <input type="text" name="title" class="form-control mb-2" placeholder="Ticket Title" required>
            <select name="category_id" class="form-select mb-2" required>
                <option value="">Select Category</option>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
                <?php endforeach; ?>
            </select>
            <textarea name="description" class="form-control mb-2" placeholder="Describe the issue" required></textarea>
            <button class="btn btn-primary">Submit Ticket</button>
        </form>

        <h3>Your Tickets</h3>
        <?php
        $stmt = $pdo->prepare("SELECT t.*, c.name AS category, s.name AS status 
                               FROM tickets t 
                               JOIN categories c ON t.category_id = c.id
                               JOIN status s ON t.status_id = s.id
                               WHERE t.user_id = ? 
                               ORDER BY t.created_at DESC");
        $stmt->execute([$user['id']]);
        $tickets = $stmt->fetchAll();

        foreach ($tickets as $ticket):
        ?>
            <div class="card mb-2">
                <div class="card-body">
                    <strong><?= htmlspecialchars($ticket['title']) ?></strong>
                    <span class="badge bg-secondary"><?= $ticket['category'] ?></span>
                    <span class="badge bg-info"><?= $ticket['status'] ?></span>
                    <p><?= htmlspecialchars($ticket['description']) ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
</body>
</html>

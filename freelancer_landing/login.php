<?php
session_start();
include 'config.php'; // Ensure you're including your database connection

// Check if the user is already logged in
if (isset($_SESSION['admin'])) {
    header("Location: admin_projects.php");
    exit();
}

// Process the form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username and password are correct (you can query the database)
    $sql = "SELECT * FROM admin WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Get the row data
        $row = $result->fetch_assoc();
        
        // If you are storing the password as a plain text in the database
        // (not recommended for production), you can directly compare it like this:
        // if ($password == $row['password']) {
        
        // If you're hashing the password in your database, use password_verify:
        if (password_verify($password, $row['password'])) {
            // Login successful
            $_SESSION['admin'] = $username; // Store the session
            header("Location: admin_projects.php"); // Redirect to admin page
            exit();
        } else {
            // Password is incorrect
            $error_message = "Invalid username or password.";
        }
    } else {
        // Username not found
        $error_message = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
        <div class="card-body">
            <h3 class="card-title mb-4 text-center">🔐 Admin Login</h3>

            <?php if (isset($error_message)): ?>
                <div class="alert alert-danger">
                    <?php echo htmlspecialchars($error_message); ?>
                </div>
            <?php endif; ?>

            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

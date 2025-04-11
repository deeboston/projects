<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome to My Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- Font Awesome CDN -->
</head>
<body class="bg-light">

<?php include 'navbar.php'; ?>

<!-- Hero Section -->
<section class="bg-dark text-light text-center py-5">
    <div class="container">
        <h1 class="display-4 fw-bold">Hi, I'm a Web Developer 👨‍💻</h1>
        <p class="lead">Building responsive websites with PHP, MySQL & Bootstrap</p>
        <a href="projects.php" class="btn btn-primary btn-lg mt-3">View My Work</a>
    </div>
</section>

<!-- About Me -->
<section class="py-5">
    <div class="container text-center">
        <h2>About Me</h2>
        <p class="mt-3 mx-auto" style="max-width: 700px;">
            I'm a 5th semester web development student passionate about creating clean, responsive, and functional websites. My goal is to develop modern solutions that combine usability and performance. This portfolio reflects my journey and growth in tech.
        </p>
    </div>
</section>

<!-- Skills Section -->
<section class="bg-light py-5 border-top">
    <div class="container text-center">
        <h2 class="mb-4">My Skills</h2>
        <div class="row">
            <div class="col-md-3 mb-3"><span class="badge bg-primary fs-5 px-4 py-2">HTML & CSS</span></div>
            <div class="col-md-3 mb-3"><span class="badge bg-success fs-5 px-4 py-2">PHP</span></div>
            <div class="col-md-3 mb-3"><span class="badge bg-warning text-dark fs-5 px-4 py-2">MySQL</span></div>
            <div class="col-md-3 mb-3"><span class="badge bg-dark fs-5 px-4 py-2">Bootstrap</span></div>
            <div class="col-md-3 mb-3"><span class="badge bg-info text-dark fs-5 px-4 py-2">Python</span></div>
            <div class="col-md-3 mb-3"><span class="badge bg-danger fs-5 px-4 py-2">Java</span></div>
        </div>
    </div>
</section>

<!-- Tools & Technologies -->
<section class="py-5 bg-white border-top">
    <div class="container text-center">
        <h2>Tools I Use</h2>
        <div class="row mt-4">
            <div class="col-md-4"><p><strong>🛠️ VS Code</strong><br>My code editor of choice</p></div>
            <div class="col-md-4"><p><strong>🐬 HeidiSQL</strong><br>Managing MySQL databases</p></div>
            <div class="col-md-4"><p><strong>🌐 XAMPP / Laragon</strong><br>Running PHP locally</p></div>
        </div>
    </div>
</section>

<!-- Latest Projects -->
<section class="py-5 bg-light border-top">
    <div class="container">
        <h2 class="text-center mb-4">Latest Projects</h2>
        <div class="row g-4">
            <?php
            $sql = "SELECT * FROM projects ORDER BY created_at DESC LIMIT 3";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()):
            ?>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <?php if (!empty($row['image'])): ?>
                            <img src="uploads/<?php echo $row['image']; ?>" class="card-img-top" alt="Project image">
                        <?php endif; ?>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?php echo $row['title']; ?></h5>
                            <p class="card-text"><?php echo $row['description']; ?></p>
                            <a href="<?php echo $row['url']; ?>" target="_blank" class="btn btn-outline-primary mt-auto">View</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>

<!-- My GitHub Projects -->
<section class="py-5 bg-light border-top">
    <div class="container">
        <h2 class="text-center mb-4">My GitHub Projects</h2>
        <div class="row g-4">
            <?php
            $projects = [
                [
                    'name' => 'Calculadora - Web Developer',
                    'url' => 'https://github.com/deeboston/desarollero-web/tree/86e81414782a6e797210222203a0807121f9b194/calculadora/calculadora',
                    'description' => 'A simple calculator project using JavaScript and HTML.',
                    'icon' => 'fas fa-calculator'
                ],
                [
                    'name' => 'Pagina de Noticias',
                    'url' => 'https://github.com/deeboston/Web-deisgn-/tree/b37f11bd9c991b1f63666e7be7c730e1ae3dd4f2/Pagina%20de%20Noticias',
                    'description' => 'A news page design built using HTML and CSS.',
                    'icon' => 'fas fa-newspaper'
                ],
                [
                    'name' => 'Pagina de Noticias (Alternate Link)',
                    'url' => 'https://github.com/deeboston/Web-deisgn-/tree/b37f11bd9c991b1f63666e7be7c730e1ae3dd4f2/Pagina%20de%20Noticias',
                    'description' => 'A news page design built using HTML and CSS (same as above).',
                    'icon' => 'fas fa-newspaper'
                ],
                [
                    'name' => 'DAndre Boston - Parcial Prog3',
                    'url' => 'https://github.com/deeboston/DAndre-Boston-Parcial-Prog3.git',
                    'description' => 'A project for the Prog3 course.',
                    'icon' => 'fas fa-code'
                ]
            ];
            foreach ($projects as $project):
            ?>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body d-flex flex-column">
                            <i class="<?php echo $project['icon']; ?> fs-1 mb-3 text-center"></i> <!-- Icon -->
                            <h5 class="card-title"><?php echo $project['name']; ?></h5>
                            <p class="card-text"><?php echo $project['description']; ?></p>
                            <a href="<?php echo $project['url']; ?>" target="_blank" class="btn btn-outline-primary mt-auto">View Project</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Contact Form -->
<section class="bg-white py-5 border-top">
    <div class="container">
        <h2 class="text-center mb-4">Contact Me</h2>
        <form action="contact_process.php" method="POST" class="mx-auto" style="max-width: 600px;">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
    </div>
</section>

<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

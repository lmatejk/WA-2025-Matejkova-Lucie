<?php
require_once '../../models/Database.php';
require_once '../../models/Post.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$postId = $_GET['id'] ?? null;
if (!$postId) {
    echo "Nebyl vybrán žádný příspěvek.";
    exit;
}

//presmerovani pokud nejsme prihlaseni
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../controllers/posts_list.php");
    exit();
}

$db = (new Database())->getConnection();
$postModel = new Post($db);
$posts = $postModel->getAllPosts();

$editMode = false;
$postToEdit = null;

if (isset($_GET['edit'])) {
    $editId = (int)$_GET['edit'];
    $postToEdit = $postModel->getPostById($editId);
    if ($postToEdit) {
        $editMode = true;
    }
}
// Získání příspěvku z databáze
$post = $postModel->getPostById($postId);
if (!$post) {
    echo "Příspěvek nenalezen.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" />
    
    <!-- custom style-->
    <link rel="stylesheet" href="../../styles/styles.css">
</head>
<body class="bg-light">
    
    <nav class="navbar navbar-expand-lg navbar-dark navbar-general mb-4 sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="../other/home.php"><img src="../../assets/images/logo_wa.png" alt="logo" style="width: 50px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Přepnout navigaci">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../mainContent/powerBI.php">Power BI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../mainContent/powerApps.php">Power Apps</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../mainContent/powerAutomate.php">Power Automate</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../mainContent/powerPages.php">Power Pages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../mainContent/copilotStudio.php">Copilot Studio</a>
                    </li>    
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>     
                </ul>

                <ul class="navbar-nav ms-auto">
                    <?php if (isset($_SESSION['username'])): ?>
                        <li class="nav-item">
                            <span class="nav-link text-white"><i class="bi bi bi-person-circle "></i> <strong><?= htmlspecialchars($_SESSION['username']) ?></strong></span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../controllers/logout.php">Odhlásit se</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../../auth/login.php">Přihlášení</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../auth/register.php">Registrace</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

<div class="container mt-5">
        <h2>Upravit příspěvek</h2>

        <?php if ($post): ?>
            <form method="POST" action="../../controllers/post_update.php">
                <div class="mb-3">
                    <input type="hidden" name="id" value="<?= $post['id'] ?>">

                    <label for="title" class="form-label">Nadpis</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($post['title']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label">Obsah</label>
                    <textarea class="form-control" id="content" name="content" rows="6" required><?= htmlspecialchars($post['content']) ?></textarea>
                </div>

                <button type="submit" class="btn btn-general">Uložit změny</button>
                
            </form>
        <?php else: ?>
            <div class="alert alert-danger">Příspěvek nenalezen.</div>
        <?php endif; ?>
    </div>

    <footer class="bg-dark text-white py-5 mt-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5">
                <div class="col-md-4 mb-5">
                    <h5><a href="https://learn.microsoft.com/en-us/power-platform/" target="_blank" class="nav-link text-white">Microsoft Power Platform dokumentace</a></h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="https://learn.microsoft.com/en-us/power-bi/" target="_blank" class="nav-link p-0 text-white">Power BI</a></li>
                        <li class="nav-item mb-2"><a href="https://learn.microsoft.com/en-us/power-apps/" target="_blank" class="nav-link p-0 text-white">Power Apps</a></li>
                        <li class="nav-item mb-2"><a href="https://learn.microsoft.com/en-us/power-automate/" target="_blank" class="nav-link p-0 text-white">Power Automate</a></li>
                        <li class="nav-item mb-2"><a href="https://learn.microsoft.com/en-us/power-pages/" target="_blank" class="nav-link p-0 text-white">Power Pages</a></li>
                        <li class="nav-item mb-2"><a href="https://learn.microsoft.com/en-us/microsoft-copilot-studio/" target="_blank" class="nav-link p-0 text-white">Copilot Studio</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>Kontaktní údaje</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2"><a href="mailto:someone@example.com" class="nav-link p-0 text-white"><i class="bi bi-envelope-fill"></i> Email: someone@example.com</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white"><i class="bi bi-telephone-fill"></i> Telefon: +420 111 111 111</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white"><i class="bi bi-instagram"></i> Instagram</a></li>
                        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-white"><i class="bi bi-facebook"></i> Facebook</a></li>
                    </ul>
                </div>
            </div>
            <p class="mt-4">&copy;2025 Lucie Matějková</p>
        </div>
    </footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>

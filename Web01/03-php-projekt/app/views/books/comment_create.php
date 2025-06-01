<?php
require_once '../../models/Database.php';
require_once '../../models/Comment.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Kontrola, zda je uživatel přihlášen
if (!isset($_SESSION['user_id'])) {
    header('Location: ../auth/login.php');
    exit;
}

$userId = $_SESSION['user_id'];
$username = $_SESSION['username'];
$bookId = $_GET['book_id'] ?? null;

if (!$bookId) {
    echo "Nebyla vybrána žádná kniha.";
    exit;
}

$db = (new Database())->getConnection();
$commentModel = new Comment($db);

$errors = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = trim($_POST['content']);

    if (empty($content)) {
        $errors[] = 'Obsah komentáře nesmí být prázdný.';
    }

    if (empty($errors)) {
        $created = $commentModel->add($bookId, $userId, $content);
        if ($created) {
            $success = 'Komentář byl úspěšně přidán.';
            header("Location: comments.php?book_id=$bookId"); // přesměrování zpět na výpis
            exit;
        } else {
            $errors[] = 'Chyba při ukládání komentáře.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Přidat komentář</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="../../controllers/books_list.php">Knihovna</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="../books/book_create.php">Přidat knihu</a></li>
                <li class="nav-item"><a class="nav-link" href="../../controllers/books_list.php">Výpis knih</a></li>
                <?php if (isset($_SESSION['username'])): ?>
                    <li class="nav-item"><a class="nav-link" href="../books/books_edit_delete.php">Editace a mazání</a></li>
                    
                <?php endif; ?>
            </ul>
            <ul class="navbar-nav ms-auto">
                <?php if (isset($_SESSION['username'])): ?>
                    <li class="nav-item"><span class="nav-link text-white">Přihlášen jako: <strong><?= htmlspecialchars($_SESSION['username']) ?></strong></span></li>
                    <li class="nav-item"><a class="nav-link" href="../controllers/logout.php">Odhlásit se</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="../auth/login.php">Přihlášení</a></li>
                    <li class="nav-item"><a class="nav-link" href="../auth/register.php">Registrace</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-4">
    <h1>Přidat komentář ke knize</h1>

    <?php if ($errors): ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $e): ?>
                <div><?= htmlspecialchars($e) ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <form action="" method="post">
        <div class="mb-3">
            <label for="content" class="form-label">Obsah komentáře:</label>
            <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Přidat komentář</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
require_once '../../models/Database.php';
require_once '../../models/Book.php';
require_once '../../models/Comment.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$bookId = $_GET['book_id'] ?? null;
if (!$bookId) {
    echo "Nebyla vybrána žádná kniha.";
    exit;
}


$db = (new Database())->getConnection();

// Získání knihy
$bookModel = new Book($db);
$book = $bookModel->getById($bookId);

// Získání komentářů
$commentModel = new Comment($db);
$comments = $commentModel->getByBookId($bookId);

$currentUserId = $_SESSION['user_id'] ?? null;
$isAdmin = $_SESSION['role'] ?? '' === 'admin'; // role admin v session

?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <title>Komentáře ke knize</title>
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
                    <li class="nav-item"><a class="nav-link" href="../../controllers/logout.php">Odhlásit se</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="../auth/login.php">Přihlášení</a></li>
                    <li class="nav-item"><a class="nav-link" href="../auth/register.php">Registrace</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<div class="container">

    <?php if (!empty($book)): ?>
        <h2>Detail knihy</h2>
        <table class="table table-bordered table-hover">
            <thead class="table-primary">
                <tr>
                    <th>ID</th><th>Název</th><th>Autor</th><th>Kategorie</th><th>Rok</th><th>Cena</th><th>ISBN</th><th>ID uživatele</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= htmlspecialchars($book['id']) ?></td>
                    <td><?= htmlspecialchars($book['title']) ?></td>
                    <td><?= htmlspecialchars($book['author']) ?></td>
                    <td><?= htmlspecialchars($book['category']) ?></td>
                    <td><?= htmlspecialchars($book['year']) ?></td>
                    <td><?= number_format($book['price'], 2, ',', ' ') ?> Kč</td>
                    <td><?= htmlspecialchars($book['isbn']) ?></td>
                    <td><?= htmlspecialchars($book['user_id']) ?></td>
                </tr>
            </tbody>
        </table>
    <?php endif; ?>

    
<div class="mt-4">
    <h2>Komentáře ke knize</h2>

    <?php if (isset($_SESSION['username'])): ?>
        <a href="../books/comment_create.php?book_id=<?= $bookId ?>" class="btn btn-info mb-3">Přidat komentář</a>
    <?php endif; ?>

    <?php if (!empty($comments)): ?>
        <div class="list-group">
            <?php foreach ($comments as $comment): ?>
                <div class="list-group-item mb-3">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($comment['id']) ?>">
                        <div>
                            <strong><?= htmlspecialchars($comment['username']) ?></strong>
                            <small class="text-muted ms-2"><?= htmlspecialchars($comment['created_at']) ?></small>
                        </div>
                        <?php
                            $currentUserId = $_SESSION['user_id'] ?? null;
                            $isAdmin = ($_SESSION['role'] ?? '') === 'admin';
                            $ownsComment = $currentUserId == $comment['user_id'];
                        ?>
                        <?php if ($ownsComment || $isAdmin): ?>
                            <div>
                                <a href="../../controllers/comment_delete.php?id=<?= $comment['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Opravdu chcete smazat tento komentář?')">Smazat</a>
                            </div>
                        <?php endif; ?>
                    </div>
                    <p class="mb-0"><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-info">Žádné komentáře</div>
    <?php endif; ?>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
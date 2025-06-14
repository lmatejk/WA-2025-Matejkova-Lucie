<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Výpis knih</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Knihovna</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Přepnout navigaci">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="../views/books/book_create.php">Přidat knihu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Výpis knih</a>
                        </li>
                        
                        <?php if (isset($_SESSION['username'])): ?>
                            <li class="nav-item">
                            <a class="nav-link" href="../views/books/books_edit_delete.php?user_id=<?= htmlspecialchars($_SESSION['user_id']) ?>">Editace a mazání</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                    
                        
                    <ul class="navbar-nav ms-auto">
                        <?php if (isset($_SESSION['username'])): ?>
                            <li class="nav-item">
                                <span class="nav-link text-white">Přihlášen jako: <strong><?= htmlspecialchars($_SESSION['username']) ?></strong></span>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../controllers/logout.php">Odhlásit se</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="../views/auth/login.php">Přihlášení</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../views/auth/register.php">Registrace</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
    </nav>

    <div class="container">
            <h2>Výpis knih</h2>
            <?php if(!empty($books)): ?>
                <h3>Tabulkový výpis knih</h3>
                <table class="table table-bordered table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th>Název</th>
                            <th>Autor</th>
                            <th>Kategorie</th>
                            <th>Rok</th>
                            <th>Cena</th>
                            <th>ISBN</th>
                            <th>user ID</th>
                            <th>Komentáře</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($books as $book): ?>
                            <tr>
                                <td><?= htmlspecialchars($book['title']) ?></td>
                                <td><?= htmlspecialchars($book['author']) ?></td>
                                <td><?= htmlspecialchars($book['category']) ?></td>
                                <td><?= htmlspecialchars($book['year']) ?></td>
                                <td><?= htmlspecialchars($book['price']) ?></td>
                                <td><?= htmlspecialchars($book['isbn']) ?></td>
                                <td><?= htmlspecialchars($book['user_id']) ?></td>
                                <td><a href="../views/books/comments.php?book_id=<?= urlencode($book['id']) ?>">Komentáře</a></td>
                                <?php  $_SESSION['book_id'] = $book['id'];?>

                            </tr>    
                        <?php endforeach; ?>    
                    </tbody>


                </table>
            <?php else: ?>
                <div class="alert alert-info">Žádná kniha nebyla nalezena</div>
            <?php endif;?>       
        </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
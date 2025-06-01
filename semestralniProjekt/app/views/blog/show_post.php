<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$postId = $_GET['id'] ?? null;
if (!$postId) {
    echo "Nebyl vybrán žádný příspěvek.";
    exit;
}


?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Příspěvek</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="../styles/styles.css">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark navbar-general mb-4 sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="../views/other/home.php"><img src="../assets/images/logo_wa.png" alt="logo" style="width: 50px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Přepnout navigaci">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../views/mainContent/powerBI.php">Power BI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../views/mainContent/powerApps.php">Power Apps</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../views/mainContent/powerAutomate.php">Power Automate</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../views/mainContent/powerPages.php">Power Pages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../views/mainContent/copilotStudio.php">Copilot Studio</a>
                    </li>    
                    <li class="nav-item">
                        <a class="nav-link" href="../controllers/posts_list.php">Blog</a>
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
        <?php if ($post): ?>
            <div class="card mb-4 card-general">
                <div class="card-body">
                    <h2 class="card-title"><?= htmlspecialchars($post['title']) ?></h2>
                    <p class="card-text"><?= nl2br(htmlspecialchars($post['content'])) ?></p>
                </div>
                <div class="card-footer text-muted d-flex justify-content-between">
                    
                    <span>Autor: <?= htmlspecialchars($post['username']) ?></span>

                    <?php if (isset($_SESSION['user_id']) && ($_SESSION['user_id'] === $post['user_id'] || ($_SESSION['role'] ?? '') === 'admin')): ?>
                        <div class="d-flex gap-2">
                            <a href="../views/blog/post_edit_delete.php?id=<?= urlencode($post['id']) ?>" class="btn btn-general btn-sm">
                                <i class="bi bi-pencil-fill"></i> Upravit
                            </a>
                            <a href="../controllers/post_delete.php?id=<?= urlencode($post['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Opravdu chcete smazat tento příspěvek?')">
                                <i class="bi bi-trash"></i> Smazat
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <h4>Komentáře</h4>
                        
            <?php if (isset($_SESSION['user_id'])): ?>
                    <div class="mb-3">
                        
                <form action="../controllers/comment_create.php" method="post">
                    <input type="hidden" name="post_id" value="<?= htmlspecialchars($post['id']) ?>">
                    <input type="hidden" name="category_id" value="<?= htmlspecialchars($post['category_id'] ?? '') ?>">
                    <div class="mb-2">
                        <textarea name="content" class="form-control" rows="3" placeholder="Napište svůj komentář..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-general">
                        <i class="bi bi-chat-dots"></i> Přidat komentář
                    </button>
                </form>

                    </div>
                <?php endif; ?>



                <?php if (!empty($comments)): ?>
                    <?php foreach ($comments as $comment): ?>
                        <div class="card mb-2">
                            <div class="card-body">
                                <p class="card-text"><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
                                
                                <small class="text-muted">Autor: <?= htmlspecialchars($comment['username']) ?></small><br>
                                
                                <?php if (isset($_SESSION['user_id']) && ($_SESSION['user_id'] === $comment['user_id'] || ($_SESSION['role'] ?? '') === 'admin')): ?>
                                    <form action="../controllers/comment_delete.php" method="post" onsubmit="return confirm('Opravdu chcete smazat tento komentář?')" style="margin: 0;">
                                        <input type="hidden" name="comment_id" value="<?= htmlspecialchars($comment['id']) ?>">
                                        <input type="hidden" name="post_id" value="<?= htmlspecialchars($post['id']) ?>">
                                        <input type="hidden" name="category_id" value="<?= htmlspecialchars($post['category_id']) ?>">
                                        
                                        <input type="hidden" name="action" value="delete">
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash3-fill"></i> Smazat
                                        </button>
                                    </form>
                                <?php endif; ?>

                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="alert alert-info"><i class="bi bi-info-circle"></i> Zatím žádné komentáře.</div>
                <?php endif; ?>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

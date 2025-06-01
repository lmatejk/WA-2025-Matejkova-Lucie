<?php
require_once '../../models/Database.php';
require_once '../../models/Post.php';
require_once '../../models/Comment.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Příspěvek</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/9000.0.1/themes/prism-coy.min.css" rel="stylesheet" />
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
                        <a class="nav-link" href="../blog/blog.php">Blog</a>
                    </li>    
                    <li class="nav-item">
                        <a class="nav-link" href="../other/qa.php">Q&A</a>
                    </li>    
                </ul>
                    <ul class="navbar-nav ms-auto">
                        <?php if (isset($_SESSION['username'])): ?>
                            <li class="nav-item">
                                <span class="nav-link text-white"><i class="bi bi bi-person-circle "></i> <strong><?= htmlspecialchars($_SESSION['username']) ?></strong></span>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../../controllers/logout.php">Odhlásit se</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="../../views/auth/login.php">Přihlášení</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../../views/auth/register.php">Registrace</a>
                            </li>
                        <?php endif; ?>
                        <li>
                            <div class="ms-auto">
                                <button id="toggle-theme" class="btn btn-outline-secondary">Přepnout téma</button>
                            </div>
                        </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="">
                    
                        <div class="">
                        <h2><?= htmlspecialchars($comment['title']) ?></h2>
                        </div>
                        <div class="">
                            <p>Text</p>


                            
                        </div>
                   
                </div>
            </div>
        
<?php if (!empty($comments)): ?>
    <div class="card mt-4">
        <div class="card-header bg-primary text-white">
            <i class="bi bi-chat-dots-fill"></i> Komentáře
        </div>
        <ul class="list-group list-group-flush">
            <?php foreach ($comments as $comment): ?>
                <li class="list-group-item">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h6 class="mb-1">
                                <i class="bi bi-person-circle text-secondary"></i>
                                <?= htmlspecialchars($comment['author']) ?>
                            </h6>
                            <p class="mb-1"><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
                            <small class="text-muted">
                                <i class="bi bi-clock"></i> <?= htmlspecialchars($comment['created_at']) ?>
                            </small>
                        </div>
                        <div class="text-end">
                            <?php
                                $currentUserId = $_SESSION['user_id'] ?? null;
                                $isAdmin = ($_SESSION['role'] ?? '') === 'admin';
                                $ownsComment = $currentUserId == $comment['user_id'];

                                if ($isAdmin || $ownsComment):
                            ?>
                                <a href="?edit_comment=<?= $comment['id'] ?>" class="btn btn-sm btn-outline-primary me-1">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="../../controllers/comment_delete.php?id=<?= $comment['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Opravdu chcete smazat tento komentář?');">
                                    <i class="bi bi-trash"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php else: ?>
    <div class="alert alert-info mt-4">
        <i class="bi bi-info-circle"></i> Žádné komentáře. Buďte první, kdo jej napíše!
    </div>
<?php endif; ?>



    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
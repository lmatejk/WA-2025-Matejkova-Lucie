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
    <title>Blog</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" />
    
    <!-- custom style-->
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
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
        <div class="container">
            <h1><img style="width: 150px;" src="../assets/images/powerPlatformLogo.png" alt="Power Platform Logo">Blog</h1>
        </div>   
        <p>Podělete se o své nápady a sdílejte zkušenosti. Můžete klást otázky a ptát se ostatních, v komentářích Vám určitě někdo pomůže. 
            <br><b>Nejlepší cesta k pokroku je pomáhat si navzájem a učit se od sebe.</b></p>
        <?php if (isset($_SESSION['username'])): ?>
            <button class="btn btn-general">
                <a class="nav-link" href="../views/blog/post_create.php">Přidat příspěvek</a>
            </button> 
        <?php endif; ?>
        <br><br>

        <div class="container">
            <?php if(!empty($posts)): ?>
                <h3>Příspěvky</h3>

                <div class="row row-cols-1 row-cols-md-2 g-4">
                    <?php foreach($posts as $post): ?>
                        <div class="col">
                            <div class="card h-100 card-general">
                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($post['title']) ?></h5>
                                    <p class="card-text">
                                        <?= htmlspecialchars(mb_substr($post['content'], 0, 150)) ?>...
                                    </p>
                                    
                                </div>
                                <div class="card-footer d-flex justify-content-between align-items-center">
                                    
                                    <a href="../controllers/show_post_comments.php?id=<?= urlencode($post['id']) ?>" class="btn btn-general btn-sm">
                                        Zobrazit více
                                    </a>
                                    <small class="text-muted">Autor: <?= htmlspecialchars($post['username']) ?></small>
                                <?php if(isset($_SESSION['user_id']) && ($_SESSION['user_id'] == $post['user_id'] || $_SESSION['role']==='admin')): ?>
                                <div class="d-flex gap-2">
                                    <a href="../controllers/post_delete.php?id=<?= urlencode($post['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Opravdu chcete smazat tento příspěvek?')">
                                        <i class="bi bi-trash3-fill"></i>
                                    </a>
                                </div>
                            <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="alert alert-danger">Žádný příspěvek</div>
            <?php endif;?>       
        </div>
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
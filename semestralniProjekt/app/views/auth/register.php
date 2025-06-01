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
    <title>Registrace</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/9000.0.1/themes/prism-coy.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" />
    
    <!-- custom style-->
    <link rel="stylesheet" href="../../styles/styles.css">
</head>
<body>
 <nav class="navbar navbar-expand-lg navbar-dark navbar-general mb-4 sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="../other/home.php">logo</a>
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
                        <a class="nav-link" href="../../controllers/posts_list.php">Blog</a>
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
                                <a class="nav-link" href="../auth/login.php">Přihlášení</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Registrace</a>
                            </li>
                        <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

<div class="container-fluid container-light-mode">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-general">
                <div class="card-header card-header-general text-white text-center">
                    <h2>Registrace uživatele</h2>
                </div>
                <div class="card-body">
                    <form id="registrationForm" action="../../controllers/register.php" method="post" >
                        <div class="mb-3">
                            <label for="username" class="form-label">Uživatelské jméno:</label>
                            <input type="text" id="username" name="username" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail:</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Jméno (nepovinné):</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="surname" class="form-label">Příjmení (nepovinné):</label>
                            <input type="text" id="surname" name="surname" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Heslo:</label>
                            <input type="password" id="password" name="password" class="form-control"
                                   pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$"
                                   title="Min. 8 znaků, 1 velké písmeno a 1 číslo" required>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirm" class="form-label">Potvrzení hesla:</label>
                            <input type="password" id="password_confirm" name="password_confirm" class="form-control" required>
                            <div id="passwordMatchMessage" class="form-text text-danger d-none">
                                Hesla se neshodují.
                            </div>
                        </div>

                        

                        <button type="submit" class="btn btn-general w-100">Registrovat se</button>
                    </form>
                </div>
            </div>
        </div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Kontrola hesel v JS -->
<script>
    const form = document.getElementById('registrationForm');
    const password = document.getElementById('password');
    const confirm = document.getElementById('password_confirm');
    const message = document.getElementById('passwordMatchMessage');

    form.addEventListener('submit', function (e) {
        if (password.value !== confirm.value) {
            e.preventDefault();
            message.classList.remove('d-none');
        } else {
            message.classList.add('d-none');
        }
    });
</script>

<!-- Přepínání režimu light/dark -->
<script>
    document.getElementById("toggle-theme").addEventListener("click", () => {
    document.body.classList.toggle("dark-mode");
    const container = document.getElementById("theme-container");
    container.classList.toggle("dark-mode");
    container.classList.toggle("light-mode");

    // Optional: toggle card + card-header styling
    document.querySelectorAll('.card').forEach(c => c.classList.toggle('dark-mode'));
    document.querySelectorAll('.card-header').forEach(c => c.classList.toggle('dark-mode'));
  });
</script>

</body>
</html>
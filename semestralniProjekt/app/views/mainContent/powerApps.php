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
    <title>Power Apps</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" />
    
    <!-- custom style-->
    <link rel="stylesheet" href="../../styles/styles.css">
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-powerApps mb-4 sticky-top">
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
                        <a class="nav-link" href="../../controllers/posts_list.php">Blog</a>
                    </li>    
   
                </ul>
                <ul class="navbar-nav ms-auto">
                     
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
                </ul>
            </div>
        </div>
    </nav>

    

    <div class="container">
        <h1><img style="width: 150px;" src="../../assets/images/powerApps.svg" alt="Power Platform Logo"> Power Apps</h1>
    </div>    

    <div class="container">
    <p>    
        Power Apps umožňují vytvářet jednoduché aplikace pro podnik. Fungují pomocí vizuálního rozhraní “drag-and-drop”. 
        Šablony a jednoduché uživatelské rozhraní proto zaručuje, že není vůbec těžké aplikaci navrhnout. Návrh velmi připomíná 
        PowerPoint, tudíž i noví uživatelé se rychle rozirentují.

    </p>

    <p>
        Power Apps jde, jako ostatní aplikace Power Platfrom, připojit k velké škále zdrojů a brát z nich data a také je tam ukládat.
    </p>
    
    <h3>Výhody Power Apps</h3>
    <p>
        Hlavní výhoda použití je minimalizace chyb. Jednotlivá pole ve vytvořené aplikaci se uloží až po kontrole 
        formátu. To pak může ulehčit práci při čištění dat v průběhu vytváření reportů.

    </p>

    <p>
        Aplikace je možné vytvářet jak pro interní tak externí uživatele. Protože aplikaci může vytvořit i někdo, kdo reálně 
        pracuje v daném oboru, aplikace má všechno, co člověk, který s ní pracuje potřebuje. Power Apps takto odstraňují 
        překažku v komunikace mezi IT a odborným pracovníkem v daném oboru.

    </p>

        <div class="card p-3">
            <h3>Uživatelské rozhraní</h3>
            <img src="../../assets/images/powerapps_app.png" alt="Uživateské rozhraní Power Apps">
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
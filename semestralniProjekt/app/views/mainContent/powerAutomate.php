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
    <title>Power Automate</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/9000.0.1/themes/prism-coy.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" />
    
    <!-- custom style-->
    <link rel="stylesheet" href="../../styles/styles.css">
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-powerAutomate mb-4 sticky-top">
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
        <h1><img style="width: 150px;" src="../../assets/images/powerAutomate.png" alt="Power Platform Logo"> Power Automate</h1>
    </div>    

<div class="container">
   

    <p>
       Power Automate, dříve Microsoft Flow, slouží k automatizaci opakujících se procesů v různých 
       aplikacích a službách. Jeho hlavní výhodou je, že šetří čas, snižuje chybovost a zvyšuje produktivitu práce.

    </p>

    <h3>Flows (toky)</h3>
    <p>
        Základem jsou toky (flows). Na uživatelském rozhraní jsou to bloky, které na sebe napojujeme. 
        Je možné využít i Power Fx (dříve Workflow Definition Language), ale především používá stavební bloky.
        Uživatel výtváří z bloků toky (flows), které se za sebou spouští tak, jak uživatel definoval.

    </p>

    <h3>Verze Power Automate</h3>
    <p>
        Opět existuje desktop a online verze. Power Automate Online se většinou spouští, 
        pokud se něco stane na cloudu (například příchozí email). Power Automate desktop umožňuje 
        vytvořit RPA (Robotic Process Automation), což jsou roboti kteří jsou schopni pracovat v desktopových 
        aplikacích a napodobovat lidskou práci. V tocích můžeme také využít integrovaný AI Builder. 
        Ten je pak schopný například analyzovat data a poskytovat predikce.

    </p>
    <p>
        Power Automate je využívaný pro automatizaci činností v dalších aplikacích Power Platform a je díky tomu jednoduché vše propojit. 
    </p>

        <div class="card p-3">
            <h3>Uživatelské rozhraní</h3>
            <img src="../../assets/images/powerautomate_app.png" alt="Uživateské rozhraní Power Automate">
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
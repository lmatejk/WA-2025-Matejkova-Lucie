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
    <title>Home</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" />
    
    <!-- custom style-->
    <link rel="stylesheet" href="../../styles/styles.css">
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-general mb-4 sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="../../assets/images/logo_wa.png" alt="logo" style="width: 50px;"></a>
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
        <h1><img style="width: 150px;" src="../../assets/images/powerPlatformLogo.png" alt="Power Platform Logo"> Power Platform</h1>
        
        <p>
            Power Platform je moderní ‘low-code’ platforma od společnosti Microsoft, která umožňuje běžným zaměstnancům ve 
            firmách vytvářet různé nástroje bez znalosti programování. Toto sníží zatížení IT oddělení a umožní rychlejší 
            reakci na rychle měnící se situaci v podniku a jeho potřeby digitalizace. 
            Power platform je vhodné využít, pokud používáme i další produkty Microsoft jako 
            například Dynamics 365 a Microsoft 365. Díky jejich integraci je možná efektivní správa a jejich sdílení.
        </p>
        
        <p>
            Na Microsoft Build 2025 bylo představeno několik zlepšení a novinek v některých aplikacích a 
            komponentech Power Platform. (zmínka je vždy u dané kapitoly o produktu/komponentu)

        </p>
        
        <h3>Aplikace</h3>
        <br>
        <div class="row g-3">
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100">
                    <img src="../../assets/images/powerBI.png" class="card-img-top p-2" alt="Power BI logo">
                    <div class="card-body">
                        <h5 class="card-title">Power BI</h5>
                        <p class="card-text">Výroba reportů a vizualizace dat.</p>
                        <a href="../mainContent/powerBI.php" class="btn btn-primary">Power BI</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100">
                    <img src="../../assets/images/powerApps.svg" class="card-img-top p-2" alt="Power Apps logo">
                    <div class="card-body">
                        <h5 class="card-title">Power Apps</h5>
                        <p class="card-text">Vytváření jednoduchých aplikací.</p>
                        <a href="../mainContent/powerApps.php" class="btn btn-primary">Power Apps</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100">
                    <img src="../../assets/images/powerAutomate.png" class="card-img-top p-2" alt="Power Automate logo">
                    <div class="card-body">
                        <h5 class="card-title">Power Automate</h5>
                        <p class="card-text">Automatizace procesů a úkolů.</p>
                        <a href="../mainContent/powerAutomate.php" class="btn btn-primary">Power Automate</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100">
                    <img src="../../assets/images/powerPages.svg" class="card-img-top p-2" alt="Power Pages logo">
                    <div class="card-body">
                        <h5 class="card-title">Power Pages</h5>
                        <p class="card-text">Tvorba webových stránek a portálů.</p>
                        <a href="../mainContent/powerPages.php" class="btn btn-primary">Power Pages</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100">
                    <img src="../../assets/images/copilotStudio.svg" class="card-img-top p-2" alt="Copilot Studio logo">
                    <div class="card-body">
                        <h5 class="card-title">Copilot Studio</h5>
                        <p class="card-text">Tvorba AI chatbotů a asistencí.</p>
                        <a href="../mainContent/copilotStudio.php" class="btn btn-primary">Copilot Studio</a>
                    </div>
                </div>
            </div>
        </div>

        <br><br>
        
        <h3>Komponenty</h3>
        <ul>
            <li><strong>AI Builder</strong></li>
            <p>Tento nástroj umožňuje integraci AI do aplikací. Využívá se hlavně v prostředí Power Apps a Power Automate. 
                Můžeme vytvářet své vlastní modely (včetně jejich trénování) nebo si můžeme vybrat z předpřipravených (např. 
                rozpoznávání textu z obrázku). Je propojený s Copilots and generative AI.</p>
            <li><strong>Connectors</strong></li>
            <p>Umožňují propojení s více než 800 službami - od dalších produktů Microsoft (Dynamics 365, Microsoft 365) 
                až po služby třetích stran (Google, Salesforce). Pokud konektor neexistuje, můžeme si vytvořit vlastní pomocí API.</p>
            <li><strong>Dataverse</strong></li>
            <p>Relační cloudová databáze, která slouží jako centrální úložiště. Je klíčová pro bezpečné a efektivní 
                ukládání a sdílení dat. Díky integrovanosti např. s Power BI je jednoduché vytvářet reporty a jiné vizualizace.</p>
            <li><strong>Power Fx</strong></li>
            <p>Je to jazyk, který slouží pro přidání prvků umělé inteligence do aplikací. Jeho syntaxe je velmi podobná Excelu, 
                tudíž pro většinu není těžké se v něm zorientovat.</p>
            <li><strong>Copilost and generative AI</strong></li>
            <p>Integrace Copilotu do všech aplikací Power Platform. AI pomáhá uživatelům s výtvorem jakýchkoliv aplikací, reportů atd.</p>
        </ul>

        <h3>Výhody využití Power Platform</h3>
        <ul>
            <li>Úspora nákladů</li>
            <li>Zvýšení efektivity</li>
            <li>Zrychlení digitalizace</li>
        </ul>
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
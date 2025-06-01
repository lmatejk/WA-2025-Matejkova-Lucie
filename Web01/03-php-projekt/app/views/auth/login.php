<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Příhlášení</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body class="bg-light">
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="../../controllers/books_list.php">Knihovna</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Přepnout navigaci">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../books/book_create.php">Přidat knihu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../controllers/books_list.php">Výpis knih</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../books/books_edit_delete.php">Editace a mazání</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Přihlášení</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../auth/register.php">Registrace</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h2>Přihlášení uživatele</h2>
                    </div>
                    <div class="card-body">
                        <form id="registrationForm" action="../../controllers/login.php" method="post" enctype="multipart/form-data">   
                            <div class="mb-3">
                                <label for="username" class="form-label">Uživatelské jméno</label>
                                <input type="text" id="username" name="username" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Heslo:</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>

                            <button type="submit" class="btn btn-success w-100">Přihlásit se</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
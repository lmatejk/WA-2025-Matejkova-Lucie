<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přidat rybu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Seznam ryb</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Přepnout navigaci">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="../../views/fishes/fishes_create.php">Přidat rybu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../controllers/fish_list.php">Výpis ryb</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h2>Přidat novou rybu</h2>
                    </div>
                    <div class="card-body">
                        <form action="../../controllers/fishController.php" method="post" enctype="multipart/form-data">
                            
                            <div class="mb-3">
                                <label for="name" class="form-label">Název: <span class="text-danger">*</span></label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="species" class="form-label">Druh: <span class="text-danger">*</span></label>
                                <input type="text" id="species" name="species" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="habitat" class="form-label">Habitat: <span class="text-danger">*</span></label>
                                <input type="text" id="habitat" name="habitat" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="size_cm" class="form-label">Velikost v cm: <span class="text-danger">*</span></label>
                                <input type="number" id="size_cm" name="size_cm" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="diet" class="form-label">Potrava: <span class="text-danger">*</span></label>
                                <input type="text" id="diet" name="diet" class="form-control" required></input>
                            </div>

                            <button type="submit" class="btn btn-success w-100">Uložit záznam ryby</button>
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
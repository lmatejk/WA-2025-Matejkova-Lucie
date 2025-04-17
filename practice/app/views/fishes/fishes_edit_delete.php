
<?php
require_once '../../models/Database.php';
require_once '../../models/Fish.php';

$db = (new Database())->getConnection();
$fishModel = new Fish($db);
$fishes = $fishModel->getAll();

$editMode = false;
$fishToEdit = null;

if (isset($_GET['edit'])) {
    $editId = (int)$_GET['edit'];
    $fishToEdit = $fishModel->getById($editId);
    if ($fishToEdit) {
        $editMode = true;
    }
}
?>

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
                <?php if ($editMode): ?>
            <div class="row justify-content-center mt-5">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-primary text-white text-center">
                        <h2>Upravit rybu: <?= htmlspecialchars($fishToEdit['name']) ?></h2>
                        </div>
                        <div class="card-body">
                            <form action="../../controllers/fish_update.php" method="post">
                                <input type="hidden" name="id" value="<?= $fishToEdit['id'] ?>">
                                <div class="mb-3">
                                    <label class="form-label">ID ryby:</label>
                                    <input type="text" class="form-control" value="<?= $fishToEdit['id'] ?>" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Název:</label>
                                    <input type="text" id="name" name="name" class="form-control" required value="<?= htmlspecialchars($fishToEdit['name']) ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="species" class="form-label">Druh:</label>
                                    <input type="text" id="species" name="species" class="form-control" required value="<?= htmlspecialchars($fishToEdit['species']) ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="habitat" class="form-label">Habitat:</label>
                                    <input type="text" id="habitat" name="habitat" class="form-control" required value="<?= htmlspecialchars($fishToEdit['habitat']) ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="size_cm" class="form-label">Velikost v cm:</label>
                                    <input type="number" id="size_cm" name="size_cm" class="form-control" required value="<?= htmlspecialchars($fishToEdit['size_cm']) ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="diet" class="form-label">Potrava:</label>
                                    <input type="text" id="diet" name="diet" class="form-control" required value="<?= htmlspecialchars($fishToEdit['diet']) ?>">
                                </div>

                                <button type="submit" class="btn btn-success w-100">Uložit změny</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <br>
        <br>
        <?php if (!empty($fishes)): ?>
            <table class="table table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Název</th>
                        <th>Druh</th>
                        <th>Habitat</th>
                        <th>Velikost v cm</th>
                        <th>Potrava</th>
                        <th>Akce</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($fishes as $fish): ?>
                    <tr>
                        <td><?= htmlspecialchars($fish['id']) ?></td>
                        <td><?= htmlspecialchars($fish['name']) ?></td>
                        <td><?= htmlspecialchars($fish['species']) ?></td>
                        <td><?= htmlspecialchars($fish['habitat']) ?></td>
                        <td><?= htmlspecialchars($fish['size_cm']) ?></td>
                        <td><?= htmlspecialchars($fish['diet']) ?> </td>
                        <td>
                            <a href="?edit=<?= $fish['id'] ?>" class="btn btn-sm btn-warning">Upravit</a>
                            <a href="../../controllers/fish_delete.php?id=<?= $fish['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Opravdu chcete smazat tuto knihu?');">Smazat</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        
            <?php else: ?>
            <div class="alert alert-info">Žádná kniha nebyla nalezena.</div>
        <?php endif; ?>
    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
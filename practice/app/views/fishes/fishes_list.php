<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přidat knihu</title>
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
        <h2>Výpis knih</h2>
        <?php if(!empty($fishes)): ?>
            <!-- <h3>Hrubý výpis knih</h3> -->
            <?php // var_dump($books); ?>
            <!-- <h3>Lepší výpis knih</h3> -->
            <pre><?php // print_r($books); ?></pre>
            <h3>Tabulkový výpis ryb</h3>
            <table class="table table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>Název</th>
                        <th>Druh</th>
                        <th>Habitat</th>
                        <th>Velikost v cm</th>
                        <th>Potrava</th>
                        <th>Akce</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($fishes as $fish): ?>
                        <tr>
                            <td><?= htmlspecialchars($fish['name']) ?></td>
                            <td><?= htmlspecialchars($fish['species']) ?></td>
                            <td><?= htmlspecialchars($fish['habitat']) ?></td>
                            <td><?= htmlspecialchars($fish['size_cm']) ?></td>
                            <td><?= htmlspecialchars($fish['diet']) ?></td>
                            <td>
                                <a href="?edit=<?= $fish['id'] ?>" class="btn btn-sm btn-warning">Upravit</a>
                                <a href="../../controllers/fish_delete.php?id=<?= $fish['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Opravdu chcete smazat tuto knihu?');">Smazat</a>
                            </td>
                        </tr>    
                    <?php endforeach; ?>    
                </tbody>


            </table>
         <?php else: ?>
            <div class="alert alert-info">Žádná ryba nebyla nalezena</div>
         <?php endif;?>       
        

    </div>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
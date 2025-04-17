<?php
    require_once '../models/Database.php';
    require_once '../models/Fish.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = (int)$_POST['id'];
        $name = htmlspecialchars($_POST['name']);
        $species = htmlspecialchars($_POST['species']);
        $habitat = htmlspecialchars($_POST['habitat']);
        $size_cm = intval($_POST['size_cm']);
        $diet = htmlspecialchars($_POST['diet']);

        $db = (new Database())->getConnection();
        $fishModel = new Fish($db);

        $success = $fishModel->update(
            $id,
            $name,
            $species,
            $habitat,
            $size_cm,
            $diet
        );

        if ($success) {
            header("Location: ../views/fishes/fishes_edit_delete.php");
            exit();
        } else {
            echo "Chyba při aktualizaci knihy.";
        }
    } else {
        echo "Neplatný požadavek.";
    }
<?php
    require_once '../models/Database.php';
    require_once '../models/Fish.php';

    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];

        $db = (new Database())->getConnection();
        $fishModel = new Fish($db);

        if ($fishModel->delete($id)) {
            header("Location: ../views/fishes/fishes_edit_delete.php");
            exit();
        } else {
            echo "Chyba při mazání knihy.";
        }
    } else {
        echo "Neplatný požadavek.";
    }
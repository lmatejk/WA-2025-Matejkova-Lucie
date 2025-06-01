<?php
    require_once '../models/Database.php';
    require_once '../models/Book.php';

    session_start();

    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $user_id = $_SESSION['user_id'] ?? null;
            if (!$user_id) {
                echo "Uživatel není přihlášen.";
                return;
            }

        $db = (new Database())->getConnection();
        $bookModel = new Book($db);

        if ($bookModel->delete($id)) {
            header("Location: ../views/books/books_edit_delete.php");
            exit();
        } else {
            echo "Chyba při mazání knihy.";
        }
    } else {
        echo "Neplatný požadavek.";
    }
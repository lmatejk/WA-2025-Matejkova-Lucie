<?php
    require_once '../models/Database.php';
    require_once '../models/Book.php';

    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = (int)$_POST['id'];
        $title = htmlspecialchars($_POST['title']);
        $author = htmlspecialchars($_POST['author']);
        $category = htmlspecialchars($_POST['category']);
        $subcategory = !empty($_POST['subcategory']) ? htmlspecialchars($_POST['subcategory']) : null;
        $year = intval($_POST['year']);
        $price = floatval($_POST['price']);
        $isbn = htmlspecialchars($_POST['isbn']);
        $description = htmlspecialchars($_POST['description']);
        $link = htmlspecialchars($_POST['link']);

        $user_id = $_SESSION['user_id'] ?? null;
            if (!$user_id) {
                echo "Uživatel není přihlášen.";
                return;
            }

        $db = (new Database())->getConnection();
        $bookModel = new Book($db);

        
        $stmt = $db->prepare("SELECT user_id FROM books WHERE id = ?");
        $stmt->execute([$id]);
        $book = $stmt->fetch();

        if (!$book || $book['user_id'] != $user_id) {
            // Kniha neexistuje nebo nepatří tomuto uživateli
            echo "Nemáš oprávnění upravovat tuto knihu.";
            exit;
        }

        $success = $bookModel->update(
            $id,
            $title,
            $author,
            $category,
            $subcategory,
            $year,
            $price,
            $isbn,
            $description,
            $link
        );

        if ($success) {
            header("Location: ../views/books/books_edit_delete.php");
            exit();
        } else {
            echo "Chyba při aktualizaci knihy.";
        }
    } else {
        echo "Neplatný požadavek.";
    }
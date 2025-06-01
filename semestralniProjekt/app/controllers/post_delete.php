<?php
    require_once '../models/Database.php';
    require_once '../models/Post.php';

    session_start();

    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $user_id = $_SESSION['user_id'] ?? null;
            if (!$user_id) {
                echo "Uživatel není přihlášen.";
                return;
            }

        $db = (new Database())->getConnection();
        $postModel = new Post($db);

        if ($postModel->deletePost($id)) {
            header("Location: ../controllers/posts_list.php");
            exit();
        } else {
            echo "Chyba při mazání knihy.";
        }
    } else {
        echo "Neplatný požadavek.";
    }
<?php
    require_once '../models/Database.php';
    require_once '../models/Post.php';

    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = (int)$_POST['id'];
        $user_id = $_SESSION['user_id'] ?? null;
            if (!$user_id) {
                echo "Uživatel není přihlášen.";
                return;
            }
        $title = htmlspecialchars($_POST['title']);
        $content = htmlspecialchars($_POST['content']);
            

        $db = (new Database())->getConnection();
        $postModel = new Post($db);

        $success = $postModel->updatePost(
            $id,
            $user_id,
            $content
        );

        if ($success) {
            header("Location: ../../controllers/posts_list.php");
            exit();
        } else {
            echo "Chyba při aktualizaci knihy.";
        }
    } else {
        echo "Neplatný požadavek.";
    }
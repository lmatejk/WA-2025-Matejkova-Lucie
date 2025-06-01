
<?php
require_once '../models/Database.php';
require_once '../models/Comment.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment_id'])) {
    $id = (int)$_POST['comment_id'];
    $user_id = $_SESSION['user_id'] ?? null;

    if (!$user_id) {
        echo "Uživatel není přihlášen.";
        return;
    }

    $db = (new Database())->getConnection();
    $commentModel = new Comment($db);

    if ($commentModel->deleteComment($id)) {
        $postId = $_POST['post_id'] ?? null;
        if ($postId) {
            header("Location: ../controllers/show_post_comments.php?id=" . urlencode($postId));
        } else {
            header("Location: ../views/blog/blog.php");
        }
        exit();
    } else {
        echo "Chyba při mazání komentáře.";
    }
} else {
    echo "Neplatný požadavek.";
}

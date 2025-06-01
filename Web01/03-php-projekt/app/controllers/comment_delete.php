<?php
require_once '../models/Database.php';
require_once '../models/Comment.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    echo "Uživatel není přihlášen.";
    return;
}
$db = (new Database())->getConnection();
$commentModel = new Comment($db);


$commentId = $_GET['id'] ?? null;
if (!$commentId) {
    echo "Nebyl vybrán komentář.";
    exit;
}



// Získání komentáře pro kontrolu oprávnění
$comment = $commentModel->getCommentById($commentId);
if (!$comment) {
    echo "Komentář neexistuje.";
    exit;
}

$currentUserId = $_SESSION['user_id'];
$isAdmin = ($_SESSION['role'] ?? '') === 'admin';

if ($comment['user_id'] != $currentUserId && !$isAdmin) {
    echo "Nemáte oprávnění smazat tento komentář.";
    exit;
}

// Smazání komentáře
if ($commentModel->delete($commentId)) {
    header("Location: ../views/books/comments.php?book_id=" . $comment['book_id']);
    exit;
} else {
    echo "Chyba při mazání komentáře.";
}
?>

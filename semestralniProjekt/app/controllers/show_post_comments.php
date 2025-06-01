<?php
require_once 'PostController.php';

$controller = new PostController();

// id z GET nebo POST
$postId = $_GET['id'] ?? $_POST['post_id'] ?? null;

if (!$postId) {
    echo "Nebyl vybrán žádný příspěvek.";
    exit;
}

$controller->showPostsComments($postId);
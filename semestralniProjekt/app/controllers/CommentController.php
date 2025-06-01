<?php
require_once '../models/Database.php';
require_once '../models/Comment.php';

session_start();

class CommentController {
    private $db;
    private $commentModel;
    

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->commentModel = new Comment($this->db);
    }    
    
    public function createComment() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user_id = $_SESSION['user_id'] ?? null;
            if (!$user_id) {
                echo "Uživatel není přihlášen.";
                return;
            }
            $post_id = htmlspecialchars($_POST['post_id']);
            $category_id = htmlspecialchars($_POST['category_id']);
            $content = htmlspecialchars($_POST['content']);

            // Uložení knihy do DB
            if ($this->commentModel->createComment($user_id, $post_id, $category_id, $content)) {
                header("Location: ../controllers/show_post_comments.php?id=" .urlencode($post_id));
                exit();
            } else {
                echo "Chyba při ukládání knihy.";
            }
        }
    }

    public function listComments() {
        $comments = $this->commentModel->getAllComments();
        include '../views/'; 
    }
}

// Volání metody při odeslání formuláře
$controller = new CommentController();
$controller->createComment();
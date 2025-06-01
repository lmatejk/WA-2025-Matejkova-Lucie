<?php
require_once '../models/Database.php';
require_once '../models/Post.php';
require_once '../models/Comment.php';

session_start();

class PostController {
    private $db;
    private $postModel;
    
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->postModel = new Post($this->db);
    }    
    
    public function createPost() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user_id = $_SESSION['user_id'] ?? null;
            
            if (!$user_id) {
                echo "Uživatel není přihlášen.";
                return;
            }

            $cathegory_id = htmlspecialchars($_POST['category_id']);
            $title = htmlspecialchars($_POST['title']);
            $content = htmlspecialchars($_POST['content']);
            

            if ($this->postModel->createPost($user_id, $cathegory_id, $title, $content)) {
                header("Location: ../controllers/posts_list.php");
                exit();
            } else {
                echo "Chyba při ukládání knihy.";
            }
        }
    }

    public function listPosts() {
        $posts = $this->postModel->getAllPosts();
        include '../views/blog/blog.php'; 
    }

    public function showPostsComments($postId) {
        require_once '../models/Comment.php';

        $commentModel = new Comment($this->db);
        $post = $this->postModel->getPostById($postId);
        $comments = $commentModel->getCommentById($postId);

        include '../views/blog/show_post.php';
    }
}

<?php

class Post {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllPosts() {
        $sql = "SELECT * FROM blog_posts ORDER BY created_at DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    public function getPostById($id) {
        //ziskani jmena uzivatele  a kategorie id
        $sql = "SELECT blog_posts.*, users.username, blog_posts.category_id 
            FROM blog_posts 
            JOIN users ON blog_posts.user_id = users.id 
            WHERE blog_posts.id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    

    public function updatePost($id, $title, $content) {
        $sql = "UPDATE blog_posts
                SET title = :title,
                    content = :content  
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':title' => $title,
            ':content' => $content
            
        ]);
    }

    public function deletePost($id) {
        //smazani komentaru pod prispevkem 
        $sqlc = "DELETE FROM comments WHERE post_id = :post_id";
        $stmtc = $this->db->prepare($sqlc);
        $stmtc->execute([':post_id' => $id]);  
        // smazani prispevku
        $sql = "DELETE FROM blog_posts WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    public function createPost($user_id, $category_id, $title, $content ) {
        $sql = "INSERT INTO blog_posts (
                    user_id, category_id, title, content
                ) VALUES (
                    :user_id, :category_id, :title, :content
                )";
        
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            ':user_id' => $user_id,
            ':category_id' => $category_id,
            ':title' => $title,
            ':content' => $content
        ]);
    }
}
<?php

class Comment {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
 
    public function getCommentById($postId) {
        
        $query = "SELECT comments.*, users.username 
            FROM comments 
            JOIN users ON comments.user_id = users.id 
            WHERE comments.post_id = :post_id
            ORDER BY comments.created_at ASC";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':post_id', $postId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteComment($id) {
        $sql = "DELETE FROM comments WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    public function createComment($user_id, $post_id, $category_id, $content) {

        // Vkládáme i user_id, abychom měli vazbu na uživatele + category_id + post_id
        $sql = "INSERT INTO comments (
                    user_id, post_id, category_id, content
                ) VALUES (
                    :user_id, :post_id, :category_id, :content
                )";
        
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            ':user_id' => $user_id,
            ':post_id' => $post_id,
            ':category_id' => $category_id,
            ':content' => $content
 
        ]);
    }
}
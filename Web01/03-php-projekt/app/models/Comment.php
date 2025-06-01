<?php
class Comment {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getByBookId($bookId) {
        $query = "SELECT c.id, c.content, c.created_at, c.user_id, u.username 
                  FROM comments c 
                  JOIN users u ON c.user_id = u.id 
                  WHERE c.book_id = :book_id 
                  ORDER BY c.created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':book_id', $bookId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function getAllComments() {
        $sql = "SELECT * FROM comments ORDER BY created_at DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }


    public function getCommentById($id) {
        $sql = "SELECT * FROM comments WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function add($bookId, $userId, $content) {
        $query = "INSERT INTO comments (book_id, user_id, content, created_at) 
                  VALUES (:book_id, :user_id, :content, NOW())";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':book_id', $bookId);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':content', $content);
        return $stmt->execute();
    }

    public function update($id, $content) {
        $sql = "UPDATE comments SET content = :content WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':content' => $content
        ]);
    }

    public function delete($id) {
        $sql = "DELETE FROM comments WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}

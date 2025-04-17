<?php

class Fish {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($name, $species, $habitat, $size_cm ,$diet) {
        
        // Dvojtečka označuje pojmenovaný parametr => Místo přímých hodnot se používají placeholdery.
        // PDO je pak nahradí skutečnými hodnotami při volání metody execute().
        // Chrání proti SQL injekci (bezpečnější než přímé vložení hodnot).
        $sql = "INSERT INTO fishes (name, species, habitat, size_cm, diet) 
                VALUES (:name, :species, :habitat, :size_cm, :diet)";
        
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            ':name' => $name,
            ':species' => $species,
            ':habitat' => $habitat,
            ':size_cm' => $size_cm,
            ':diet' => $diet,
        ]);
    }

    public function getAll() {
        $sql = "SELECT * FROM fishes ORDER BY id DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $sql = "SELECT * FROM fishes WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function update($id,$name, $species, $habitat, $size_cm, $diet) {
        $sql = "UPDATE fishes
                SET name = :name,
                    species = :species,
                    habitat = :habitat,
                    size_cm = :size_cm,
                    diet = :diet
                WHERE id = :id";
    
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':name' => $name,
            ':species' => $species,
            ':habitat' => $habitat,
            ':size_cm' => $size_cm,
            ':diet' => $diet
        ]);
    }

    public function delete($id) {
        $sql = "DELETE FROM fishes WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
    
}
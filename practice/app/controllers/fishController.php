<?php
require_once '../models/Database.php';
require_once '../models/Fish.php';

class fishController {
    private $db;
    private $fishModel;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->fishModel = new Fish($this->db);
    }

    public function createFish() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = htmlspecialchars($_POST['name']);
            $species = htmlspecialchars($_POST['species']);
            $habitat = htmlspecialchars($_POST['habitat']);
            $size_cm = intval($_POST['size_cm']);
            $diet = htmlspecialchars($_POST['diet']);

            // Uložení knihy do DB - dočasné řešení, než budeme mít výpis knih
            if ($this->fishModel->create($name, $species, $habitat, $size_cm, $diet)) {
                header("Location: ../controllers/fish_list.php");
                exit();
            } else {
                echo "Chyba při ukládání knihy.";
            }
        }
    }

    public function listFishes() {
        $fishes = $this->fishModel->getAll();
        include '../views/fishes/fishes_list.php'; 
    }
}

// Volání metody při odeslání formuláře
$controller = new fishController();
$controller->createFish();
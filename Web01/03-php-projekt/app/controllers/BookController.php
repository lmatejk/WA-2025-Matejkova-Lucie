<?php
require_once '../models/Database.php';
require_once '../models/Book.php';

session_start();

class BookController {
    private $db;
    private $bookModel;
    

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->bookModel = new Book($this->db);
    }    
    
    public function createBook() {
                // Kontrola, jestli je uživatel přihlášen
        if (!isset($_SESSION['user_id'])) {
            header("Location: ../controllers/books_list.php");
            exit();
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = htmlspecialchars($_POST['title']);
            $author = htmlspecialchars($_POST['author']);
            $category = htmlspecialchars($_POST['category']);
            $subcategory = !empty($_POST['subcategory']) ? htmlspecialchars($_POST['subcategory']) : null;
            $year = intval($_POST['year']);
            $price = floatval($_POST['price']);
            $isbn = htmlspecialchars($_POST['isbn']);
            $description = htmlspecialchars($_POST['description']);
            $link = htmlspecialchars($_POST['link']);

            // Získání ID přihlášeného uživatele
            $user_id = $_SESSION['user_id'];

            // Zpracování nahraných obrázků
            $imagePaths = [];
            if (!empty($_FILES['images']['name'][0])) {
                $uploadDir = '../public/images/';
                foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
                    $filename = basename($_FILES['images']['name'][$key]);
                    $targetPath = $uploadDir . $filename;

                    if (move_uploaded_file($tmp_name, $targetPath)) {
                        $imagePaths[] = '/public/images/' . $filename; // Relativní cesta
                    }
                }
            }

            // Uložení knihy do DB - dočasné řešení, než budeme mít výpis knih
            if ($this->bookModel->create($title, $author, $category, $subcategory, $year, $price, $isbn, $description, $link, $imagePaths, $user_id)) {
                header("Location: ../controllers/books_list.php");
                exit();
            } else {
                echo "Chyba při ukládání knihy.";
            }
        }
    }

    public function listBooks() {
        $books = $this->bookModel->getAll();
        include '../views/books/books_list.php'; 
    }
}

// Volání metody při odeslání formuláře
$controller = new BookController();

// Zavolá pouze pokud šlo o POST request (odeslání formuláře)
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $controller->createBook();
}
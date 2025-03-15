<?php
// 1. Připojení k databázi
    echo "Ahoj, zdravím z PHP souboru. ";
    $x = 500;
    echo $x;

    $servername = "localhost";
    $username = "root"; // Výchozí uživatel XAMPP je "root"
    $password = ""; // XAMPP nemá heslo
    $database = "wa_matejkova_lucie"; // Název tvé databáze

    $conn = new mysqli($servername, $username, $password, $database);

    // Kontrola připojení
    if ($conn->connect_error) {
        die("Připojení selhalo: " . $conn->connect_error);
    }

    // 2. Dotaz do databáze
    $sql = "SELECT id, user_name, user_surname, user_email, user_age, registration_date FROM wa_test";
    $result = $conn->query($sql);

    // 3. Výpis tabulky
    if ($result->num_rows > 0) {
        echo "<table border='1' style='border-collapse: collapse; width: 50%;'>";
        echo "<tr><th>ID</th><th>Jméno</th><th>Příjmení</th><th>Email</th><th>Věk</th><th>Den registrace</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['user_name']}</td>
                    <td>{$row['user_surname']}</td>
                    <td>{$row['user_email']}</td>
                    <td>{$row['user_age']}</td>
                    <td>{$row['registration_date']}</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "Žádné záznamy";
    }

    // 4. Zavření připojení
    $conn->close();
?>
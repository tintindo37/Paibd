<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "szkola";

// Połączenie z bazą danych
$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Połączenie nieudane: " . $conn->connect_error);
}

// Tworzenie tabeli przedmioty
$sql = "CREATE TABLE przedmioty (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nazwa VARCHAR(50) NOT NULL
)";
$conn->query($sql);

// Tworzenie tabeli oceny
$sql = "CREATE TABLE oceny (
    id INT AUTO_INCREMENT PRIMARY KEY,
    uczen_id INT,
    przedmiot_id INT,
    ocena DECIMAL(3, 2),
    FOREIGN KEY (uczen_id) REFERENCES uczniowie(id),
    FOREIGN KEY (przedmiot_id) REFERENCES przedmioty(id)
)";
$conn->query($sql);

echo "Tabele przedmioty i oceny zostały utworzone.";

$conn->close();
?>

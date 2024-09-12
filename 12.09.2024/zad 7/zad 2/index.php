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

// Tworzenie tabeli uczniowie
$sql = "CREATE TABLE uczniowie (
    id INT AUTO_INCREMENT PRIMARY KEY,
    imie VARCHAR(50) NOT NULL,
    nazwisko VARCHAR(50) NOT NULL,
    wiek INT NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabela uczniowie została utworzona.";
} else {
    echo "Błąd przy tworzeniu tabeli: " . $conn->error;
}

$conn->close();
?>

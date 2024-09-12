<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "szkola";

// Utwórz połączenie
$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdź połączenie
if ($conn->connect_error) {
    die("Połączenie nieudane: " . $conn->connect_error);
}

// Dodaj indeks
$sql = "CREATE INDEX idx_nazwisko ON uczniowie(nazwisko)";
if ($conn->query($sql) === TRUE) {
    echo "Indeks na kolumnie 'nazwisko' został utworzony pomyślnie.";
} else {
    echo "Błąd podczas tworzenia indeksu: " . $conn->error;
}

$conn->close();
?>

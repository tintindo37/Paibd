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

// Dodaj kolumnę
$sql = "ALTER TABLE uczniowie ADD adres VARCHAR(255)";
if ($conn->query($sql) === TRUE) {
    echo "Kolumna 'adres' została dodana pomyślnie.";
} else {
    echo "Błąd podczas dodawania kolumny: " . $conn->error;
}

$conn->close();
?>

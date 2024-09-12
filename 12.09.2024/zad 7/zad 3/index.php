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

// Dodawanie rekordów
$sql = "INSERT INTO uczniowie (imie, nazwisko, wiek) VALUES 
    ('Jan', 'Kowalski', 14),
    ('Anna', 'Nowak', 15),
    ('Piotr', 'Zieliński', 16)";

if ($conn->query($sql) === TRUE) {
    echo "Rekordy zostały dodane.";
} else {
    echo "Błąd przy dodawaniu rekordów: " . $conn->error;
}

$conn->close();
?>

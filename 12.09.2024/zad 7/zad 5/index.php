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

// Aktualizacja wieku ucznia o id=2
$sql = "UPDATE uczniowie SET wiek=16 WHERE id=2";

if ($conn->query($sql) === TRUE) {
    echo "Rekord został zaktualizowany.";
} else {
    echo "Błąd przy aktualizacji rekordu: " . $conn->error;
}

$conn->close();
?>

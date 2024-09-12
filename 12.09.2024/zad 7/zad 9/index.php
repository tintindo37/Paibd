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

// Dodawanie oceny dla ucznia o id=1 w przedmiocie o id=2
$sql = "INSERT INTO oceny (uczen_id, przedmiot_id, ocena) VALUES (1, 2, 5.0)";

if ($conn->query($sql) === TRUE) {
    echo "Ocena została dodana.";
} else {
    echo "Błąd przy dodawaniu oceny: " . $conn->error;
}

$conn->close();
?>

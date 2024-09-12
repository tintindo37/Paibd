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

// Usuwanie ucznia o id=3
$sql = "DELETE FROM uczniowie WHERE id=3";

if ($conn->query($sql) === TRUE) {
    echo "Rekord został usunięty.";
} else {
    echo "Błąd przy usuwaniu rekordu: " . $conn->error;
}

$conn->close();
?>

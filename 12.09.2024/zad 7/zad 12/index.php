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

// Usuń tabelę
$sql = "DROP TABLE IF EXISTS przedmioty";
if ($conn->query($sql) === TRUE) {
    echo "Tabela 'przedmioty' została usunięta pomyślnie.";
} else {
    echo "Błąd podczas usuwania tabeli: " . $conn->error;
}

$conn->close();
?>

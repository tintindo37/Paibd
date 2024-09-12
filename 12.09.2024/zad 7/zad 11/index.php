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

// Oblicz średnią ocen
$sql = "SELECT AVG(ocena) AS srednia_ocen FROM oceny WHERE uczen_id = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "Średnia ocen dla ucznia o id=1 wynosi: " . $row["srednia_ocen"];
} else {
    echo "Brak ocen do obliczenia średniej.";
}

$conn->close();
?>

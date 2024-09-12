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

// Zlicz uczniów
$sql = "SELECT COUNT(*) AS liczba_uczniow FROM uczniowie";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "Liczba uczniów w tabeli: " . $row["liczba_uczniow"];
} else {
    echo "Brak uczniów.";
}

$conn->close();
?>

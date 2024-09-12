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

// Przygotowane zapytanie
$stmt = $conn->prepare("INSERT INTO uczniowie (imie, nazwisko, wiek) VALUES (?, ?, ?)");
$stmt->bind_param("ssi", $imie, $nazwisko, $wiek);

// Przypisz wartości i wykonaj zapytanie
$imie = "Marek";
$nazwisko = "Zieliński";
$wiek = 17;
$stmt->execute();

echo "Nowy rekord został dodany pomyślnie.";

$stmt->close();
$conn->close();
?>

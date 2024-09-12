<?php
$servername = "localhost";
$username = "root";
$password = "";

// Tworzenie połączenia
$conn = new mysqli($servername, $username, $password);

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Połączenie nieudane: " . $conn->connect_error);
}

// Tworzenie bazy danych
$sql = "CREATE DATABASE szkola";
if ($conn->query($sql) === TRUE) {
    echo "Baza danych szkola została utworzona.";
} else {
    echo "Błąd przy tworzeniu bazy danych: " . $conn->error;
}

$conn->close();
?>

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

// Pobierz dane
$sql = "SELECT * FROM uczniowie";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $filename = "uczniowie.csv";
    $file = fopen($filename, "w");
    
    // Nagłówki CSV
    $headers = ["ID", "Imię", "Nazwisko", "Wiek"];
    fputcsv($file, $headers);
    
    // Wiersze danych
    while ($row = $result->fetch_assoc()) {
        fputcsv($file, $row);
    }
    
    fclose($file);
    echo "Dane zostały wyeksportowane do pliku CSV.";
} else {
    echo "Brak danych do eksportu.";
}

$conn->close();
?>

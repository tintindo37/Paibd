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
$sql = "SELECT uczniowie.imie, uczniowie.nazwisko, oceny.ocena
        FROM uczniowie
        JOIN oceny ON uczniowie.id = oceny.uczen_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Imię</th><th>Nazwisko</th><th>Ocena</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["imie"]. "</td><td>" . $row["nazwisko"]. "</td><td>" . $row["ocena"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Brak ocen dla uczniów.";
}

$conn->close();
?>

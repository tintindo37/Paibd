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

// Wyszukaj uczniów
$sql = "SELECT * FROM uczniowie WHERE nazwisko LIKE 'K%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>ID</th><th>Imię</th><th>Nazwisko</th><th>Wiek</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["imie"]. "</td><td>" . $row["nazwisko"]. "</td><td>" . $row["wiek"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Brak uczniów z nazwiskiem zaczynającym się na literę 'K'.";
}

$conn->close();
?>

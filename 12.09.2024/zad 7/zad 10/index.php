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

// Pobierz oceny ucznia
$sql = "SELECT oceny.*, przedmioty.nazwa AS przedmiot FROM oceny JOIN przedmioty ON oceny.przedmiot_id = przedmioty.id WHERE uczen_id = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>ID</th><th>Przedmiot</th><th>Ocena</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["przedmiot"]. "</td><td>" . $row["ocena"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Brak ocen dla ucznia o id=1.";
}

$conn->close();
?>

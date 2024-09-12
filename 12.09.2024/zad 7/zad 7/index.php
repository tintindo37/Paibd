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

// Wyszukiwanie uczniów, którzy mają więcej niż 15 lat
$sql = "SELECT * FROM uczniowie WHERE wiek > 15";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Imię</th>
                <th>Nazwisko</th>
                <th>Wiek</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["id"]."</td>
                <td>".$row["imie"]."</td>
                <td>".$row["nazwisko"]."</td>
                <td>".$row["wiek"]."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Brak rekordów.";
}

$conn->close();
?>

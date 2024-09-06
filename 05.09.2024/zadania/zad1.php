<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "twoja_baza_danych";

    // Utworzenie połączenia
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Sprawdzenie połączenia
    if (!$conn) {
        die("Błąd połączenia: " . mysqli_connect_error());
    }
    echo "Połączenie udane";
?>

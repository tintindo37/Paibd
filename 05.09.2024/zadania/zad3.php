<?php
$sql = "SELECT id, nazwa, email FROM users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["id"]. " - Nazwa: " . $row["nazwa"]. " - Email: " . $row["email"]. "<br>";
    }
} else {
    echo "0 wyników";
}
?>

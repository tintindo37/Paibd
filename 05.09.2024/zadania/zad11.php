<form action="filter.php" method="post">
    Kryterium: <input type="text" name="kryterium"><br>
    <input type="submit">
</form>

<?php
$kryterium = $_POST['kryterium'];

$sql = "SELECT * FROM users WHERE nazwa LIKE '%$kryterium%'";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)) {
    echo "ID: " . $row["id"]. " - Nazwa: " . $row["nazwa"]. " - Email: " . $row["email"]. "<br>";
}
?>

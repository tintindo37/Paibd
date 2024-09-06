<?php
$sql = "SELECT users.id, users.nazwa, orders.order_id FROM users JOIN orders ON users.id = orders.user_id";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)) {
    echo "ID: " . $row["id"]. " - Nazwa: " . $row["nazwa"]. " - Order ID: " . $row["order_id"]. "<br>";
}
?>

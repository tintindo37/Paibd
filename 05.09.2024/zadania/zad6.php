<?php
$id = $_GET['id'];

$sql = "DELETE FROM users WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    echo "Rekord został usunięty";
} else {
    echo "Błąd: " . $sql . "<br>" . mysqli_error($conn);
}
?>

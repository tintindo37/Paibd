<form action="update.php" method="post">
    ID: <input type="text" name="id"><br>
    Nowa nazwa: <input type="text" name="nazwa"><br>
    <input type="submit">
</form>
<?php
$id = $_POST['id'];
$nazwa = $_POST['nazwa'];

$sql = "UPDATE users SET nazwa='$nazwa' WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    echo "Rekord został zaktualizowany";
} else {
    echo "Błąd: " . $sql . "<br>" . mysqli_error($conn);
}
?>

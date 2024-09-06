<form action="insert.php" method="post">
    Nazwa: <input type="text" name="nazwa"><br>
    Email: <input type="text" name="email"><br>
    <input type="submit">
</form>
<?php
$nazwa = $_POST['nazwa'];
$email = $_POST['email'];

$sql = "INSERT INTO users (nazwa, email) VALUES ('$nazwa', '$email')";

if (mysqli_query($conn, $sql)) {
    echo "Nowy rekord został dodany";
} else {
    echo "Błąd: " . $sql . "<br>" . mysqli_error($conn);
}
?>

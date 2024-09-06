<?php
$stmt = $conn->prepare("INSERT INTO users (nazwa, email) VALUES (?, ?)");
$stmt->bind_param("ss", $nazwa, $email);

$nazwa = $_POST['nazwa'];
$email = $_POST['email'];
$stmt->execute();

echo "Nowy rekord został dodany";

$stmt->close();
?>

<?php
$conn1 = mysqli_connect($servername, $username, $password, "baza1");
$conn2 = mysqli_connect($servername, $username, $password, "baza2");

// Przełączanie się między bazami
mysqli_select_db($conn1, "baza1");
mysqli_select_db($conn2, "baza2");
?>

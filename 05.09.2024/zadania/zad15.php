<?php
// Przykład danych z bazy danych
$nazwa = "<script>alert('XSS');</script>";
$email = "jan.kowalski@example.com";

// Zabezpieczanie danych przed wyświetleniem
echo 'Nazwa: ' . htmlspecialchars($nazwa, ENT_QUOTES, 'UTF-8');
echo 'Email: ' . htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
?>

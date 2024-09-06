<?php
session_start(); // Rozpoczęcie sesji

// Ustawianie wartości w sesji
$_SESSION['username'] = 'JanKowalski';
$_SESSION['email'] = 'jan.kowalski@example.com';

// Pobieranie wartości z sesji
echo 'Username: ' . $_SESSION['username'];
echo 'Email: ' . $_SESSION['email'];
?>

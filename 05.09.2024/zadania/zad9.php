<?php
mysqli_begin_transaction($conn);

try {
    mysqli_query($conn, "INSERT INTO users (nazwa, email) VALUES ('Jan', 'jan@example.com')");
    mysqli_query($conn, "INSERT INTO users (nazwa, email) VALUES ('Anna', 'anna@example.com')");
    mysqli_commit($conn);
} catch (mysqli_sql_exception $exception) {
    mysqli_rollback($conn);
    throw $exception;
}
?>

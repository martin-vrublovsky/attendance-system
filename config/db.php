<?php
$DB_HOST = "localhost";
$DB_USER = "root";
$DB_PASS = "";
$DB_NAME = "attendance_system";

$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if (mysqli_connect_errno()) {
    exit("Nepodarilo sa pripojiť k databáze MySQL: " . mysqli_connect_error());
}
?>

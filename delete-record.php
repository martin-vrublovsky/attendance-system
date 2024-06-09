<?php
session_start();

if (!isset($_SESSION["logged-in"])) {
    header("Location: ./index.html");
    exit;
}

include_once "./config/db.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM records WHERE id = $id";
    $conn->query($sql);
}

header("Location: ./records.php");
exit;
?>

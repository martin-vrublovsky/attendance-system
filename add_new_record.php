<?php
require_once "./config/db.php";

if (isset($_GET["RFID_tag_UID"])) {
    $RFID_tag_UID = $_GET["RFID_tag_UID"];

    if ($RFID_tag_UID == "83136108149") {
        $employee_name = "Martin Vrublovský";
    } else {
        $employee_name = "Neznáma osoba";
    }
}

if (isset($_GET["number_of_records"])) {
    $number_of_records = $_GET["number_of_records"];
}

if ($RFID_tag_UID == "83136108149" && $number_of_records == 1) {
    $query = mysqli_query($conn, "SELECT MAX(id) AS max_id FROM records");
    $row = mysqli_fetch_array($query);
    $next_id = $row["max_id"] + 1;

    $departure_time = "-";

    $sql = "INSERT INTO records (id, RFID_tag_UID, employee_name, time_of_arrival, departure_time) VALUES ('$next_id', '$RFID_tag_UID', '$employee_name', NOW(), '$departure_time')";

    mysqli_query($conn, $sql);
} else if ($RFID_tag_UID == "83136108149" && $number_of_records == 2) {
    $query = mysqli_query($conn, "SELECT MAX(id) AS max_id FROM records WHERE RFID_tag_UID = '83136108149'");
    $row = mysqli_fetch_array($query);
    $next_id = $row["max_id"];

    $sql = "UPDATE records SET departure_time = NOW() WHERE id = $next_id";

    mysqli_query($conn, $sql);
} else {
    $query = mysqli_query($conn, "SELECT MAX(id) AS max_id FROM records");
    $row = mysqli_fetch_array($query);
    $next_id = $row["max_id"] + 1;

    $time_of_arrival = "-";
    $departure_time = "-";

    $sql = "INSERT INTO records (id, RFID_tag_UID, employee_name, time_of_arrival, departure_time) VALUES ('$next_id', '$RFID_tag_UID', '$employee_name', '$time_of_arrival', '$departure_time')";

    mysqli_query($conn, $sql);
}
?>

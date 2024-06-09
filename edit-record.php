<?php
session_start();

if (!isset($_SESSION["logged-in"])) {
    header("Location: ./index.html");
    exit;
}

include_once "./config/db.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "SELECT * FROM records WHERE id = $id";

    if ($result = $conn->query($sql)) {
        while ($row = $result->fetch_assoc()) {
            $RFID_tag_UID = $row["RFID_tag_UID"];
            $employee_name = $row["employee_name"];
            $time_of_arrival = $row["time_of_arrival"];
            $departure_time = $row["departure_time"];
            $notes = $row["notes"];
        }
        $result->free();
    }
}

if (isset($_POST["submit"])) {
    $employee_name = $_POST["employee_name"];
    $time_of_arrival = $_POST["time_of_arrival"];
    $departure_time = $_POST["departure_time"];
    $notes = $_POST["notes"];

    $sql = "UPDATE records SET employee_name = '$employee_name', time_of_arrival = '$time_of_arrival', departure_time = '$departure_time', notes = '$notes' WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: ./records.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upraviť záznam č. <?= $id ?> | Dochádzkový systém</title>

    <!-- Internal CSS files -->
    <link rel="stylesheet" href="./assets/css/normalize.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body class="records-page">
    <?php include_once "./top_nav.php"; ?>

    <main>
        <header class="current-page-header">
            <h2>Upraviť záznam č. <?= $id ?></h2>
        </header>

        <div class="edit-form">
            <form action="#" method="post">
                <div class="edit-form-content-groups">
                    <div class="edit-form-first-content-group">
                        <div class="edit-form-first-content">
                            <label for="rfid-tag-uid">RFID tag UID</label>
                            <br>
                            <input type="text" name="RFID_tag_UID" value="<?= $RFID_tag_UID ?>" disabled>

                            <br>
                            <br>

                            <label for="employee-name">Meno zamestnanca</label>
                            <br>
                            <input type="text" name="employee_name" value="<?= $employee_name ?>">
                        </div>

                        <div class="edit-form-second-content">
                            <label for="time-of-arrival">Dátum a čas príchodu</label>
                            <br>
                            <input type="datetime-local" name="time_of_arrival" value="<?= $time_of_arrival ?>">

                            <br>
                            <br>

                            <label for="departure-time">Dátum a čas odchodu</label>
                            <br>
                            <input type="datetime-local" name="departure_time" value="<?= $departure_time ?>">
                        </div>
                    </div>

                    <div class="edit-form-second-content-group">
                        <label for="notes">Poznámky</label>
                        <br>
                        <textarea name="notes" value="<?= $notes ?>"></textarea>
                    </div>
                </div>

                <br>
                <br>

                <input type="submit" name="submit" value="Upraviť">
            </form>
        </div>
    </main>
</body>
</html>

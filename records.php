<?php
session_start();

if (!isset($_SESSION["logged-in"])) {
    header("Location: ./index.html");
    exit;
}

include_once "./config/db.php";
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Záznamy o dochádzke zamestnancov | Dochádzkový systém</title>

    <!-- Internal CSS files -->
    <link rel="stylesheet" href="./assets/css/normalize.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body class="records-page">
    <?php include_once "./top_nav.php"; ?>

    <main>
        <header class="current-page-header">
            <h2>Záznamy o dochádzke zamestnancov</h2>
        </header>

        <table class="table-of-records">
            <thead>
                <tr>
                    <th colspan="6">
                        <a href="./export-records.php">
                            <img src="./assets/icons/file-arrow-down-solid.svg">
                            <span>Exportovať</span>
                        </a>
                    </th>
                </tr>

                <tr>
                    <th>ID záznamu</th>
                    <th>UID RFID tagu</th>
                    <th>Meno zamestnanca</th>
                    <th>Dátum a čas príchodu</th>
                    <th>Dátum a čas odchodu</th>
                    <th>Poznámky</th>
                    <th>Nástroje</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $sql = "SELECT * FROM records";

                if ($result = $conn->query($sql)) {
                    while ($row = $result->fetch_assoc()) {
                        $id = $row["id"];
                        $RFID_tag_UID = $row["RFID_tag_UID"];
                        $employee_name = $row["employee_name"];
                        $time_of_arrival = $row["time_of_arrival"];
                        $departure_time = $row["departure_time"];
                        $notes = $row["notes"];

                        echo '<tr>
                                <td>'.$id.'</td>
                                <td>'.$RFID_tag_UID.'</td>
                                <td>'.$employee_name.'</td>
                                <td>'.$time_of_arrival.'</td>
                                <td>'.$departure_time.'</td>
                                <td>'.$notes.'</td>
                                <td>
                                    <a href="edit-record.php?id='.$id.'" class="edit-btn"><img src="./assets/icons/pencil-solid.svg"></a>

                                    <a href="delete-record.php?id='.$id.'" class="delete-btn"><img src="./assets/icons/trash-can-solid.svg"></a>
                                </td>
                              </tr>';
                    }
                    $result->free();
                }
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>

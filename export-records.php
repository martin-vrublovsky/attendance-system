<?php
session_start();

if (!isset($_SESSION["logged-in"])) {
    header("Location: ./index.html");
    exit;
}

include_once "./config/db.php";

$table = "<table>
            <thead>
                <tr style='text-align: center;'>
                    <th style='text-align: center;'>ID záznamu</th>
                    <th style='text-align: center;'>UID RFID tagu</th>
                    <th style='text-align: center;'>Meno zamestnanca</th>
                    <th style='text-align: center;'>Dátum a čas príchodu</th>
                    <th style='text-align: center;'>Dátum a čas odchodu</th>
                </tr>
            </thead>";

    $table .= "<tbody>";
        $sql = "SELECT * FROM records";

        if ($result = $conn->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $RFID_tag_UID = $row["RFID_tag_UID"];
                $employee_name = $row["employee_name"];
                $time_of_arrival = $row["time_of_arrival"];
                $departure_time = $row["departure_time"];

                $table .= "<tr style='text-align: center;'>
                            <td style='text-align: center;'>$id</td>
                            <td style='text-align: center;'>$RFID_tag_UID</td>
                            <td style='text-align: center;'>$employee_name</td>
                            <td style='text-align: center;'>$time_of_arrival</td>
                            <td style='text-align: center;'>$departure_time</td>
                           </tr>";
            }
            $result->free();
        }
    $table .= "</tbody>";
$table .= "</table>";

header("Content-Type: application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=zaznamy_o_dochadzke_zamestnancov.xls");

echo $table;
?>

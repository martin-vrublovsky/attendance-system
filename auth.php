<?php
require_once "./config/db.php";

session_start();

if (!isset($_POST["username"], $_POST["password"])) {
    exit("Vyplňte polia pre používateľské meno a heslo!");
}

if ($stmt = $conn->prepare("SELECT id, password FROM accounts WHERE username = ?")) {
    $stmt->bind_param("s", $_POST["username"]);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();

        if (password_verify($_POST["password"], $password)) {
            session_regenerate_id();

            $_SESSION["logged-in"] = TRUE;
            $_SESSION["id"] = $id;

            header("Location: ./records.php");
        } else {
            echo "<h2 class='login-error-msg'>Nesprávne <span style='text-decoration: underline;'>používateľské meno</span> alebo <span style='text-decoration: underline;'>heslo</span>!
                    <br>
                    <a href='./index.html'>
                        <img src='./assets/icons/arrow-left-solid.svg'>
                        <span>Späť</span>
                    </a>
                  </h2>";
        }
    } else {
        echo "<h2 class='login-error-msg'>Nesprávne <span style='text-decoration: underline;'>používateľské meno</span> alebo <span style='text-decoration: underline;'>heslo</span>!
                <br>
                <a href='./index.html'>
                    <img src='./assets/icons/arrow-left-solid.svg'>
                    <span>Späť</span>
                </a>
              </h2>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prihlásenie | Dochádzkový systém</title>

    <!-- Internal CSS files -->
    <link rel="stylesheet" href="./assets/css/normalize.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body class="login-page"></body>
</html>

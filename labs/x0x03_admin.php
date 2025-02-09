<?php
require('../db.php');
$cookie_name = "admin_cookie";
$cookie_value = "5ac5355b84894ede056ab81b324c4675";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSS 0x03</title>
    <link href="../assets/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/custom.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container px-4 py-5" id="custom-cards">
            <h2 class="pb-2 border-bottom"><a href="../index.php">Labs</a> / XSS 0x03</h2>

            <div class="p-5 mb-4 bg-dark rounded-3 text-light">
                <h2>Support portal</h2>
            </div>

            <div class="p-5 mb-4 bg-light rounded-3">
                <h3>Welcome admin.</h3>
                <p>Your tickets are listed below.</p>
            </div>
            <div class="p-5 mb-4 bg-light rounded-3">
                <h3>Support ticket</h3>
                <?php
                $sql = "SELECT * FROM xss0x03";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<hr>';
                        echo "<p style='font-weight:bold'>" . $row["message"] . "</p>";
                        echo "<p>Ticket from: " . $row["name"] . "</p>";
                    }
                } else {
                    echo "<p>No messages found</p>";
                }
                $conn->close();
                ?>
            </div>
        </div>
    </main>

    <script src="../assets/popper.min.js"></script>
    <script src="../assets/bootstrap.min.js"></script>

</body>

</html>
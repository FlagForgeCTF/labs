<?php
require '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $status = 0;

    if ($username == "jessamy" && $password == "pasta") {
        $message = "Please enter your MFA code";
        $status = 1;
    } else {
        $message = "Your username or password was incorrect!";
        $status = 2;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication 0x02</title>
    <link href="../assets/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/custom.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container px-4 py-5" id="custom-cards">
            <h2 class="pb-2 border-bottom"><a href="../index.php">Labs</a> / Authentication 0x02</h2>

            <div class="alert alert-warning" role="alert">
                <p class="no-margin">Target account: jeremy</p>
                <p class="no-margin">Your credentials: jessamy:pasta</p>
            </div>

            <?php
            if ($status == 2) {
                echo '<div class="alert alert-danger" role="danger"><p class="no-margin">' . $message . '</p></div>';
            } elseif ($status == 1) {
                echo '<div class="alert alert-success" role="success"><p class="no-margin">' . $message . '</p></div>';
            }
            ?>

            <div class="p-5 mb-4 bg-light rounded-3">
                <h2>Your code</h2>
                <?php
                $sql = "SELECT mfa FROM auth0x02 WHERE username = 'jessamy'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<p>" . $row["mfa"] . "</p>";
                    }
                } else {
                    echo "<p>There was an error</p>";
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
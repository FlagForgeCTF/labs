<?php
require '../db.php';

if (!isset($_GET['account'])) {
    header('Location: e0x02.php?account=1009');
} else {
    $account = $_GET['account'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IDOR 0x01</title>
    <link href="../assets/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/custom.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container px-4 py-5" id="custom-cards">
            <h2 class="pb-2 border-bottom"><a href="../index.php">Labs</a> / IDOR 0x01</h2>

            <div class="p-5 mb-4 bg-light rounded-3">
                <h2>Your account details</h2>


                <div>
                    <?php
                    $stmt = $conn->prepare("SELECT * FROM idor0x01 WHERE id = ?");
                    $stmt->bind_param("i", $account);
                    $stmt->execute();

                    $result = $stmt->get_result();
                    echo '<hr>';

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<p>Username: " . $row["username"] . "</p><p>Address: " . $row["address"] . "</p><p>Type: " . $row["type"] . "</p>";
                        }
                    } else {
                        echo "<p>No account information found</p>";
                    }

                    $conn->close();
                    ?>
                </div>

            </div>
        </div>
    </main>

    <script src="../assets/popper.min.js"></script>
    <script src="../assets/bootstrap.min.js"></script>
</body>

</html>
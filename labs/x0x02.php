<?php
require('../db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = 'guest';

    $stmt = $conn->prepare("INSERT INTO xss0x02 (name, comment) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $comment);

    $name = 'guest';
    $comment = $_POST['comment'];
    $stmt->execute();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSS 0x02</title>
    <link href="../assets/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/custom.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container px-4 py-5" id="custom-cards">
            <h2 class="pb-2 border-bottom"><a href="../index.php">Labs</a> / XSS 0x02</h2>

            <div class="p-5 mb-4 bg-dark rounded-3 text-light">
                <h2>/r/mightJustWork</h2>
            </div>

            <div class="p-5 mb-4 bg-light rounded-3">
                <h3>What is your crazy idea that might just work?</h3>

                <?php
                $sql = "SELECT * FROM xss0x02";
                $result = $conn->query($sql);
                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<hr>';
                        echo "<p style='font-weight:bold'>" . $row["comment"] . "</p>";
                        echo "<p>Posted by: " . $row["name"] . "</p>";
                    }
                } else {
                    echo "<p>No comments found</p>";
                }
                $conn->close();
                ?>
            </div>
            <div class="p-5 mb-4 bg-light rounded-3">
                <h3>Add a comment</h3>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="comment" class="form-control" placeholder="Cars that won't turn unless you're indicating...?" aria-label="Username">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script src="../assets/popper.min.js"></script>
    <script src="../assets/bootstrap.min.js"></script>

</body>

</html>
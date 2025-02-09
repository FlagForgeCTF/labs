<?php
require('../db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $stmt = $conn->prepare("INSERT INTO xss0x03 (name, message) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $message);

    $name = $_POST['name'];
    $message = $_POST['message'];
    $stmt->execute();
}
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
                <h3>Fill in the form below to submit a support ticket.</h3>
                <p>Our team will check it ASAP!</p>
            </div>
            <div class="p-5 mb-4 bg-light rounded-3">
                <h3>Support ticket</h3>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                    <div class="input-group mb-3">
                        <textarea name="message" class="form-control" placeholder="Something broke..."></textarea>
                    </div>
                    <button class="btn btn-outline-secondary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </main>

    <script src="../assets/popper.min.js"></script>
    <script src="../assets/bootstrap.min.js"></script>

</body>

</html>
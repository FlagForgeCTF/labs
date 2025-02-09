<?php
require '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $status = 0;

    $stmt = $conn->prepare("SELECT * FROM auth0x03 WHERE username = ?");
    $stmt->bind_param("s", $username);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // check if account is locked
        if ($row['lockout_count'] < 5) {
            // check password
            if ($password === $row['password']) {
                $message = 'Successfully logged in! Challenge complete!';
                $status = 1;
            } else {
                // password incorrect, add an incorrect attempt
                $stmt = $conn->prepare("UPDATE auth0x03 SET lockout_count = lockout_count + 1 WHERE username = ?");
                $stmt->bind_param("s", $username);
                $stmt->execute();

                if ($stmt->affected_rows === 0) {
                    echo "There was a db error.";
                } else {
                    $message = 'Password incorrect, added a lockout attempt';
                    $status = 2;
                }
            }
        } else {
            $message = 'That account is locked!';
            $status = 2;
        }
    }
    $stmt->close();
    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication 0x03</title>
    <link href="../assets/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/custom.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container px-4 py-5" id="custom-cards">
            <h2 class="pb-2 border-bottom"><a href="../index.php">Labs</a> / Authentication 0x03 [Challenge]</h2>

            <div class="alert alert-warning" role="alert">
                <p class="no-margin">Warning: Accounts will lock after 5 failed login attempts! (You can reset the db at
                    /init.php if needed)</p>
            </div>

            <?php
            if ($status == 2) {
                echo '<div class="alert alert-danger" role="danger"><p class="no-margin">' . $message . '</p></div>';
            } elseif ($status == 1) {
                echo '<div class="alert alert-success" role="success"><p class="no-margin">' . $message . '</p></div>';
            }
            ?>

            <div class="p-5 mb-4 bg-light rounded-3">
                <div class="row">
                    <div class="col">
                        <img src="../assets/teashoplogo.png" style="max-width: 575px">
                    </div>
                    <div class="col">
                        <h2>Welcome to the Teashop</h2>
                        <p>Welcome to our online tea shop! As passionate purveyors of tea, we've traversed the lush,
                            fragrant tea gardens of the world to bring you an outstanding collection of the finest teas.
                        </p>
                        <p>
                            From the robust flavors of traditional black teas to the subtle complexities of rare white
                            teas, and from the exotic allure of our blooming teas to the soothing charm of our herbal
                            blends, we offer a symphony of tastes sure to delight every tea lover. Step into our store,
                            and let the journey of discovery and enjoyment begin. </p>
                        <p>Immerse yourself in the world of tea!
                        </p>
                        <h2>Login</h2>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="mb-3 form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" id="username"
                                    aria-describedby="emailHelp" placeholder="Enter username">
                            </div>
                            <div class="mb-3 form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder="Enter password">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary"
                                    style="background-color: #79b69e; border-color: #205f6a">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="../assets/popper.min.js"></script>
    <script src="../assets/bootstrap.min.js"></script>
</body>

</html>
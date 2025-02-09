<?php
require '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["mfa"]) && isset($_POST["username2"])) {
        // check if the mfa code is correct
        $mfa = $_POST["mfa"];
        $username = $_POST["username2"];
        $sql = "SELECT mfa FROM auth0x02";
        $result = $conn->query($sql);
        $mfa_check = 0;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['mfa'] == $mfa) {
                    $message = "You have sucessfully logged in!";
                    $status = 1;
                    $complete = 1;
                }
            }
        } else {
            echo "<p>Incorrect MFA code</p>";
        }
    } else {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $status = 0;

        if ($username == "jessamy" && $password == "pasta") {
            $message = "Please enter your MFA code. Your code can be <a href='a0x02code.php' target='_blank'>found here</a>.";
            $status = 1;

            // generate a 6 digit code & insert it into the DB
            $code = mt_rand(100000, 999999);
            $stmt = $conn->prepare("UPDATE auth0x02 SET mfa = ? WHERE username = 'jessamy'");
            $stmt->bind_param("s", $mfa);
            $mfa = $code;
            $stmt->execute();
        } else {
            $message = "Your username or password was incorrect!";
            $status = 2;
        }
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
                <?php if ($complete == 1) {
                    echo '<h2>Welcome ' . $username . '</h2>';
                } elseif ($status != 1) { ?>
                    <h2>Login</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="mb-3 form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter username">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                <?php } else { ?>
                    <h2>Enter your MFA code:</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="mb-3 form-group">
                            <label for="username2">Username</label>
                            <input type="text" value="<?php echo $username; ?>" name="username2" class="form-control" id="username2" readonly>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="password">MFA</label>
                            <input type="text" name="mfa" class="form-control" id="mfa" placeholder="000000">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                <?php } ?>

            </div>
        </div>
    </main>

    <script src="../assets/popper.min.js"></script>
    <script src="../assets/bootstrap.min.js"></script>
</body>

</html>
<?php
require '../db.php';

$showLogin = true;
$showInvalidLogin = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM injection0x02 WHERE username = ? and password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // set a cookie & reload the page
        $cookie = md5($username);
        setcookie("session", $cookie, time() + 3600);
        $page = $_SERVER['PHP_SELF'];
        header("Refresh: 0; url=$page");
    } else {
        $showInvalidLogin = true;
    }
    $stmt->close();
}

// check session cookie
if ($_COOKIE['session']) {
    // echo $_COOKIE['session'];
    $cookie = $_COOKIE['session'];

    $sql = "SELECT * FROM injection0x02 WHERE session = '$cookie'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $showLogin = false;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Injection 0x02</title>
    <link href="../assets/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/custom.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container px-4 py-5" id="custom-cards">
            <h2 class="pb-2 border-bottom"><a href="../index.php">Labs</a> / Injection 0x02</h2>

            <div class="alert alert-warning" role="alert">
                <p class='no-margin'>Default credentials: jeremy:jeremy</p>
            </div>

            <div class="p-5 mb-4 bg-light rounded-3">
                <div>
                    <?php
                    if ($showInvalidLogin == true) { ?>
                        <div class="alert alert-danger" role="alert">
                            <p class='no-margin'>Invalid credentials</p>
                        </div>
                    <?php } ?>
                    <?php if ($showLogin == true) { ?>
                        <h2>Login</h2>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="username" class="sr-only">Username</label>
                                    <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Log in</button>
                        </form>
                    <?php } else { ?>
                        <h2>Welcome to your dashboard!</h2>
                    <?php } ?>
                </div>

            </div>
        </div>
    </main>

    <script src="../assets/popper.min.js"></script>
    <script src="../assets/bootstrap.min.js"></script>
</body>

</html>
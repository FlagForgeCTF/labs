<?php
require '../db.php';

// check for cookie
$cookie = false;
if (isset($_COOKIE["csrf0x01"])) {
    $username = $_COOKIE["csrf0x01"];
    $cookie = true;
    $email = "";

    // grab data from db
    $sql = "SELECT * FROM csrf0x01 WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $email = $row["email"];
    }
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $status = 0;

        if ($username === "jeremy" && $password === "jeremy") {
            $message = "You have successfully logged in!";
            $cookie_name = "csrf0x01";
            $cookie_value = "jeremy";
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
            $status = 1;
        } elseif ($username === "jessamy" && $password === "jessamy") {
            $message = "You have successfully logged in!";
            $cookie_name = "csrf0x01";
            $cookie_value = "jessamy";
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
            $status = 1;
        } else {
            $message = "Your username or password was incorrect!";
            $status = 2;
        }
    } elseif (isset($_POST["logout"])) {
        setcookie("csrf0x01", "jeremy", time() - 3600, "/");
        setcookie("csrf0x01", "jessamy", time() - 3600, "/");
        $message = "You logged out!";
        $status = 2;
        $cookie = false;
    } elseif (isset($_POST["email"])) {
        $sql = "UPDATE csrf0x01 SET email = ? WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $new_email, $username);
        $new_email = $_POST["email"];

        if ($stmt->execute()) {
            $email = $_POST["email"];
            $message = "Email for " . $_COOKIE["csrf0x01"] . " successfully updated";
            $status = 1;
        } else {
            $message = "There was an error " . $stmt->error;
            $status = 2;
        }
    } else {
        $message = "There was an error with your request!";
        $status = 2;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSRF 0x01</title>
    <link href="../assets/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/custom.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container px-4 py-5" id="custom-cards">
            <h2 class="pb-2 border-bottom"><a href="../index.php">Labs</a> / CSRF 0x01</h2>

            <div class="alert alert-warning" role="alert">
                <p class="no-margin">Test account: jeremy:jeremy</p>
                <p class="no-margin">Target account: jessamy:jessamy</p>
            </div>

            <?php
            if ($status == 2) {
                echo '<div class="alert alert-danger" role="danger"><p class="no-margin">' . $message . '</p></div>';
            } elseif ($status == 1) {
                echo '<div class="alert alert-success" role="success"><p class="no-margin">' . $message . '</p></div>';
            }
            ?>

            <div class="p-5 mb-4 bg-light rounded-3">
                <?php if ($status === 1 || $cookie === true) { ?>
                <h2>Update contact email address</h2>
                <p>Current user: <?php echo $username; ?></p>
                <p>Email address: <?php echo $email; ?></p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="mb-3 form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email" aria-describedby="emailHelp"
                            placeholder="Enter email">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                <hr />
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <input type="text" name="logout" class="form-control" id="logout" hidden>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </div>
                </form>
                <?php } else { ?>
                <h2>Sign in</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="mb-3 form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username"
                            aria-describedby="emailHelp" placeholder="Enter username">
                    </div>
                    <div class="mb-3 form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Password">
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
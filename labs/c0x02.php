<?php
require '../db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Command Injection 0x02</title>
    <link href="../assets/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/custom.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container px-4 py-5" id="custom-cards">
            <h2 class="pb-2 border-bottom"><a href="../index.php">Labs</a> / Command Injection 0x02</h2>

            <div class="p-5 mb-4 bg-light rounded-3">
                <h2>Network check</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="site" class="form-control" placeholder="https://tcm-sec.com/">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Check target</button>
                        </div>
                    </div>
                </form>

                <div>
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $site = $_POST["site"];
                        $site = str_replace(";","",$site);
                        echo 'Target: ' . $site;

                        $command = 'curl -I -s -L ' . $site . ' | grep "HTTP/"';
                        $result = shell_exec($command);

                        echo '<hr>';

                        $found200 = strpos($result, '200');
                        $found404 = strpos($result, '404');
                        if ($found200) {
                            echo '<h2>Website OK</h2>'; 
                        } elseif ($found404) {
                            echo '<h2>Website not found</h2>';
                        } else {
                            echo '<h2>Something went wrong</h2>';
                        }
                    }
                    ?>
                </div>

            </div>
        </div>
    </main>

    <script src="../assets/popper.min.js"></script>
    <script src="../assets/bootstrap.min.js"></script>
</body>

</html>
<?php
require 'vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('./templates');
$twig = new \Twig\Environment($loader, [
    'debug' => true,
    'autoescape' => false,
]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSTI Lab 0x01</title>
    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <link href="assets/custom.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container px-4 py-5" id="custom-cards">
            <h2 class="pb-2 border-bottom">Server-side Template Injection Lab</h2>
            <div class="p-5 mb-4 bg-light rounded-3">
                <h2>Submit message</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="greeting" class="form-control" placeholder="Your greeting..." aria-label="Greeting">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">Generate Text</button>
                        </div>
                    </div>
                </form>
                <hr />
                <div class="mb-3">
                    <!-- not vulnerable -->
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $greeting = $_POST["greeting"];
                        $template = $twig->load('greeting_template.twig');
                        echo $template->render(['greeting' => $greeting]);
                    }
                    ?>
                </div>
                <div>
                    <!-- vulnerable -->
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $greeting = $_POST["greeting"];
                        $template = $twig->createTemplate($greeting);
                        echo '<h3>Your message:</h3>';
                        echo $template->render([]);
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>

    <script src="assets/popper.min.js"></script>
    <script src="assets/bootstrap.min.js"></script>
</body>

</html>
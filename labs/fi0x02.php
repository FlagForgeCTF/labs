<?php
$directoryPath = 'files';
$files = [];
if (is_dir($directoryPath)) {
    $files = array_diff(scandir($directoryPath), array('.', '..'));
}

$selectedFileContent = '';
if (isset($_GET['filename'])) {
    $filename = $_GET['filename'];
    $filename = str_replace('../', '', $filename);
    $selectedFileContent = file_get_contents($filename);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Inclusion 0x02</title>
    <link href="../assets/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/custom.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container px-4 py-5" id="custom-cards">
            <h2 class="pb-2 border-bottom"><a href="../index.php">Labs</a> / File Inclusion 0x02</h2>

            <div class="p-5 mb-4 bg-light rounded-3">
                <h2>Select a recipe:</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
                    <div class="input-group mb-3">
                        <select name="filename" class="form-control" onchange="this.form.submit()">
                            <option value="">-- Select a recipe --</option>
                            <?php
                            foreach ($files as $file) {
                                $fullPath = $directoryPath . '/' . $file;
                                echo '<option value="' . htmlspecialchars($fullPath) . '">' . htmlspecialchars($file) . '</option>';
                            }
                            ?>
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Show</button>
                        </div>
                    </div>
                </form>

                <hr />
                <div class="file-content">
                    <?php echo nl2br(htmlspecialchars($selectedFileContent)); ?>
                </div>

            </div>

    </main>

    <script src="../assets/popper.min.js"></script>
    <script src="../assets/bootstrap.min.js"></script>
</body>

</html>
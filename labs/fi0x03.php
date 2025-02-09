<?php
$directoryPath = 'files';
$files = [];
if (is_dir($directoryPath)) {
    $files = array_diff(scandir($directoryPath), array('.', '..'));
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Inclusion 0x03</title>
    <link href="../assets/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/custom.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container px-4 py-5" id="custom-cards">
            <h2 class="pb-2 border-bottom"><a href="../index.php">Labs</a> / File Inclusion 0x03 [Challenge]</h2>

            <div class="p-5 mb-4 bg-light rounded-3">
                <div class="row">
                    <img src="../assets/rolling-scones.png" style="width: 100%">
                </div>
                <hr />
                <div class="row mt-3">
                    <?php foreach ($files as $file) : ?>
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="card">
                            <img src="/assets/cake.png" class="card-img-top" alt="Recipe Image">
                            <div class="card-body">
                                <h5 class="card-title text-center">
                                    <?php echo htmlspecialchars(basename($file, '.txt')); ?>
                                </h5>

                                <div class="d-flex">
                                    <button class="btn btn-secondary mx-auto"
                                        onclick="fetchRecipe('<?php echo htmlspecialchars($file); ?>');">View
                                        Recipe</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <hr />
                <div class="file-content" id="recipeContent">
                    <?php echo nl2br(htmlspecialchars($selectedFileContent)); ?>
                </div>

            </div>

    </main>

    <script src="../assets/popper.min.js"></script>
    <script src="../assets/bootstrap.min.js"></script>
    <script>
    function fetchRecipe(filePath) {
        fetch(`api/fetchRecipe.php?filename=${encodeURIComponent(filePath)}`)
            .then(response => response.text())
            .then(data => {
                const recipeContent = document.getElementById('recipeContent');
                recipeContent.innerHTML = data.split("\n").map(line => `${line}<br>`).join('');
            })
            .catch(error => {
                console.error('Error fetching the recipe:', error);
            });
    }
    </script>

    </script>
</body>

</html>
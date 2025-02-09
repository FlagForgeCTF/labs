<?php
require '../db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Injection 0x03</title>
    <link href="../assets/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/custom.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container px-4 py-5" id="custom-cards">
            <h2 class="pb-2 border-bottom"><a href="../index.php">Labs</a> / Injection 0x03 [Challenge]</h2>

            <div class="p-5 mb-4 bg-light rounded-3" style="background-color: #e4553f !important"> <!-- #e4553f -->
                <img src="../assets/sushi.png">
            </div>

            <div class="p-5 mb-4 bg-light rounded-3">
                <h2>Product search</h2>
                <p>To view the full details of a product, please use the search below.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="product" class="form-control" placeholder="Product" aria-label="Product">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="p-5 mb-4 bg-light rounded-3">
                <div>
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $search = trim($_POST["product"]);

                        $sql = "SELECT * FROM injection0x03_products WHERE name = '$search'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            echo "<div class='row row-cols-1 row-cols-sm-2 row-cols-md-2 g-2'>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<div class='col'>";
                                echo "<div class='card shadow-sm'>";
                                echo '<img src="../assets/' . $row['image'] . '">';
                                echo "</div>";
                                echo "</div>";
                                echo "<div class='col'>";
                                echo "<div class='card shadow-sm' style='padding: 0.5em'>";
                                echo '<h3 style="text-align:center">' . $row['name'] . ' ' . $row['price'] . '円</h3>';
                                echo '<p>' . $row['description'] . '</p>';
                                echo '<button type="button" class="btn btn-danger btn-lg px-4 gap-3" style="background-color:#e4553f!important">Place order! (coming soon)</button>';
                                echo "</div>";
                                echo "</div>";
                            }
                            echo "</div>";
                        } else {
                            echo "<h2>No products found</h2>";
                            echo "<p>Try using the full name of a product.</p>";
                            echo "<p>E.g. Senpai Knife Set</p>";
                        }
                    } else {
                        // show all products
                        $sql = "SELECT * FROM injection0x03_products";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            echo "<div class='row row-cols-1 row-cols-sm-2 row-cols-md-2 g-2'>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<div class='col'>";
                                echo "<div class='card shadow-sm'>";
                                echo '<img src="../assets/' . $row['image'] . '">';
                                echo "</div>";
                                echo "<div class='card-body'>";
                                echo "<div class='card-text' style='padding: 10px;'>";
                                echo '<h3 style="text-align:center">' . $row['name'] . '<br>' . $row['price'] . '円</h3>';
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                            }
                            echo "</div>";
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
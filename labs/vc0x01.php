<!DOCTYPE html>
<html>

<head>
    <title>TimThumb Demo</title>
</head>

<body>
    <h1>TimThumb Image Resizing Demo</h1>

    <form action="" method="get">
        Image URL: <input type="text" name="image_url">
        <input type="submit" value="Resize Image">
    </form>

    <?php
    if (isset($_GET['image_url']) && !empty($_GET['image_url'])) {
        $imageUrl = $_GET['image_url'];
        echo "<img src='timthumb.php?src=$imageUrl&w=300&h=200'>";
    }
    ?>

</body>

</html>
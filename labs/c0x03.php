<?php
require '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // get the coordinates
    // check if the vehicle is there
        // if it is, set status to parked & update destination
        // else calculate the distance with exec(), set status to moving & update destination
    $registration = $_POST['plate'];
    $posx = $_POST['posx'];
    $posy = $_POST['posy'];

    $sql = "SELECT * FROM c0x03 WHERE registration=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $registration);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $prev_posx = $row['positionx'];
        $prev_posy = $row['positiony'];
    }

    if ($posx == $prev_posx && $posy == $prev_posy) {
        // set the status to parked since the vehicle reached it's destination
        $stmt = $conn->prepare("UPDATE c0x03 SET status = 'parked' WHERE registration = '$registration'");
        $stmt->execute();
    } else {
        // calculate the distance
        // update the new destination
        // update the status to moving
        $command = "awk 'BEGIN {print sqrt((($prev_posx-$posx)^2) + (($prev_posy-$posy)^2))}'";
        //echo $command;
        $distance = shell_exec($command);
        //echo "Distance: $distance";
        $message = 'Executed: ' . $command . '<br>Result: ' . $distance;

        $stmt = $conn->prepare("UPDATE c0x03 SET positionx=?, positiony=?, status = 'moving' WHERE registration = '$registration'");
        $stmt->bind_param("ii", $positionx, $positiony);

        $positionx = '100';
        $positiony = '200';
        $stmt->execute();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Command Injection 0x03</title>
    <link href="../assets/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/custom.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container px-4 py-5" id="custom-cards">
            <h2 class="pb-2 border-bottom"><a href="../index.php">Labs</a> / Command injection 0x03 [Challenge]</h2>

            <div class="p-5 mb-4 bg-light rounded-3" style="background-color: none !important; padding: 0 !important">
                <img src="../assets/fleettracker.png" style="width:100%">
            </div>
			
			<?php if($message){ ?>
				<div class="p-5 mb-4 bg-light rounded-3" style="background-color: none !important; padding: 0 !important">
		            <p class="text-center"><?php echo $message; ?></p>
		        </div>
            <?php } ?>
			
            <div class="p-5 mb-4 bg-light rounded-3">
                <h2>Redirect vehicle</h2>
                <p>To redirect a vehicle, enter it's registration plate and new coordinates (0 to 10000).</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="plate" class="form-control" placeholder="ABC DEF">
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <input type="text" name="posx" class="form-control" placeholder="Position X">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group mb-3">
                                <input type="text" name="posy" class="form-control" placeholder="Position Y">
                            </div>
                        </div>
                    </div>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Submit</button>
                    </div>
                </form>
            </div>

            <div class="p-5 mb-4 bg-light rounded-3">
            <h2>Current fleet</h2>
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">Registration</th>
                            <th scope="col">Position</th>
                            <th scope="col">Destination</th>
                            <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sql = "SELECT * FROM c0x03";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '<td>' . $row['registration'] . '</td>';
                                    echo '<td>' . $row['positionx'] . ', ' . $row['positiony'] . '</td>';
                                    echo '<td>' . $row['destinationx'] . ', ' . $row['destinationy'] . '</td>';
                                    echo '<td>' . $row['status'] . '</td>';
                                    echo '</tr>';
                                }
                            }
                        ?>
                        </tbody>
                    <table>
                </div>
            </div>
        </div>
    </main>

    <script src="../assets/popper.min.js"></script>
    <script src="../assets/bootstrap.min.js"></script>
</body>

</html>

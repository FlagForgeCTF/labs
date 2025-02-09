<?php
$payload = "";
$result = "";
$regex = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $payload = $_POST['payload'];
    $validationType = $_POST['validationType'];
    $definedChars = $_POST['definedChars'] ?? '';
    $regex = $_POST['regex'] ?? '';
    $recursive = isset($_POST['recursive']) ? true : false;

    switch ($validationType) {
        case 'none':
            $result = $payload;
            break;
        case 'filterScript':
            $result = str_ireplace(['<script>', '</script>'], '', $payload);
            break;
        case 'escapeHtml':
            $result = htmlspecialchars($payload, ENT_QUOTES, 'UTF-8');
            break;
        case 'filterDefined':
            $result = str_replace(str_split($definedChars), '', $payload);
            break;
        case 'filterRegex':
            if ($recursive) {
                do {
                    $prevResult = $payload;
                    $payload = preg_replace("/$regex/", '', $payload);
                } while ($prevResult !== $payload);
                $result = $payload;
            } else {
                $result = preg_replace("/$regex/", '', $payload);
            }
            break;
        default:
            $result = $payload;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Validation 0x01</title>
    <link href="../assets/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/custom.css" rel="stylesheet">
    <script>
        function toggleCharacterInput() {
            const validationType = document.getElementById('validationType').value;
            if (validationType === 'filterDefined') {
                document.getElementById('definedCharsDiv').style.display = 'block';
                document.getElementById('regexDiv').style.display = 'none';
                document.getElementById('recursiveDiv').style.display = 'none';
            } else if (validationType === 'filterRegex') {
                document.getElementById('regexDiv').style.display = 'block';
                document.getElementById('recursiveDiv').style.display = 'block'; // Show the checkbox
                document.getElementById('definedCharsDiv').style.display = 'none';
            } else {
                document.getElementById('definedCharsDiv').style.display = 'none';
                document.getElementById('regexDiv').style.display = 'none';
                document.getElementById('recursiveDiv').style.display = 'none';
            }
        }
    </script>
</head>

<body onload="toggleCharacterInput();">
    <main>
        <div class="container px-4 py-5" id="custom-cards">
            <h2 class="pb-2 border-bottom"><a href="../index.php">Labs</a> / Input Validation 0x01</h2>

            <div class="p-5 mb-4 bg-light rounded-3">
                <h2>Can you bypass the check?</h2>
                <div class="row">
                    <ol style="padding-left: 3em; margin-top: 1em">
                        <li>Enter your XXS payload.</li>
                        <li>Select the type of filtering you want to use.</li>
                        <li>Click Test.</li>
                    </ol>
                </div>
                <hr />
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="payload" id="payload" class="form-control" placeholder="Payload" aria-label="Payload" value="<?php echo htmlspecialchars($payload ?? ''); ?>">
                        <select name="validationType" id="validationType" class="form-control" onchange="toggleCharacterInput();">
                            <option value="none">No filtering</option>
                            <option value="filterScript">Filter script tags</option>
                            <option value="escapeHtml">Escape HTML</option>
                            <option value="filterDefined">Filter defined characters</option>
                            <option value="filterRegex">Filter with regex</option>
                        </select>
                    </div>
                    <div class="input-group mb-3" id="definedCharsDiv" style="display: none;">
                        <input type="text" name="definedChars" id="definedChars" class="form-control" placeholder="Defined Characters" style="width: 15em;" aria-label="Defined Characters">
                    </div>
                    <div class="input-group mb-3" id="regexDiv" style="display: none;">
                        <input type="text" name="regex" id="regex" class="form-control" placeholder="Regex Pattern" style="width: 15em;" aria-label="Regex Pattern">
                    </div>
                    <div class="form-check mb-3" id="recursiveDiv" style="display: none;">
                        <input type="checkbox" class="form-check-input" id="recursive" name="recursive">
                        <label class="form-check-label" for="recursive">Apply Recursively</label>
                    </div>

                    <div class="input-group-append">
                        <button class="btn btn-success" type="submit">Test</button>
                    </div>
                </form>
                <div id="result">
                    <?php echo $result; ?>
                </div>
            </div>

            <div class="p-5 mb-4 bg-light rounded-3">
                <h3>Regex examples:</h3>
                <pre>
Remove opening and closing script tags: <strong>&lt;script&gt;|&lt;\/script&gt;</strong>
Remove HTML element event handlers: <strong>on\w+=</strong>
Remove all HTML tags: <strong>&lt;[^&gt;]+&gt;</strong>
Remove iframes: <strong>&lt;iframe&gt;|&lt;\/iframe&gt;</strong>
                </pre>
            </div>
        </div>
    </main>

    <script src="../assets/popper.min.js"></script>
    <script src="../assets/bootstrap.min.js"></script>
</body>

</html>
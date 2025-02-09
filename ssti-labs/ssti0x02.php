<?php
require 'vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('./templates');
$twig = new \Twig\Environment($loader, [
    'debug' => true,
    'autoescape' => false,
]);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cardHtml = $_POST["cardHtml"];
    $template = $twig->createTemplate($cardHtml);
    $cardHtml = $template->render([]);
} else {
    $cardHtml = null;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Greeting Card Generator</title>
    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <link href="assets/custom.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container px-4 py-5" id="custom-cards">
            <h2 class="pb-2 border-bottom"><a href="http://localhost/index.php">Labs</a> / SSTI 0x02 [Challenge]</h2>
            <div class="p-5 mb-4 bg-light rounded-3">
                <h2>Submit your Greeting Card</h2>
                <form id="greeting-form">
                    <div class="form-group">
                        <label for="recipient">Recipient</label>
                        <input type="text" id="recipient" name="recipient" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="image-select">Image</label>
                        <select id="image-select" name="image" class="form-control">
                            <option value="birthday">Birthday</option>
                            <option value="anniversary">Anniversary</option>
                            <option value="holidays">Happy Holidays</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sender">Sender</label>
                        <input type="text" id="sender" name="sender" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success mt-4">Generate Card</button>
                </form>
                <button id="edit-button" class="btn btn-primary mt-3">Edit Card</button><br />
                <button id="start-again-button" class="btn btn-danger mt-3 ml-2">Start Again</button>
            </div>

            <!-- bootstrap modal -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Card</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <textarea id="card-editor" name="cardHtml" class="form-control" style="height: 10em"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" id="save-edit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="card-display" class="mt-4">
                <?php echo $cardHtml; ?>
            </div>
        </div>
    </main>


    <script src="assets/popper.min.js"></script>
    <script src="assets/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let form = document.getElementById('greeting-form');
            let editButton = document.getElementById('edit-button');
            let cardDisplay = document.getElementById('card-display');
            let cardEditor = document.getElementById('card-editor');
            let startAgainButton = document.getElementById('start-again-button');

            let storedCard = localStorage.getItem('card');
            if (storedCard) {
                cardDisplay.innerHTML = storedCard;
            }

            form.addEventListener('submit', function(e) {
                e.preventDefault();
                let recipient = document.getElementById('recipient').value;
                let image = document.getElementById('image-select').value;
                let sender = document.getElementById('sender').value;

                let cardHtml = `
                <div>
                    <h2>Dear ${recipient},</h2>
                    <img src="/assets/${image}.png" alt="${image}">
                    <p>From ${sender}</p>
                </div>
            `;

                cardDisplay.innerHTML = cardHtml;
                localStorage.setItem('card', cardHtml);
            });

            editButton.addEventListener('click', function() {
                cardEditor.value = cardDisplay.innerHTML;
                let myModal = new bootstrap.Modal(document.getElementById('editModal'), {});
                myModal.show();
            });

            document.getElementById('save-edit').addEventListener('click', function() {
                cardDisplay.innerHTML = cardEditor.value;
                localStorage.setItem('card', cardEditor.value);
            });

            startAgainButton.addEventListener('click', function() {
                localStorage.removeItem('card');
                location.reload();
            });
        });
    </script>
</body>

</html>
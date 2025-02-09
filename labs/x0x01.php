<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSS 0x01</title>
    <link href="../assets/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/custom.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container px-4 py-5" id="custom-cards">
            <h2 class="pb-2 border-bottom"><a href="../index.php">Labs</a> / XSS 0x01</h2>

            <div class="p-5 mb-4 bg-light rounded-3">
                <h2>Add an item to your todo list</h2>
                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="note" class="form-control" placeholder="Drink some water" aria-label="Username">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Add</button>
                        </div>
                    </div>
                </form>

                <h2>Your list:</h2>
                <ul id="todolist"></ul>

            </div>
        </div>
    </main>

    <script src="../assets/popper.min.js"></script>
    <script src="../assets/bootstrap.min.js"></script>

    <script>
        document.querySelector("form").addEventListener("submit", function(event) {
            event.preventDefault();
            var input = document.querySelector("input[name='note']");
            var todoList = document.querySelector("#todolist");
            var newItem = document.createElement("li");
            newItem.textContent = input.value;
            todoList.appendChild(newItem);
            newItem.innerHTML = newItem.textContent;
            input.value = "";
        });
    </script>

</body>

</html>
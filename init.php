<?php
require 'db.php';

// ################################################################################################
// Setup injection 0x01
// ################################################################################################
$dropTable = "DROP TABLE IF EXISTS injection0x01";
if ($conn->query($dropTable) === TRUE) {
    echo "Table injection0x01 dropped successfully\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}

$createTable = "CREATE TABLE injection0x01 (
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    email VARCHAR(50)
)";

if ($conn->query($createTable) === TRUE) {
    echo "Table injection0x01 created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

$stmt = $conn->prepare("INSERT INTO injection0x01 (username, password, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $password, $email);

$username = 'jeremy';
$password = 'jeremyspassword';
$email = 'jeremy@example.com';
$stmt->execute();

$username = 'jessamy';
$password = 'jessamyspassword';
$email = 'jessamy@example.com';
$stmt->execute();

$username = 'bob';
$password = 'bobspassword';
$email = 'bob@example.com';
$stmt->execute();

echo "Injection0x01 records created successfully\n";

// ################################################################################################
// setup injection 0x02
// ################################################################################################
$dropTable = "DROP TABLE IF EXISTS injection0x02";
if ($conn->query($dropTable) === TRUE) {
    echo "Table injection0x02 dropped successfully\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}

$createTable = "CREATE TABLE injection0x02 (
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    session VARCHAR(50)
)";

if ($conn->query($createTable) === TRUE) {
    echo "Table injection0x02 created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

$stmt = $conn->prepare("INSERT INTO injection0x02 (username, password, email, session) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $username, $password, $email, $session);

$username = 'jeremy';
$password = 'jeremy';
$email = 'jeremy@example.com';
$session = md5($username);
$stmt->execute();

$username = 'jessamy';
$password = 'ZWFzdGVyZWdn';
$email = 'jessamy@example.com';
$session = md5($username);
$stmt->execute();

echo "Injection0x02 records created successfully\n";

// ################################################################################################
// setup injection 0x03
// ################################################################################################
$dropTable = "DROP TABLE IF EXISTS injection0x03_products";
if ($conn->query($dropTable) === TRUE) {
    echo "Table injection0x03_products dropped successfully\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}

$dropTable = "DROP TABLE IF EXISTS injection0x03_users";
if ($conn->query($dropTable) === TRUE) {
    echo "Table injection0x03_users dropped successfully\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}

$createTable = "CREATE TABLE injection0x03_products (
    name VARCHAR(50) NOT NULL,
    description VARCHAR(1000) NOT NULL,
    image VARCHAR(50),
    price VARCHAR(20)
)";

if ($conn->query($createTable) === TRUE) {
    echo "Table injection0x03_products created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

$stmt = $conn->prepare("INSERT INTO injection0x03_products (name, description, image, price) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $description, $image, $price);

$name = 'Tanjyoubi Sushi Rack';
$description = 'Introducing the Tanjyoubi Sushi Rack, the ultimate showcase for birthday sushi. This rack is carefully hand-crafted and made to order using the finest selection of wood. With its unique design and exquisite attention to detail, it serves as an extraordinary centerpiece that will transform your sushi presentation. Celebrate your special day with an elegant sushi display, making your birthday celebration a memorable one.';
$image = 'tanjyoubi.png';
$price = '10,000';
$stmt->execute();

$name = 'Shougatsu Sushi Rack';
$description = "Our Shougatsu Sushi Rack is a New Year's special that will revolutionize your Osechi experience. This limited edition rack is specifically designed to showcase traditional New Year foods. With its elegant design and exceptional craftsmanship, it complements the rich cultural significance of Osechi, enhancing the festive spirit. Start your New Year with a fresh perspective on traditional Japanese cuisine.";
$image = 'shougatsu.png';
$price = '20,000';
$stmt->execute();

$name = 'Senpai Knife Set';
$description = 'The Senpai Knife Set is the ideal choice for those who seek perfection in their sushi making. This set includes a variety of expertly crafted knives, each designed for a specific purpose in sushi preparation. With their razor-sharp blades and comfortable handles, these knives provide precision and control, bringing you one step closer to the mastery of sushi making. Embrace the artistry of sushi with our Senpai Knife Set.';
$image = 'senpai.png';
$price = '30,000';
$stmt->execute();

$name = 'Itamae Knife Set';
$description = 'The Itamae Knife Set is a collection worthy of a sushi master. Each knife in this set is hand-forged by skilled artisans, ensuring unparalleled sharpness and durability. With a focus on balance and precision, these knives allow for seamless preparation of sushi ingredients. From delicate sashimi slices to perfect nigiri, this set is designed to handle every sushi-making task with ease. Become an Itamae in your own kitchen with our premium knife set.';
$image = 'itamae.png';
$price = '45,000';
$stmt->execute();

echo "Injection0x03_products records created successfully\n";

$createTable = "CREATE TABLE injection0x03_users (
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL
)";

if ($conn->query($createTable) === TRUE) {
    echo "Table injection0x03_users created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

$stmt = $conn->prepare("INSERT INTO injection0x03_users (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $password);

$username = 'takeshi';
$password = 'onigirigadaisuki';
$stmt->execute();

echo "Injection0x03_users records created successfully\n";

// ################################################################################################
// Setup injection 0x04
// ################################################################################################
$dropTable = "DROP TABLE IF EXISTS injection0x04";
if ($conn->query($dropTable) === TRUE) {
    echo "Table injection0x04 dropped successfully\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}

$createTable = "CREATE TABLE injection0x04 (
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    bio VARCHAR(50),
    session VARCHAR(50)
)";

if ($conn->query($createTable) === TRUE) {
    echo "Table injection0x04 created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

$stmt = $conn->prepare("INSERT INTO injection0x04 (username, password, bio, session) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $username, $password, $bio, $session);

$username = 'jeremy';
$password = 'tiramisu';
$bio = 'Jeremy likes tiramisu';
$session = md5($username);
$stmt->execute();

$username = 'jessamy';
$password = 'cheesecake';
$bio = 'Jessamy likes cheesecake.';
$session = md5($username);
$stmt->execute();

echo "Injection0x04 records created successfully\n";

// ################################################################################################
// Setup XSS 0x02
// ################################################################################################
$dropTable = "DROP TABLE IF EXISTS xss0x02";
if ($conn->query($dropTable) === TRUE) {
    echo "Table xss0x02 dropped successfully\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}

$createTable = "CREATE TABLE xss0x02 (
    name VARCHAR(30) NOT NULL,
    comment VARCHAR(500) NOT NULL
)";

if ($conn->query($createTable) === TRUE) {
    echo "Table xss0x02 created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

$stmt = $conn->prepare("INSERT INTO xss0x02 (name, comment) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $comment);

$name = 'jessamy';
$comment = 'Drones that can create a small area of shade or shield you from rain. They could use advanced weather prediction algorithms and thermal cooling technology to maintain a comfortable temperature and keep you dry.';
$stmt->execute();

$name = 'jeremy';
$comment = 'A device that can record your dreams and play them back to you when you\'re awake.';
$stmt->execute();

$name = 'jessamy';
$comment = 'That\'s a terrible idea...';
$stmt->execute();

$name = 'jeremy';
$comment = 'You\'re a terrible idea!';
$stmt->execute();

echo "xss0x02 records created successfully\n";

// ################################################################################################
// Setup XSS 0x03
// ################################################################################################
$dropTable = "DROP TABLE IF EXISTS xss0x03";
if ($conn->query($dropTable) === TRUE) {
    echo "Table xss0x03 dropped successfully\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}

$createTable = "CREATE TABLE xss0x03 (
    name VARCHAR(30) NOT NULL,
    message VARCHAR(500) NOT NULL
)";

if ($conn->query($createTable) === TRUE) {
    echo "Table xss0x03 created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

$stmt = $conn->prepare("INSERT INTO xss0x03 (name, message) VALUES (?, ?)");
$stmt->bind_param("ss", $name, $comment);

$name = 'jessamy';
$comment = 'Hi admin!';
$stmt->execute();

echo "xss0x03 records created successfully\n";

// ################################################################################################
// Setup Command Injection 0x03
// ################################################################################################
$dropTable = "DROP TABLE IF EXISTS c0x03";
if ($conn->query($dropTable) === TRUE) {
    echo "Table c0x03 dropped successfully\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}

$createTable = "CREATE TABLE c0x03 (
    registration VARCHAR(30) NOT NULL,
    positionx INT,
    positiony INT,
    status VARCHAR(50) NOT NULL,
    destinationx INT,
    destinationy INT
)";

if ($conn->query($createTable) === TRUE) {
    echo "Table c0x03 created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

$stmt = $conn->prepare("INSERT INTO c0x03 (registration, positionx, positiony, status, destinationx, destinationy) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("siisii", $registration, $positionx, $positiony, $status, $destinationx, $destinationy);

$registration = 'ASH';
$positionx = '100';
$positiony = '200';
$status = 'parked';
$destinationx = '100';
$destinationy = '200';
$stmt->execute();

$registration = 'LJG';
$positionx = '105';
$positiony = '55';
$status = 'moving';
$destinationx = '200';
$destinationy = '200';
$stmt->execute();

$registration = 'UYG';
$positionx = '145';
$positiony = '230';
$status = 'moving';
$destinationx = '200';
$destinationy = '200';
$stmt->execute();

$registration = 'ALG';
$positionx = '400';
$positiony = '105';
$status = 'parked';
$destinationx = '400';
$destinationy = '105';
$stmt->execute();

echo "c0x03 records created successfully\n";

// ################################################################################################
// Setup Authentication 0x02
// ################################################################################################
$dropTable = "DROP TABLE IF EXISTS auth0x02";
if ($conn->query($dropTable) === TRUE) {
    echo "Table auth0x02 dropped successfully\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}

$createTable = "CREATE TABLE auth0x02 (
    username VARCHAR(30) NOT NULL,
    password VARCHAR(500) NOT NULL,
    mfa VARCHAR(10) NOT NULL
)";

if ($conn->query($createTable) === TRUE) {
    echo "Table auth0x02 created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

$stmt = $conn->prepare("INSERT INTO auth0x02 (username, password, mfa) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $password, $mfa);

$username = 'jessamy';
$password = 'pasta';
$mfa = '';
$stmt->execute();

$username = 'jeremy';
$password = '66c53f8b7a7cab26545e81375726e189';
$mfa = '';
$stmt->execute();

echo "a0x02 records created successfully\n";

// ################################################################################################
// Setup Authentication 0x03
// ################################################################################################
$dropTable = "DROP TABLE IF EXISTS auth0x03";
if ($conn->query($dropTable) === TRUE) {
    echo "Table auth0x03 dropped successfully\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}

$createTable = "CREATE TABLE auth0x03 (
    username VARCHAR(30) NOT NULL,
    password VARCHAR(500) NOT NULL,
    lockout_count INT NOT NULL DEFAULT 0
)";

if ($conn->query($createTable) === TRUE) {
    echo "Table auth0x03 created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

$stmt = $conn->prepare("INSERT INTO auth0x03 (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $password);

$username = 'jessamy';
$password = '1q2w3e4r5t6y7u8i9o0p';
$stmt->execute();
$username = 'jeremy';
$password = 'q1w2e3r4t5y6u7i8o9p0';
$stmt->execute();
$username = 'admin';
$password = 'letmein';
$stmt->execute();
$username = 'root';
$password = 'zmxncbvgftr';
$stmt->execute();
$username = 'alex';
$password = 'alexwashere';
$stmt->execute();
$username = 'raj';
$password = 'password123';
$stmt->execute();
$username = 'takeshi';
$password = 'onigiriotebetai';
$stmt->execute();
$username = 'hiro';
$password = 'roosterCarsSunset5';
$stmt->execute();
$username = 'heath';
$password = 'thecybermentor';
$stmt->execute();
$username = 'user1';
$password = 'user1';
$stmt->execute();
$username = 'teamaster';
$password = 'idrinklotsoftea';
$stmt->execute();
$username = 'operator';
$password = 'alskdjfhg';
$stmt->execute();
$username = 'bob';
$password = '123456';
$stmt->execute();
$username = 'alice';
$password = 'password';
$stmt->execute();
$username = 'administrator';
$password = 'cheese';
$stmt->execute();

echo "a0x02 records created successfully\n";

// ################################################################################################
// Setup IDOR 0x01
// ################################################################################################
$dropTable = "DROP TABLE IF EXISTS idor0x01";
if ($conn->query($dropTable) === TRUE) {
    echo "Table idor0x01 dropped successfully\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}

$createTable = "CREATE TABLE idor0x01 (
    id int NOT NULL,
    username VARCHAR(30) NOT NULL,
    address VARCHAR(500) NOT NULL,
    type VARCHAR(10) NOT NULL
)";

if ($conn->query($createTable) === TRUE) {
    echo "Table idor0x01 created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

$userData = [
    ['id' => 1000, 'username' => 'jessamy', 'address' => '10, Rainbow Road, ALU 5QW', 'type' => 'user'],
    ['id' => 1001, 'username' => 'alice', 'address' => '22, Wonderland Ave, LDN 4BD', 'type' => 'user'],
    ['id' => 1002, 'username' => 'bob', 'address' => '33, Builder St, BLD 3KT', 'type' => 'user'],
    ['id' => 1003, 'username' => 'charlie', 'address' => '44, Chocolate Factory, CCF 2JD', 'type' => 'user'],
    ['id' => 1004, 'username' => 'dave', 'address' => '55, Lister Lane, RDD 1HE', 'type' => 'user'],
    ['id' => 1005, 'username' => 'erin', 'address' => '66, Hacker Road, HRK 5GT', 'type' => 'user'],
    ['id' => 1006, 'username' => 'fred', 'address' => '77, Weasley Way, HGP 4RD', 'type' => 'user'],
    ['id' => 1007, 'username' => 'george', 'address' => '88, Weasley Way, HGP 4RD', 'type' => 'user'],
    ['id' => 1008, 'username' => 'harry', 'address' => '99, Potter Drive, HGP 3KT', 'type' => 'admin'],
    ['id' => 1009, 'username' => 'isabelle', 'address' => '11, Lightwood Road, SHW 2EC', 'type' => 'user'],
    ['id' => 1010, 'username' => 'jack', 'address' => '121, Sparrow Street, PRT 4BD', 'type' => 'admin'],
    ['id' => 1011, 'username' => 'kate', 'address' => '131, Duchess Drive, LDN 3AW', 'type' => 'user'],
    ['id' => 1012, 'username' => 'lucy', 'address' => '141, Diamond Street, LDN 2RT', 'type' => 'admin'],
    ['id' => 1013, 'username' => 'mark', 'address' => '151, Twain Road, USA 1MT', 'type' => 'user'],
    ['id' => 1014, 'username' => 'nancy', 'address' => '161, Drew Drive, USA 2ND', 'type' => 'admin'],
    ['id' => 1015, 'username' => 'oliver', 'address' => '171, Twist Street, LDN 3TW', 'type' => 'user'],
    ['id' => 1016, 'username' => 'peter', 'address' => '181, Parker Place, USA 4PP', 'type' => 'user'],
    ['id' => 1017, 'username' => 'quincy', 'address' => '191, Quincy Quay, QQY 5QY', 'type' => 'user'],
    ['id' => 1018, 'username' => 'rachel', 'address' => '202, Green Avenue, USA 6RG', 'type' => 'user'],
    ['id' => 1019, 'username' => 'steve', 'address' => '212, Rogers Road, USA 7SR', 'type' => 'user'],
];

$stmt = $conn->prepare("INSERT INTO idor0x01 (id, username, address, type) VALUES (?, ?, ?, ?)");

foreach ($userData as $user) {
    $stmt->bind_param("isss", $user['id'], $user['username'], $user['address'], $user['type']);
    $stmt->execute();
}

echo "idor0x01 records created successfully\n";

// ################################################################################################
// Setup CSRF 0x01
// ################################################################################################
$dropTable = "DROP TABLE IF EXISTS csrf0x01";
if ($conn->query($dropTable) === TRUE) {
    echo "Table csrf0x01 dropped successfully\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}

$createTable = "CREATE TABLE csrf0x01 (
    username VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL
)";

if ($conn->query($createTable) === TRUE) {
    echo "Table csrf0x01 created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

$stmt = $conn->prepare("INSERT INTO csrf0x01 (username, email) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $email);

$username = 'jeremy';
$email = 'jeremy@jeremy.com';
$stmt->execute();

$username = 'jessamy';
$email = 'jessamy@jessamy.com';
$stmt->execute();

echo "csrf0x01 records created successfully\n";

// ################################################################################################
// Setup CSRF 0x02
// ################################################################################################
$dropTable = "DROP TABLE IF EXISTS csrf0x02";
if ($conn->query($dropTable) === TRUE) {
    echo "Table csrf0x02 dropped successfully\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}

$createTable = "CREATE TABLE csrf0x02 (
    username VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL,
    csrftoken VARCHAR(30)
)";

if ($conn->query($createTable) === TRUE) {
    echo "Table csrf0x02 created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

$stmt = $conn->prepare("INSERT INTO csrf0x02 (username, email) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $email);

$username = 'jeremy';
$email = 'jeremy@jeremy.com';
$stmt->execute();

$username = 'jessamy';
$email = 'jessamy@jessamy.com';
$stmt->execute();

echo "csrf0x02 records created successfully\n";

// ################################################################################################
// Setup API 0x01
// ################################################################################################
$dropTable = "DROP TABLE IF EXISTS api0x01";
if ($conn->query($dropTable) === TRUE) {
    echo "Table api0x01 dropped successfully\n";
} else {
    echo "Error dropping table: " . $conn->error . "\n";
}

$createTable = "CREATE TABLE api0x01 (
    username VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    role VARCHAR(10) NOT NULL,
    bio VARCHAR(150)
)";

if ($conn->query($createTable) === TRUE) {
    echo "Table api0x01 created successfully\n";
} else {
    echo "Error creating table: " . $conn->error . "\n";
}

$stmt = $conn->prepare("INSERT INTO api0x01 (username, password, role, bio) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $username, $password, $role, $bio);

$username = 'jeremy';
$password = 'cheesecake';
$role = 'staff';
$bio = 'Java programmer.';
$stmt->execute();

$username = 'jessamy';
$password = 'tiramisu';
$role = 'admin';
$bio = 'Security engineer.';
$stmt->execute();

echo "api0x01 records created successfully\n";

// ################################################################################################
// Close connections
// ################################################################################################

$stmt->close();
$conn->close();

echo '<html><body><p>You should be good to go now. <a href="/">Click here to return to the labs!</a></p></body></html>';

<?php
require 'db.php';
require 'checks.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bug Bounty Labs</title>
    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <link href="assets/custom.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container px-4 py-5" id="custom-cards">
            <div class="row border-bottom pb-2">
                <div class="col">
                    <h2>Bug Bounty Labs</h2>
                </div>
                <div class="col text-end">
                    <a href="/capstone/index.php" class="btn btn-outline-secondary me-2" data-bs-toggle="modal"
                        data-bs-target="#instructionsModal">Instructions</a>
                </div>
            </div>

            <?php if ($errorMessage) { ?>
            <div class="alert alert-danger" role="alert">
                <p><strong>If you just spun up the labs for the first time, this message is normal,</strong> just click
                    the link below or visit /init.php to setup the database
                    and then come back to index.php afterwards.</p>
                <p><a href="../init.php">Click here to reset the database.</a></p>
                <p><?php echo $errorMessage; ?> </p>
                <p>If the issue persists, try rebuilding the application with
                    <code>sudo docker-compose up --build</code>.
                </p>
                <p>If that doesn't work, drop into discord and provide a screenshot of the error above.</p>
            </div>
            <?php } ?>

            <?php if ($successMessage) { ?>
            <div class="alert alert-success" role="alert">
                <p><?php echo $successMessage; ?></p>
            </div>
            <?php } ?>
            <h1 class="h1-index">Authentication & Authorization Attacks</h1>
            <!-- Authentication & Authorization -->
            <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                        id="card13">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Auth 0x01</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="assets/logo.png" alt="Bootstrap" width="32" height="32">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#geo-fill" />
                                    </svg>
                                    <input type="checkbox" id="checkbox13"
                                        onclick="updateBackground('card13', 'checkbox13')">&nbsp;<a
                                        href='labs/a0x01.php'>Access lab ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                        id="card14">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Auth 0x02</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="assets/logo.png" alt="Bootstrap" width="32" height="32">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#geo-fill" />
                                    </svg>
                                    <input type="checkbox" id="checkbox14"
                                        onclick="updateBackground('card14', 'checkbox14')">&nbsp;<a
                                        href='labs/a0x02.php'>Access lab ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                        id="card15" style="background-image: url('assets/logo-bg.png');background-repeat: no-repeat">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Auth 0x03</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="assets/logo.png" alt="Bootstrap" width="32" height="32">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#geo-fill" />
                                    </svg>
                                    <input type="checkbox" id="checkbox15"
                                        onclick="updateBackground('card15', 'checkbox15')">&nbsp;<a
                                        href='labs/a0x03.php'>Access lab ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                        id="card13">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Auth 0x04</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="assets/logo.png" alt="Bootstrap" width="32" height="32">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#geo-fill" />
                                    </svg>
                                    <input type="checkbox" id="checkbox13"
                                        onclick="updateBackground('card13', 'checkbox13')">&nbsp;<a
                                        href='labs/e0x02.php'>Access lab ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                        id="card14">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Auth 0x05</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="assets/logo.png" alt="Bootstrap" width="32" height="32">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#geo-fill" />
                                    </svg>
                                    <input type="checkbox" id="checkbox14"
                                        onclick="updateBackground('card14', 'checkbox14')">&nbsp;<a
                                        href='labs/api0x01.php'>Access lab ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                        id="card15">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Auth 0x06</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="assets/logo.png" alt="Bootstrap" width="32" height="32">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#geo-fill" />
                                    </svg>
                                    <input type="checkbox" id="checkbox15"
                                        onclick="updateBackground('card15', 'checkbox15')">&nbsp;<a
                                        href='labs/api0x01.php'>Access lab ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <h1 class="h1-index">Injection Attacks</h1>
            <!-- Injection Attacks -->
            <!-- File inclusion -->
            <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                        id="card1">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">File inclusion 0x01</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="assets/logo.png" alt="Bootstrap" width="32" height="32">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#geo-fill" />
                                    </svg>
                                    <input type="checkbox" id="checkbox1"
                                        onclick="updateBackground('card1', 'checkbox1')">&nbsp;<a
                                        href='labs/fi0x01.php'>Access lab ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                        id="card2">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">File inclusion 0x02</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="assets/logo.png" alt="Bootstrap" width="32" height="32">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#geo-fill" />
                                    </svg>
                                    <input type="checkbox" id="checkbox2"
                                        onclick="updateBackground('card2', 'checkbox2')">&nbsp;<a
                                        href='labs/fi0x02.php'>Access lab ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" id="card3"
                        style="background-image: url('assets/logo-bg.png');background-repeat: no-repeat">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">File inclusion 0x03</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="assets/logo.png" alt="Bootstrap" width="32" height="32">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#geo-fill" />
                                    </svg>
                                    <input type="checkbox" id="checkbox3"
                                        onclick="updateBackground('card3', 'checkbox3')">&nbsp;<a
                                        href='labs/fi0x03.php'>Access lab ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SQLi -->
            <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                        id="card1">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">SQL Injection 0x01</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="assets/logo.png" alt="Bootstrap" width="32" height="32">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#geo-fill" />
                                    </svg>
                                    <input type="checkbox" id="checkbox1"
                                        onclick="updateBackground('card1', 'checkbox1')">&nbsp;<a
                                        href='labs/i0x01.php'>Access lab ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                        id="card2">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">SQL Injection 0x02</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="assets/logo.png" alt="Bootstrap" width="32" height="32">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#geo-fill" />
                                    </svg>
                                    <input type="checkbox" id="checkbox2"
                                        onclick="updateBackground('card2', 'checkbox2')">&nbsp;<a
                                        href='labs/i0x02.php'>Access lab ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" id="card3"
                        style="background-image: url('assets/logo-bg.png');background-repeat: no-repeat">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">SQL Injection 0x03</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="assets/logo.png" alt="Bootstrap" width="32" height="32">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#geo-fill" />
                                    </svg>
                                    <input type="checkbox" id="checkbox3"
                                        onclick="updateBackground('card3', 'checkbox3')">&nbsp;<a
                                        href='labs/i0x03.php'>Access lab ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- XSS -->
            <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                        id="card2">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">SQL Injection 0x04</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="assets/logo.png" alt="Bootstrap" width="32" height="32">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#geo-fill" />
                                    </svg>
                                    <input type="checkbox" id="checkbox2"
                                        onclick="updateBackground('card2', 'checkbox2')">&nbsp;<a
                                        href='labs/i0x04.php'>Access lab ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                        id="card4">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">XSS 0x01</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="assets/logo.png" alt="Bootstrap" width="32" height="32">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#geo-fill" />
                                    </svg>
                                    <input type="checkbox" id="checkbox4"
                                        onclick="updateBackground('card4', 'checkbox4')">&nbsp;<a
                                        href='labs/x0x01.php'>Access lab ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                        id="card5">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">XSS 0x02</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="assets/logo.png" alt="Bootstrap" width="32" height="32">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#geo-fill" />
                                    </svg>
                                    <input type="checkbox" id="checkbox5"
                                        onclick="updateBackground('card5', 'checkbox5')">&nbsp;<a
                                        href='labs/x0x02.php'>Access lab ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


            </div>

            <!-- Command inj -->
            <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" id="card6"
                        style="background-image: url('assets/logo-bg.png');background-repeat: no-repeat">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">XSS 0x03</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="assets/logo.png" alt="Bootstrap" width="32" height="32">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#geo-fill" />
                                    </svg>
                                    <input type="checkbox" id="checkbox6"
                                        onclick="updateBackground('card6', 'checkbox6')">&nbsp;<a
                                        href='labs/x0x03.php'>Access lab ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                        id="card7">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Command injection 0x01</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="assets/logo.png" alt="Bootstrap" width="32" height="32">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#geo-fill" />
                                    </svg>
                                    <input type="checkbox" id="checkbox7"
                                        onclick="updateBackground('card7', 'checkbox7')">&nbsp;<a
                                        href='labs/c0x01.php'>Access lab ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>


                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                        id="card8">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Command injection 0x02</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="assets/logo.png" alt="Bootstrap" width="32" height="32">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#geo-fill" />
                                    </svg>
                                    <input type="checkbox" id="checkbox8"
                                        onclick="updateBackground('card8', 'checkbox8')">&nbsp;<a
                                        href='labs/c0x02.php'>Access lab ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SSTI & XXE -->
            <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg" id="card9"
                        style="background-image: url('assets/logo-bg.png');background-repeat: no-repeat">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Command injection 0x03</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="assets/logo.png" alt="Bootstrap" width="32" height="32">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#geo-fill" />
                                    </svg>
                                    <input type="checkbox" id="checkbox9"
                                        onclick="updateBackground('card9', 'checkbox9')">&nbsp;<a
                                        href='labs/c0x03.php'>Access lab ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                        id="card16">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">SSTI 0x01</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="assets/logo.png" alt="Bootstrap" width="32" height="32">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#geo-fill" />
                                    </svg>
                                    <input type="checkbox" id="checkbox16"
                                        onclick="updateBackground('card16', 'checkbox16')">&nbsp;<a
                                        href='http://localhost:81/ssti0x01.php'>Access lab ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                        id="card17" style="background-image: url('assets/logo-bg.png');background-repeat: no-repeat">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">SSTI 0x02</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="assets/logo.png" alt="Bootstrap" width="32" height="32">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#geo-fill" />
                                    </svg>
                                    <input type="checkbox" id="checkbox17"
                                        onclick="updateBackground('card17', 'checkbox17')">&nbsp;<a
                                        href='http://localhost:81/ssti0x02.php'>Access lab ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- SSRF -->
            <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                        id="card17">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">XXE 0x01</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="assets/logo.png" alt="Bootstrap" width="32" height="32">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#geo-fill" />
                                    </svg>
                                    <input type="checkbox" id="checkbox17"
                                        onclick="updateBackground('card17', 'checkbox17')">&nbsp;<a
                                        href='labs/e0x01.php'>Access lab ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                        id="card13">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">SSRF 0x01</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="assets/logo.png" alt="Bootstrap" width="32" height="32">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#geo-fill" />
                                    </svg>
                                    <input type="checkbox" id="checkbox19"
                                        onclick="updateBackground('card19', 'checkbox19')">&nbsp;<a
                                        href='labs/s0x01.php'>Access lab ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                        id="card14">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">SSRF 0x02</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="assets/logo.png" alt="Bootstrap" width="32" height="32">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#geo-fill" />
                                    </svg>
                                    <input type="checkbox" id="checkbox14"
                                        onclick="updateBackground('card14', 'checkbox14')">&nbsp;<a
                                        href='labs/s0x02.php'>Access lab ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <h1 class="h1-index">Other Attacks</h1>
            <!-- File upload -->
            <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                        id="card10">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">File upload 0x01</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="assets/logo.png" alt="Bootstrap" width="32" height="32">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#geo-fill" />
                                    </svg>
                                    <input type="checkbox" id="checkbox10"
                                        onclick="updateBackground('card10', 'checkbox10')">&nbsp;<a
                                        href='labs/f0x01.php'>Access lab ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                        id="card11">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">File upload 0x02</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="assets/logo.png" alt="Bootstrap" width="32" height="32">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#geo-fill" />
                                    </svg>
                                    <input type="checkbox" id="checkbox11"
                                        onclick="updateBackground('card11', 'checkbox11')">&nbsp;<a
                                        href='labs/f0x02.php'>Access lab ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                        id="card12">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">File upload 0x03</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="assets/logo.png" alt="Bootstrap" width="32" height="32">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#geo-fill" />
                                    </svg>
                                    <input type="checkbox" id="checkbox12"
                                        onclick="updateBackground('card12', 'checkbox12')">&nbsp;<a
                                        href='labs/f0x03.php'>Access lab ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- CSRF -->
            <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                        id="card13">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">CSRF 0x01</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="assets/logo.png" alt="Bootstrap" width="32" height="32">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#geo-fill" />
                                    </svg>
                                    <input type="checkbox" id="checkbox19"
                                        onclick="updateBackground('card19', 'checkbox19')">&nbsp;<a
                                        href='labs/csrf0x01.php'>Access lab ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                        id="card14">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">CSRF 0x02</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="assets/logo.png" alt="Bootstrap" width="32" height="32">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#geo-fill" />
                                    </svg>
                                    <input type="checkbox" id="checkbox14"
                                        onclick="updateBackground('card14', 'checkbox14')">&nbsp;<a
                                        href='labs/csrf0x02.php'>Access lab ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                        id="card13">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Open redirect 0x01</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="assets/logo.png" alt="Bootstrap" width="32" height="32">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#geo-fill" />
                                    </svg>
                                    <input type="checkbox" id="checkbox19"
                                        onclick="updateBackground('card19', 'checkbox19')">&nbsp;<a
                                        href='labs/r0x01.php'>Access lab ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- SSRF -->
            <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                        id="card13">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">SSRF 0x01</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="assets/logo.png" alt="Bootstrap" width="32" height="32">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#geo-fill" />
                                    </svg>
                                    <input type="checkbox" id="checkbox19"
                                        onclick="updateBackground('card19', 'checkbox19')">&nbsp;<a
                                        href='labs/s0x01.php'>Access lab ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                        id="card14">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">SSRF 0x02</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="assets/logo.png" alt="Bootstrap" width="32" height="32">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#geo-fill" />
                                    </svg>
                                    <input type="checkbox" id="checkbox14"
                                        onclick="updateBackground('card14', 'checkbox14')">&nbsp;<a
                                        href='labs/s0x02.php'>Access lab ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                        id="card13">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Input validation 0x01</h2>
                            <ul class="d-flex list-unstyled mt-auto">
                                <li class="me-auto">
                                    <img src="assets/logo.png" alt="Bootstrap" width="32" height="32">
                                </li>
                                <li class="d-flex align-items-center me-3">
                                    <svg class="bi me-2" width="1em" height="1em">
                                        <use xlink:href="#geo-fill" />
                                    </svg>
                                    <input type="checkbox" id="checkbox19"
                                        onclick="updateBackground('card19', 'checkbox19')">&nbsp;<a
                                        href='labs/iv0x01.php'>Access lab ></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div>
            <p class="small text-center">Don't forget to take regular breaks, you got this :)</p>
            <p class="small text-center">Practical Bug Bounty Labs Version 1.0</p>
        </div>
        <!-- instructions modal -->
        <div class="modal" id="instructionsModal" tabindex="-1" aria-labelledby="instructionsLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="instructionsModalLabel">Instructions</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h2>Where to begin</h2>
                        <p>Watch the videos from the course, they will guide you through the labs and let you know
                            which ones are challenges.</p>
                        <p>This course and these labs are primarily focussed on helping you build practical skills.
                            Of
                            course we will provide theory and support along the way but hands-on practice is the
                            only
                            way to get good at BugBounty and Web Application Penetration Testing.</p>
                        <p>You're encouraged to test out other tools and scanners too as you go along!</p>
                        <p>I also encorage you to try out attacks you've learned on different labs (e.g. many of
                            them
                            are vulnerable to XSS, not just the XSS ones)</p>
                        <p>To reset the lab databases, visit /init.php</p>
                        <p>If you have issues, ping us a message on discord!</p>
                        <hr>
                        <p>Good luck!</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="assets/popper.min.js"></script>
    <script src="assets/bootstrap.min.js"></script>

    <!-- some custom colours etc -->
    <style>
    .bg-green {
        background-color: #005e1c !important;
    }

    .bg-grey {
        background-color: #212529 !important;
    }
    </style>

    <script>
    window.onload = function() {
        for (let i = 1; i <= 19; i++) {
            if (localStorage.getItem('checkbox' + i) === 'true') {
                document.getElementById('checkbox' + i).checked = true;
                document.getElementById('card' + i).classList.add('bg-green');
            }
        }
    }

    function updateBackground(cardId, checkboxId) {
        var card = document.getElementById(cardId);
        var checkbox = document.getElementById(checkboxId);

        if (checkbox.checked == true) {
            card.classList.add('bg-green');
            card.classList.remove('bg-grey');
            localStorage.setItem(checkboxId, 'true');
        } else {
            card.classList.add('bg-grey');
            card.classList.remove('bg-green');
            localStorage.setItem(checkboxId, 'false');
        }
    }
    </script>

</body>

</html>
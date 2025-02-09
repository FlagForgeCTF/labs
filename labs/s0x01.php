<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSRF 0x01</title>
    <link href="../assets/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/custom.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container px-4 py-5" id="custom-cards">
            <h2 class="pb-2 border-bottom"><a href="../index.php">Labs</a> / SSRF 0x01</h2>

            <div class="p-5 mb-4 bg-light rounded-3">
                <h2>Price comparison</h2>
                <div class="mb-4 bg-light rounded-3">
                    <div class="row">
                        <div class="col-6">
                            <img src="../assets/headphones.png" class="img-fluid">
                        </div>
                        <div class="col-6">
                            <h3>NeuroSync™ PulseWave Headphones</h3>
                            <p>Step into the realm of futuristic auditory experience with the NeuroSync™ PulseWave
                                Headphones. Designed exclusively for the cyberpunk elite, these headphones are not just
                                an accessory, they're an identity.</p>
                            <h4>Unparalleled Connectivity:</h4>
                            <p>Integrated with quantum encryption algorithms, the HackMaster Pro ensures a secure and
                                untraceable connection to the darknet. Whether you're breaching firewalls or navigating
                                through digital labyrinths, this headset keeps you a step ahead of the corporate
                                watchdogs.</p>
                            <h4>Adaptive Neuro-Sync Technology:</h4>
                            <p>Experience a new level of integration with our proprietary Neuro-Sync interface. Plug
                                directly into the virtual world, feeling every pulse, shock, and vibration. These
                                headphones aren't just worn; they're fused, forming a bond with your very thoughts and
                                instincts.</p>
                            <p>RRP: $199</p>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="mb-3">
                            <button data-url="http://localhost/labs/api/thirdparty/amazoom.php" class="btn btn-secondary check-price-btn" style="width: 10em">Check
                                price</button> Amazoom online market place
                        </div>
                        <div class="mb-3">
                            <button data-url="http://localhost/labs/api/thirdparty/allbuymyself.php" class="btn btn-secondary check-price-btn" style="width: 10em">Check
                                price</button> AllBuyMyself shopping
                        </div>
                        <div class="mb-3">
                            <button data-url="http://localhost/labs/api/thirdparty/checkmeout.php" class="btn btn-secondary check-price-btn" style="width: 10em">Check
                                price</button> CheckMeOut market
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="../assets/popper.min.js"></script>
    <script src="../assets/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let buttons = document.querySelectorAll('.check-price-btn');

            buttons.forEach(button => {
                button.addEventListener('click', async (e) => {
                    e.preventDefault();
                    let url = button.getAttribute('data-url');

                    let response = await fetch('/labs/api/vendors_0x01.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            url: url
                        })
                    });

                    let data = await response.json();
                    if (data.status === 'success') {
                        let priceMatch = data.content.match(/"price":(\d+\.\d+)/);
                        if (priceMatch && priceMatch[1]) {
                            let price = parseFloat(priceMatch[1]);
                            button.classList.remove('btn-secondary');
                            button.classList.add('btn-success');
                            button.textContent = `$${price.toFixed(2)}`;
                        } else {
                            button.textContent = 'Error';
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>
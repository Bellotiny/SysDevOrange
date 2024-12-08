<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="https://sandbox.web.squarecdn.com/v1/square.css">
</head>
<body>
    <h1>Complete Your Payment</h1>
    <form id="payment-form" action="<?=BASE_PATH?>/book/payment" method="POST">
        <!-- Card Payment -->
        <h2>Payment Information</h2>
        <div id="card-container"></div>
        <p id="payment-status"></p>
        <label for="amount">Amount (USD):</label>
        <input type="number" id="amount" name="amount" min="0.01" step="0.01" required><br><br>
        <input type="hidden" id="nonce" name="nonce">
        <button type="submit" id="payment-button" disabled>Pay Now</button>
    </form>

    <!-- Square Payment Form JS -->
    <script type="text/javascript" src="https://sandbox.web.squarecdn.com/v1/square.js"></script>
    <script>
        const paymentForm = new SqPaymentForm({
            applicationId: 'sandbox-sq0idb-eIQb8ND_FKRqRMDXWUmEwQ',
            locationId: 'L2G6TE8785THM',
            inputClass: 'sq-input',
            autoBuild: false,
            cardNumber: {
                elementId: 'card-container'
            },
            callbacks: {
                cardNonceResponseReceived: function(errors, nonce, cardData) {
                    if (errors) {
                        document.getElementById('payment-status').innerHTML = errors.map(error => error.message).join('<br>');
                        return;
                    }
                    document.getElementById('nonce').value = nonce;
                    document.getElementById('payment-button').disabled = false;
                }
            }
        });

        paymentForm.build();

        document.getElementById('payment-form').addEventListener('submit', function(event) {
            event.preventDefault();
            paymentForm.requestCardNonce();
        });
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Telkomedika</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}">
</head>
<body>
    <div id="header">
        <header>
            <div class="logo">
                <a href="{{ route('patients.index') }}">
                    <img src="{{ asset('icons/logo.png') }}" alt="Telkomedika">
                </a>
            </div>
        </header>
    </div>

    <div class="checkout-body">
        <h1>Checkout</h1>
        <hr>
        
        <!-- Display Cart Items -->
        <div class="cart-items">
            <h2>Items in Your Cart</h2>
            <ul id="checkout-items">
                <!-- Cart items will be populated here -->
            </ul>
            <p id="checkout-total">Total: Rp0</p>
        </div>

        <div class="checkout-buttons">
            <button onclick="goBack()">Back to Shop</button>
            <button onclick="placeOrder()">Place Order</button>
        </div>
    </div>

    <footer>
        <img src="{{ asset('icons/logo.png') }}" alt="Telkomedika">
    </footer>

    <script>
        // Fetch the cart data (could be done via Laravel session or a front-end state)
        const cart = {!! json_encode($cart) !!};

        function updateCheckout() {
            const checkoutItemsContainer = document.getElementById('checkout-items');
            const checkoutTotalElement = document.getElementById('checkout-total');

            checkoutItemsContainer.innerHTML = '';
            let total = 0;

            // Loop through the cart and create HTML for each item
            for (const [medicineName, details] of Object.entries(cart)) {
                const itemTotal = details.quantity * details.price;
                total += itemTotal;

                const itemElement = document.createElement('li');
                itemElement.className = 'checkout-item';
                itemElement.innerHTML = `
                    <p>${medicineName} - ${details.quantity} x Rp${details.price}</p>
                    <span>Rp${itemTotal.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",")}</span>
                `;
                checkoutItemsContainer.appendChild(itemElement);
            }

            checkoutTotalElement.innerText = `Total: Rp${total.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",")}`;
        }

        function goBack() {
            window.history.back();
        }

        function placeOrder() {
            alert("Order placed successfully!");
            // You can implement actual order placement logic here
            // Example: Sending the cart data to the server to save the order
        }

        // Initialize checkout page with cart data
        updateCheckout();
    </script>
</body>
</html>

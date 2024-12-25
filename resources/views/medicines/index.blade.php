<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telkomedika</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', serif;
        }

        header {
            display: flex;
            background-image: linear-gradient(to right, #EB1F27 , #851216);
            margin-left: 100px;
            padding: 10px;
            padding-bottom: 20px;
            border-radius: 0 0 0 60px;
        
        }

        .logo {
            background-color: #fff;
            border-radius: 50%;
            height: 90px;
            width: 90px;
            margin-left: 50px;    
        }

        .logo img {
            float: left;
            height: 50px;
            margin-left: 15px;
            margin-right: auto;
            margin-top: 20px;
        }

        .medicine_body {
            margin: 50px;
            margin-left: 120px;
            margin-right: 120px;
        }

        .medicine_body h1 {
            font-weight: 600;
        }

        .medicine_body hr {
            height: 3px;
            background-color: #000;
        }

        .search-bar {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        .search-bar input {
            width: 60%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px 0 0 4px;
        }

        .search-bar button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #d32f2f;
            color: white;
            border: none;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
        }

        .search-bar button:hover {
            background-color: #b71c1c;
        }

        .product-list {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 30px;
        }

        .product-card {
            background-color: rgb(255, 255, 255);
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            padding: 20px;
            width: 80%;
            box-shadow: 2px 10px 25px rgba(0, 0, 0, 0.1);           ;
        }

        .product-card img {
            display: flex;
            align-items: center;
            border-radius: 4px;
            width: 120px;
            height: 150px;

        }

        .product-details {
            flex-grow: 1;
            margin-left: 50px;
        }

        .product_text {
            display: flex;
            gap: 300px;
        }

        .product-title {
            font-size: 18px;
            font-weight: bold;
        }

        .product-price {
            font-size: 18px;
            color: #d32f2f;
            font-weight: 600;
        }


        .quantity-controls {
            display: none;
            align-items: center;
            margin-top: 10px;
        }

        .quantity-controls.active {
            display: flex;
        }

        .quantity-controls button {
            background-color: #d32f2f;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 16px;
        }

        .quantity-controls button:hover {
            background-color: #b71c1c;
        }

        .quantity-controls span {
            margin: 0 10px;
            font-size: 16px;
        }

        .add-button {
            background-color: #d32f2f;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            
        }

        .add-button:hover {
            background-color: #b71c1c;
        }

        .cart-summary {
            background-color: #333;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .cart-summary button {
            background-color: #d32f2f;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
        }

        .cart-summary button:hover {
            background-color: #b71c1c;
        }


        footer {
            background-color: #FFE2E3;
            display: flex;
            margin-left: 30px;
            margin-right: 30px;
            border-radius: 40px 40px 0 0;
        }

        footer img{
            margin: 40px;
            width: 150px;
            height: 120px;
        }

        .footer_text {
            display: flex;
            gap: 100px;
            margin: 20px;
            margin-left: 50px;
            text-align: left;
            font-weight: 500;
        }

        .footer_text h1 {
            font-size: 1.5rem;
            color: #851216;
        }

        .footer_opt {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 20px;
        }

        footer hr {
            background-color:#000000;
            width: 300px;
            height: 2px;
        }

    </style>
</head>
<body> 
<div id="header">
    <header>
        <div class="logo">
            <img src="{{ asset('icons/logo.png') }}" alt="Telkomedika">
        </div>
    </header>
</div>

<div class="medicine_body">
    <div class="medicine_title">
        <h1>MEDICINE</h1>
        <hr>
    </div>

    <!-- Search Bar -->
    <div class="search-bar">
        <form action="{{ route('medicines.index') }}" method="GET">
            <input type="text" name="query" placeholder="Example: Bam Panci Bandung 2024" value="{{ request()->input('query') }}">
            <button type="submit">Search</button>
        </form>
    </div>

    <!-- Medicines List -->
    @if($medicines->isEmpty())
        <p>No medicines available.</p>
    @else
        @foreach ($medicines as $medicine)
            <div class="product-list">
                <div class="product-card">
                    <img src="{{ asset('path/to/default/image.jpg') }}" alt="{{ $medicine->medicine_name }}">
                    <div class="product-details">
                        <div class="product_text">
                            <div class="product_text_child">
                                <div class="product-title">{{ $medicine->medicine_name }}</div>
                                <div>Per Strip</div>
                                <div class="stock">Stock: {{ $medicine->stock }}</div>

                                <p>{{ $medicine->description }}</p>
                            </div>
                            <div class="price" data-price="{{ $medicine->price }}">
                                <div class="product-price">Rp{{ number_format($medicine->price, 2, ',', '.') }}</div> 
                            </div>
                        </div>

                        <!-- Add Button with ID -->
                        <button id="add-button-{{ $loop->index }}" class="add-button" onclick="showQuantityControls({{ $loop->index }})">Add</button>

                        <!-- Quantity Controls -->
                        <div class="quantity-controls" id="quantity-controls-{{ $loop->index }}" style="display: none;">
                            <!-- "-" Button -->
                            <button onclick="updateQuantity(-1, {{ $loop->index }})">-</button>
                            <!-- Display the current quantity -->
                            <span id="quantity-{{ $loop->index }}">1</span> 
                            <!-- "+" Button -->
                            <button onclick="updateQuantity(1, {{ $loop->index }})">+</button>
                            <!-- Cancel Text -->
                            <span style="margin-left: 10px; cursor: pointer;" onclick="cancelQuantityControls({{ $loop->index }})">Cancel</span>
                            <!-- Total Price Display -->
                            <span id="total-price-{{ $loop->index }}" style="margin-left: 10px;">Total: Rp{{ number_format($medicine->price, 2, ',', '.') }}</span>
                        </div>

                        <!-- Hidden input to store the maximum quantity -->
                        <input type="hidden" id="max-quantity-{{ $loop->index }}" value="{{ $medicine->stock }}">
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>

<footer>
    <img src="{{ asset('icons/logo.png') }}" alt="telkomedika">
    <div class="footer_text">
        <!-- Footer content -->
        ...
    </div>
</footer>

<script>
// JavaScript functions for handling quantity controls
function showQuantityControls(index) {
    const addButton = document.getElementById(`add-button-${index}`);
    const controls = document.getElementById(`quantity-controls-${index}`);
    
    if (controls && addButton) {
        controls.style.display = 'block'; // Show quantity controls
        addButton.style.display = 'none'; // Hide Add button
    }
}

function updateQuantity(change, index) {
    const quantitySpan = document.getElementById(`quantity-${index}`);
    let currentQuantity = parseInt(quantitySpan.innerText);
    
    // Get the maximum quantity from the hidden input
    const maxQuantity = parseInt(document.getElementById(`max-quantity-${index}`).value);
    
    currentQuantity += change;

    // Ensure quantity doesn't go below 1 or exceed stock
    if (currentQuantity < 1) {
        currentQuantity = 1;
    } else if (currentQuantity > maxQuantity) {
        currentQuantity = maxQuantity;
    }

    quantitySpan.innerText = currentQuantity;

    // Update total price when quantity changes
    updateTotalPrice(index);
}

function updateTotalPrice(index) {
    const quantitySpan = document.getElementById(`quantity-${index}`);
    const priceElement = document.querySelector(`#quantity-controls-${index} .price`);
    
    const unitPrice = parseFloat(priceElement.dataset.price); // Get price from data attribute
    const totalPriceElement = document.getElementById(`total-price-${index}`);

    const totalPrice = unitPrice * parseInt(quantitySpan.innerText);
    
    totalPriceElement.innerText = `Total: Rp${totalPrice.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",")}`; // Format total price
}

function cancelQuantityControls(index) {
    const addButton = document.getElementById(`add-button-${index}`);
    const controls = document.getElementById(`quantity-controls-${index}`);

    if (controls && addButton) {
        controls.style.display = 'none'; // Hide quantity controls
        addButton.style.display = 'inline-block'; // Show Add button again
    }
}
</script>

</body>
</html>
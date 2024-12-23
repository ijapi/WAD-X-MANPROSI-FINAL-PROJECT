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
            margin-top: 20px;
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
    </style>
</head>
<body>

    <div id="header">
        <header>
            <div class="logo">
                <img src="icons/logo.png" alt="Telkomedika">
            </div>
        </header>
    </div>

    <div class="medicine_body">

        <div class="medicine_title">
            <h1>MEDICINE</h1>
            <hr>
        </div>

        <div class="search-bar">
            <input type="text" placeholder="Example: Bam Panci Bandung 2024">
            <button>Search</button>
        </div>

        <div class="product-list">
            <div class="product-card">
                <img src="japi.jpg" alt="Product Image">
                <div class="product-details">
                    <div class="product_text">
                        <div class="product_text_child">
                            <div class="product-title">Obat Keras 120MG 21 Kapsul</div>
                            <div>Per Strip</div>
                            <p>Obat keras enak pakcik dijamin kuat sampai pagi nonstop</p>
                        </div>
                        <div class="price">
                            <div class="product-price">Rp666.100</div>
                        </div>
                    </div>
                <button class="add-button" onclick="showQuantityControls(0)">Add</button>
                <div class="quantity-controls" id="quantity-controls-0">
                    <button onclick="updateQuantity(-1, 0)">-</button>
                    <span id="quantity-0">1</span>
                    <button onclick="updateQuantity(1, 0)">+</button>
                </div>
                </div>
            </div>
        </div>

        <div class="product-list">
            <div class="product-card">
                <img src="japi.jpg" alt="Product Image">
                <div class="product-details">
                    <div class="product_text">
                        <div class="product_text_child">
                            <div class="product-title">Obat Keras 120MG 21 Kapsul</div>
                            <div>Per Strip</div>
                            <p>Obat keras enak pakcik dijamin kuat sampai pagi nonstop</p>
                        </div>
                        <div class="price">
                            <div class="product-price">Rp666.100</div>
                        </div>
                    </div>
                <button class="add-button" onclick="showQuantityControls(0)">Add</button>
                <div class="quantity-controls" id="quantity-controls-0">
                    <button onclick="updateQuantity(-1, 0)">-</button>
                    <span id="quantity-0">1</span>
                    <button onclick="updateQuantity(1, 0)">+</button>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
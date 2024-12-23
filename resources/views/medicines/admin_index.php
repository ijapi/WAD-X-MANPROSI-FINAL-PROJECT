<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Medicine</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    body {
      background-color: #f8f9fa;
    }
    #header {
      margin-bottom: 40px;
    }
    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
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
      height: 50px;
      margin: 20px auto;
    }

    .nav {
      display: flex;
      gap: 30px;
      list-style-type: none;
      padding: 0;
      margin: 0;
    }

    .nav li {
      font-size: 1.3rem;
      color: white;
    }

    .nav li:hover {
      cursor: pointer;
      text-decoration: underline;
    }

    .hero {
      background-image: linear-gradient(to right, #EB1F27 , #851216);
      color: white;
      text-align: center;
      padding: 20px 20px;
      margin-bottom: 40px;
      font-size: 1rem;
      border-radius: 0;
    }

    .table {
  background-color: white;
  border-radius: 10px;
  box-shadow: 0 10px 10px rgba(91, 73, 73, 0.5);
  width: 100%; /* Ensures the table spans the full width of its container */
}

.table th, .table td {
  text-align: center;
  vertical-align: middle;
  padding: 15px; /* Adds extra spacing inside cells */
}

.table th {
  background-color: #851216;
  color: white;
}

.table thead th {
  width: 16.6%; /* Each column gets an equal width */
}

.table td {
  width: 16.6%; /* Ensure data aligns with headers */
  word-wrap: break-word; /* Wraps text to fit within the wider cells */
}


    .btn-primary, .btn-success, .btn-warning, .btn-danger {
      border: none;
      border-radius: 5px;
      color: white;
      width: 100px;
      height: 40px;
      cursor: pointer;
      text-decoration: none;
      margin-bottom: 10px;
    }

    .btn-success { background-color: #28a745; }
    .btn-success:hover { background-color: #218838; }

    .btn-warning { background-color: #ff9900; }
    .btn-warning:hover { background-color: #e68a00; }

    .btn-danger { background-color: #dc3545; }
    .btn-danger:hover { background-color: #c82333; }
  </style>
</head>
<body>
  <!-- Header Section -->
  <div id="header">
    <header>
      <div class="logo">
        <img src="icons/logo.png" alt="Telkomedika">
      </div>
      <ul class="nav">
        <li><a href="#" style="color: white;">Home</a></li>
        <li><a href="#" style="color: white;">About Us</a></li>
        <li><a href="#" style="color: white;">Services</a></li>
        <li><a href="#" style="color: white;">Medicine</a></li>
      </ul>
    </header>
  </div>

  <!-- Hero Section -->
  <div class="hero">
    <h1>Medicine - Telkomedika Clinic</h1>
  </div>

  <!-- Table Section -->
  <body>
    <div class="container">
        <h1>Medicines</h1>
        <button class="btn btn-primary mb-3" onclick="showAddMedicineForm()">Add New Medicine</button>

        <div id="addMedicineForm" style="display: none;">
            <h2>Add New Medicine</h2>
            <form action="add_medicine.php" method="POST">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="number" class="form-control" id="price" name="price" required>
                </div>
                <div class="form-group">
                    <label for="stock">Stock:</label>
                    <input type="number" class="form-control" id="stock" name="stock" required>
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="text" class="form-control" id="image" name="image" required>
                </div>
                <button type="submit" class="btn btn-success">Add Medicine</button>
            </form>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>001</td>
                    <td>Medicine 01</td>
                    <td>medicine 1 mantap bisa membuat awak bergerak nonstop 7 hari 7 malam kuat goyang sampai pagibnenjfbhqberhfwwwwwwbwhefbhwbfhbq3</td>
                    <td>Rp5.000</td>
                    <td>2473</td>
                    <td>asdawd</td>
                    <td>
                        <a href="admin_add.html" class="btn btn-success">Add</a>
                        <a href="edit-profile.html" class="btn btn-warning">Edit</a>
                        <button class="btn btn-danger" onclick="deleteDoctor(1)">Delete</button>
                    </td>
                </tr>
                <!-- Add more rows as necessary -->
            </tbody>
        </table>
    </div>

    <script>
        function showAddMedicineForm() {
            document.getElementById('addMedicineForm').style.display = 'block';
        }
    </script>
</body>
</html>








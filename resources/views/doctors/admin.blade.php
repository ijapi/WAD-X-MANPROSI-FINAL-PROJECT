<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Doctor Profiles</title>
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
  box-shadow: 0 15px 15px rgba(139, 0, 0, 0.5);
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
    <h1>Doctor Profiles - Telkomedika Clinic</h1>
  </div>

  <!-- Table Section -->
  <div class="container">
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Working Hours</th>
            <th>Password</th>
            <th>Specialization ID</th>
            <th>Phone</th>
            <th>License Number</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <!-- Sample Doctor Rows -->
          <tr>
            <td>1</td>
            <td>Dr. John Doe</td>
            <td>johndoe@example.com</td>
            <td>9:00 AM - 5:00 PM</td>
            <td></td>
            <td>1</td>
            <td>+628123456789</td>
            <td>MED123456</td>
            <td>
              <a href="create-doctor.html" class="btn btn-success">Add</a>
              <a href="edit-profile.html" class="btn btn-warning">Edit</a>
              <button class="btn btn-danger" onclick="deleteDoctor(1)">Delete</button>
            </td>
          </tr>
          <!-- Add more rows as necessary -->
        </tbody>
      </table>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

  <script>
    function deleteDoctor(doctorId) {
      if (confirm("Are you sure you want to delete this doctor profile?")) {
        console.log("Doctor ID " + doctorId + " deleted.");
        // Implement delete functionality here (e.g., API call)
      }
    }
  </script>
</body>
</html>
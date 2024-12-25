<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor Profiles</title>
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
    }

    .search-bar {
      display: flex;
      justify-content: center;
      margin: 20px 0;
    }
    .search-bar .form-control {
      width: 60%;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px 0 0 4px;
    }
    .search-bar .btn {
      padding: 10px 20px;
      font-size: 16px;
      background-color: #d32f2f;
      color: white;
      border: none;
      border-radius: 0 4px 4px 0;
      cursor: pointer;
    }
    .search-bar .btn:hover {
      background-color: #b71c1c;
    }
    .card {
      display: flex;
      flex-direction: row;
      border: 2px solid #ddd;
      border-radius: 5px;
      overflow: hidden;
      box-shadow: 0 15px 15px rgba(139, 0, 0, 0.5);
      margin-bottom: 20px;
    }
    .card-img {
      width: 150px;
      height: auto;
      object-fit: cover;
    }
    .card-body {
      padding: 20px;
    }
    .card-title {
      font-size: 1.25rem;
      font-weight: bold;
    }
    .card-text {
      color: #6c757d;
    }
    .btn-primary {
      background-color: #851216;
      border: none;
      border-radius: 5px;
      color: white;
      cursor: pointer;
      text-decoration: none;
    }
    .btn-primary:hover {
      background-color: #A31E2A;
      text-decoration: underline;
    }
    .clinic-text, .working-hours {
      font-size: 1rem;
      color: #6c757d;
    }

    footer {
      background-color: #FFE2E3;
      display: flex;
      margin-left: 30px;
      margin-right: 30px;
      border-radius: 40px 40px 0 0;
    }

    footer img {
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
      width: 300px;
      height: 2px;
      background-color: #000000;
    }
  </style>
</head>
<body>
  <div id="header">
    <header>
      <div class="logo">
        <img src="{{ asset('icons/logo.png') }}" alt="Telkomedika">
      </div>
      <ul class="nav">
        <li><a href="#" style="color: white;">Home</a></li>
        <li><a href="#" style="color: white;">About Us</a></li>
        <li><a href="#" style="color: white;">Services</a></li>
        <li><a href="#" style="color: white;">Medicine</a></li>
      </ul>
    </header>
  </div>

  <div class="hero">
    <h1>FIND A DOCTOR AT TELKOMEDIKA CLINIC</h1>
  </div>

  <div class="search-bar">
    <form action="{{ route('doctors.index') }}" method="GET" class="form-inline justify-content-center">
        <input type="text" name="query" value="{{ request('query') }}" class="form-control mr-2" style="width: 60%;" placeholder="Example: Dr. John Doe">
        <button type="submit" class="btn btn-danger">Search</button>
    </form>
</div>

  <div class="container">
    <div class="row" id="doctor-list">
      @foreach($doctors as $doctor)
      <div class="col-md-6">
        <div class="card">
          <img src="{{ $doctor->image ? asset('images/' . $doctor->image) : asset('images/default.png') }}" class="card-img" alt="{{ $doctor->name }}">
          <div class="card-body">
            <h5 class="card-title">{{ $doctor->name }}</h5>
            <p class="card-text">Specialty: {{ $doctor->specialization->name }}</p>
            <p class="clinic-text">Clinic: Telkomedika</p>
            <p class="working-hours">Working Hours: {{ $doctor->working_hours }}</p>
            <a href="#" class="btn btn-primary">Book Now</a> <!-- Placeholder link -->
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <footer>
        <img src="{{ asset('icons/logo.png') }}" alt="telkomedika">
        <div class="footer_text">
            <div class="book_footer">
                <h1>Book Now</h1>
                <hr>
                <div class="footer_opt">
                    <a href="#">Book Appointment</a>
                </div>
            </div>
            <div class="discover_footer">
                <h1>Discover Us</h1>
                <hr>
                <div class="footer_opt">
                    <a href="#">Services</a>
                    <a href="#">About Us</a>
                    <a href="#">Our Doctors</a>
                </div>
            </div>
            <div class="contact_footer">
                <h1>Contact Us</h1>
                <hr>
                <div class="footer_opt">
                    <a href="tel:1500115">1500115</a>
                    <a href="mailto:cs@telkomedika.co.id">cs@telkomedika.co.id</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
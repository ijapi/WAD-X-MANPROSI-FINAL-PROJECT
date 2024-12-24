@extends('admins.index')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Doctors</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    body {
      background-color: #f8f9fa;
    }

    h1 {
      margin-top:50px;
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
      padding: 8px; /* Adds extra spacing inside cells */
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
      width: 150px;
      height: 40px;
      cursor: pointer;
      text-decoration: none;
      margin-bottom: 5px;
      margin-top:5px;
    }

    .buttonadd {
      border: none;
      border-radius: 5px;
      color: white;
      width: 150px;
      height: 40px;
      cursor: pointer;
      text-decoration: none;
      margin-bottom: 30px;
      margin-top:30px;
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

  <!-- Table Section -->
  <div class="container">
    <h1>Doctors</h1>
    <div class="buttonadd">
      <a href="{{ route('admindoctor.create') }}" class="btn btn-primary">Add Doctor</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Working Hours</th>
                <th>Password</th>
                <th>Specialization Id</th>
                <th>Phone</th>
                <th>License Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($doctors as $doctor)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $doctor->doctor_name }}</td>
                <td>{{ $doctor->email }}</td>
                <td>{{ $doctor->working_hours }}</td>
                <td>{{ $doctor->password }}</td>
                <td>{{ $doctor->specialization_id }}</td>
                <td>{{ $doctor->phone }}</td>
                <td>{{ $doctor->license_number }}</td>
                <td>
                    <a href="{{ route('admindoctor.edit', $doctor->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admindoctor.destroy', $doctor->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this doctor?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function showAddDoctorForm() {
        document.getElementById('addDoctorForm').style.display = 'block';
    }
</script>
</body>
</html>

@endsection

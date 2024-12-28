@extends('admins.index')

@section('content')

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

    .mb-3 {
      display: flex;
      align-items: flex-end;
      justify-content: space-between;
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
      margin-bottom:20px;
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
  <body>
    <div class="container">
        <div class="mb-3">
          <h1>Medicines</h1>
          <div class="buttonadd">
            <a href="{{ route('adminmedicine.create') }}" class="btn btn-primary">Add medicine</a>
          </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($medicines as $medicine)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $medicine->medicine_name }}</td>
                    <td>{{ $medicine->description }}</td>
                    <td>Rp {{ number_format($medicine->price, 0, ',', '.') }}</td> 
                    <td>{{ $medicine->stock }}</td>
                    <td>
                        <a href="{{ route('adminmedicine.edit', $medicine->id) }}" class="btn btn-warning">Edit</a>
                        
                        <form action="{{ route('adminmedicine.destroy', $medicine->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this medicine??')">Delete</button>
                                </form>
                            </td>    
                    </td>
                </tr>
              @endforeach
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

@endsection
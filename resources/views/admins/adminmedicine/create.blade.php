@extends('admins.index')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Medicine - Telkomedika</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      font-family:'Poppins', serif;;
    }

    .btn-primary, .btn-success, .btn-warning, .btn-danger {
      border: none;
      border-radius: 5px;
      color: white;
      width: 100px;
      height: 40px;
      cursor: pointer;
      text-decoration: none;
      margin-top: 15px;
      margin-bottom: 15px;
    }

    .btn-warning { background-color: #ff9900; }
    .btn-warning:hover { background-color: #e68a00; }

    .btn-danger { background-color: #dc3545; }
    .btn-danger:hover { background-color: #c82333; }

    .btn-success { background-color: #28a745; }
    .btn-success:hover { background-color: #218838; }

    .modal-header {
      background-color: #851216;
      color: white;
      border-bottom: none;
    }

    .modal-content {
      border-radius: 15px;
      box-shadow: 0 15px 15px rgba(139, 0, 0, 0.5);
    }

    .modal-body {
      padding: 20px 30px;
    }

    .form-control {
      border-radius: 5px;
    }

    .text-right .btn {
      margin-left: 10px;
    }
  </style>
</head>
<body>
  <div class="modal fade" id="addMedicineModal" tabindex="-1" role="dialog" aria-labelledby="addMedicineModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="container mt-4">
              <h1>Add Medicine</h1>

              <form action="{{ route('adminmedicine.store') }}" method="POST">
                  @csrf
                  <div class="form-group">
                      <label for="medicine_name">Name</label>
                      <input type="text" class="form-control" id="medicine_name" name="medicine_name" required>
                  </div>
                  <div class="form-group">
                      <label for="description">Description</label>
                      <input type="text" class="form-control" id="description" name="description" required>
                  </div>
                  <div class="form-group">
                      <label for="price">Price</label>
                      <input type="number" class="form-control" id="price" name="price" required>
                  </div>
                  <div class="form-group">
                      <label for="stock">Stock</label>
                      <input type="number" class="form-control" id="stock" name="stock" required>
                  </div>
                  <button type="submit" class="btn btn-success">Add</button>
                  <a href="{{ route('adminmedicine.index') }}" class="btn btn-danger">Cancel</a>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>

 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#addMedicineModal').modal('show');

      $('#addMedicineForm').on('submit', function(event) {
        event.preventDefault();
        const newMedicine = {
          ID: $('#newMedicineID').val(),
          Name: $('#newMedicineName').val(),
          Description: $('#newMedicineDescription').val(),
          Price: $('#newMedicinePrice').val(),
          Stock: $('#newMedicineStock').val(),
          Image: $('#newMedicineImage').val(),
        };

        console.log('New Medicine Added:', newMedicine);

        $('#addMedicineModal').modal('hide');
      });
    });
  </script>
</body>
</html>

@endsection
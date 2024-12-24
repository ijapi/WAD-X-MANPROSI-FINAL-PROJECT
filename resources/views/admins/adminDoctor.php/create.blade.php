@extends('admins.index')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Doctor - Telkomedika</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
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

    /* Modal Styling */
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
  <!-- Add Doctor Modal -->
  <div class="modal fade" id="addDoctorModal" tabindex="-1" role="dialog" aria-labelledby="addDoctorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="container mt-4">
          <h1>Add Doctor</h1>

          <form action="{{ route('admindoctor.store') }}" method="POST">
            @csrf

            <div class="form-group">
              <label for="name">Full Name</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
              <label for="working_hours">Working Hours</label>
              <input type="text" class="form-control" id="working_hours" name="working_hours" required>
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="form-group">
              <label for="specialization_id">Specialization</label>
              <select class="form-control" id="specialization_id" name="specialization_id" required>
                @foreach ($specializations as $specialization)
                  <option value="{{ $specialization->id }}">
                    {{ $specialization->name }}
                  </option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="phone">Phone Number</label>
              <input type="text" class="form-control" id="phone" name="phone" required>
            </div>

            <div class="form-group">
              <label for="license_number">Medical License Number</label>
              <input type="text" class="form-control" id="license_number" name="license_number" required>
            </div>

            <button type="submit" class="btn btn-success">Add Doctor</button>
            <a href="{{ route('admindoctor.index') }}" class="btn btn-danger">Cancel</a>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

  <script>
    $(document).ready(function() {
      // Automatically open the modal for adding a doctor
      $('#addDoctorModal').modal('show');

      // Submit form logic
      $('#addDoctorForm').on('submit', function(event) {
        event.preventDefault();
        const newDoctor = {
          Name: $('#name').val(),
          Email: $('#email').val(),
          WorkingHours: $('#working_hours').val(),
          Password: $('#password').val(),
          Specialization: $('#specialization_id').val(),
          Phone: $('#phone').val(),
          LicenseNumber: $('#license_number').val(),
        };

        // For demonstration, log the new doctor data
        console.log('New Doctor Added:', newDoctor);

        // Close modal (in a real app, send this data to the server)
        $('#addDoctorModal').modal('hide');
      });
    });
  </script>
</body>
</html>

@endsection

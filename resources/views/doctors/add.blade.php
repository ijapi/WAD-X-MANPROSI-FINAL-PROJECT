<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Doctor Modal - Telkomedika</title>
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
        <div class="modal-header">
          <h5 class="modal-title" id="addDoctorModalLabel">Add New Doctor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="addDoctorForm">
            <div class="form-group">
              <label for="newDoctorName">Name</label>
              <input type="text" class="form-control" id="newDoctorName" name="doctorName" required>
            </div>
            <div class="form-group">
              <label for="newDoctorEmail">Email</label>
              <input type="email" class="form-control" id="newDoctorEmail" name="doctorEmail" required>
            </div>
            <div class="form-group">
              <label for="newDoctorPhone">Phone</label>
              <input type="text" class="form-control" id="newDoctorPhone" name="doctorPhone" required>
            </div>
            <div class="form-group">
              <label for="newDoctorLicense">License Number</label>
              <input type="text" class="form-control" id="newDoctorLicense" name="doctorLicense" required>
            </div>
            <div class="form-group">
              <label for="newDoctorSpecialty">Specialty</label>
              <input type="text" class="form-control" id="newDoctorSpecialty" name="doctorSpecialty" required>
            </div>
            <div class="form-group">
              <label for="newDoctorSpecializationId">Specialization ID</label>
              <input type="number" class="form-control" id="newDoctorSpecializationId" name="doctorSpecializationId" required>
            </div>
            <div class="form-group">
              <label for="newDoctorClinic">Clinic</label>
              <input type="text" class="form-control" id="newDoctorClinic" name="doctorClinic" required>
            </div>
            <div class="form-group">
              <label for="newDoctorHours">Working Hours</label>
              <input type="text" class="form-control" id="newDoctorHours" name="doctorHours" required>
            </div>
            <div class="text-right">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-success">Add</button>
            </div>
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
          name: $('#newDoctorName').val(),
          email: $('#newDoctorEmail').val(),
          phone: $('#newDoctorPhone').val(),
          licenseNumber: $('#newDoctorLicense').val(),
          specialty: $('#newDoctorSpecialty').val(),
          specializationId: $('#newDoctorSpecializationId').val(),
          clinic: $('#newDoctorClinic').val(),
          hours: $('#newDoctorHours').val(),
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
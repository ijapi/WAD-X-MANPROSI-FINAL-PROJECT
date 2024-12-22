<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Doctor Modal - Telkomedika</title>
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
  <!-- Edit Doctor Modal -->
  <div class="modal fade" id="editDoctorModal" tabindex="-1" role="dialog" aria-labelledby="editDoctorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editDoctorModalLabel">Edit Doctor Information</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="editDoctorForm">
            <input type="hidden" id="doctorId" name="doctorId">

            <!-- Full Name -->
            <div class="form-group">
              <label for="doctorName">Name</label>
              <input type="text" class="form-control" id="doctorName" name="doctorName" required>
            </div>

            <!-- Email -->
            <div class="form-group">
              <label for="doctorEmail">Email</label>
              <input type="email" class="form-control" id="doctorEmail" name="doctorEmail" required>
            </div>

            <!-- Working Hours -->
            <div class="form-group">
              <label for="doctorHours">Working Hours</label>
              <input type="text" class="form-control" id="doctorHours" name="doctorHours" required>
            </div>

            <!-- Password -->
            <div class="form-group">
              <label for="doctorPassword">Password</label>
              <input type="password" class="form-control" id="doctorPassword" name="doctorPassword" required>
            </div>

            <!-- Specialization -->
            <div class="form-group">
              <label for="doctorSpecialization">Specialization ID</label>
              <input type="number" class="form-control" id="doctorSpecialization" name="doctorSpecialization" required>
            </div>

            <!-- Phone -->
            <div class="form-group">
              <label for="doctorPhone">Phone</label>
              <input type="text" class="form-control" id="doctorPhone" name="doctorPhone" required>
            </div>

            <!-- License Number -->
            <div class="form-group">
              <label for="doctorLicense">License Number</label>
              <input type="text" class="form-control" id="doctorLicense" name="doctorLicense" required>
            </div>

            <div class="text-right">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-success">Save</button>
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
    function loadDoctorData(doctorId) {
      const doctorData = {
        1: { name: "Dr. John Doe", email: "john.doe@example.com", hours: "9:00 AM - 5:00 PM", password: "password123", specialization: 101, phone: "1234567890", license: "MD123456" },
        2: { name: "Dr. Jane Smith", email: "jane.smith@example.com", hours: "10:00 AM - 6:00 PM", password: "securepass", specialization: 102, phone: "9876543210", license: "MD654321" },
      };

      const doctor = doctorData[doctorId];
      if (doctor) {
        document.getElementById("doctorId").value = doctorId;
        document.getElementById("doctorName").value = doctor.name;
        document.getElementById("doctorEmail").value = doctor.email;
        document.getElementById("doctorHours").value = doctor.hours;
        document.getElementById("doctorPassword").value = doctor.password;
        document.getElementById("doctorSpecialization").value = doctor.specialization;
        document.getElementById("doctorPhone").value = doctor.phone;
        document.getElementById("doctorLicense").value = doctor.license;
      }
    }

    // Automatically trigger the modal and load doctor data on page load
    $(document).ready(function() {
      loadDoctorData(1); // Load data for Doctor ID 1
      $('#editDoctorModal').modal('show'); // Show the modal
    });
  </script>
</body>
</html>
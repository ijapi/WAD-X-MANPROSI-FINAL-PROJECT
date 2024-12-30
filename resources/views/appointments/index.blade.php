<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments - Telkomedika</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('index_appointments.css') }}">
</head>
<style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', serif;
      background-color: #f8f9fa; /* Light background for better contrast */
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
    display: flex;
    justify-content: center;
    align-items: center;
    }

    .logo img {
        width: 50px;
        height: 50px;
        display: block;
        margin: 0 auto;
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

    .form_body {
      margin: 40px auto;
      padding: 20px;
      max-width: 1200px;
      background-color: #fff;
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .form_head h1 {
      font-size: 2.5rem;
      font-weight: 600;
      margin-bottom: 10px;
      color: #851216;
    }

    .form_head p {
      font-size: 1.2rem;
      color: #6c757d;
      margin-bottom: 30px;
    }

    .form_head hr {
      height: 3px;
      background-color: #EB1F27;
      border: none;
      margin-bottom: 20px;
    }

    .appointments_container {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .no_appointments {
      font-size: 1.2rem;
      color: #737373;
      text-align: center;
    }

    .no_appointments a {
      color: #EB1F27;
      text-decoration: none;
      font-weight: 600;
    }

    .no_appointments a:hover {
      text-decoration: underline;
    }

    .appointment_card {
      background-color: #FFE2E3;
      padding: 20px;
      border-radius: 15px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 20px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .appointment_info h3 {
      font-size: 1.5rem;
      font-weight: 500;
      color: #851216;
      margin-bottom: 10px;
    }

    .appointment_info p {
      margin: 5px 0;
      font-size: 1rem;
      color: #6c757d;
    }

    .status {
      font-weight: bold;
      text-transform: capitalize;
    }

    .status.pending {
      color: #FFA500;
    }

    .status.confirmed {
      color: #008000;
    }

    .status.cancelled {
      color: #FF0000;
    }

    .status.completed {
      color: #0066CC;
    }

    .appointment_actions {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .cancel_appointment {
      background-color: #EB1F27;
      color: #fff;
      font-size: 1rem;
      border: none;
      padding: 10px 20px;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .cancel_appointment:hover {
      background-color: #B71C1C;
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

    @media screen and (max-width: 768px) {
      header {
        flex-direction: column;
        text-align: center;
        padding: 20px;
      }

      .form_body {
        margin: 20px;
        padding: 15px;
      }

      .appointment_card {
        flex-direction: column;
        gap: 15px;
      }
  }
</style>
<body>
    <div id="header">
        <header>
            <div class="logo">
                <img src="{{ asset('icons/logo.png') }}" alt="Telkomedika">
            </div>
        </header>
    </div>

    <div class="form_body">
        <div class="form_head">
            <h1>Your Appointments</h1>
            <hr>
            <p>Manage and review your appointments below</p>
        </div>

        <div class="appointments_container">
            @if ($appointments->isEmpty())
                <div class="no_appointments">
                    <p>You have no appointments scheduled. <a href="{{ route('appointments.create') }}">Book an appointment now!</a></p>
                </div>
            @else
                @foreach ($appointments as $appointment)
                <div class="appointment_card">
                    <div class="appointment_info">
                        <h3>Doctor: {{ $appointment->doctor->name ?? 'Not Assigned' }}</h3>
                        <p>Specialization: {{ $appointment->specialization->name }}</p>
                        <p>Date: {{ $appointment->appointment_date }}</p>
                        <p>Status: <span class="status {{ strtolower($appointment->status) }}">{{ $appointment->status_label }}</span></p>
                        <p>Notes: {{ $appointment->notes ?? 'No notes provided' }}</p>
                    </div>
                    <div class="appointment_actions">
                        @if ($appointment->status === 'pending')
                            <form action="{{ route('appointments.cancel', ['id' => $appointment->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="cancel_appointment">Cancel Appointment</button>
                            </form>
                        @endif
                    </div>
                </div>
                @endforeach
                <div class="no_appointments">
                    <p><a href="{{ route('appointments.create') }}">Book another appointment now!</a></p>
                </div>
            @endif
        </div>
    </div>
    <footer>
        <img src="icons/logo.png" alt="telkomedika">
        <div class="footer_text">
            <div class="book_footer">
                <h1>Book Now</h1>
                <hr>
                <div class="footer_opt">
                    <a href="{{ url('appointments') }}">Book Appointment</a>
                </div>
            </div>
            <div class="discover_footer">
                <h1>Discover Us</h1>
                <hr>
                <div class="footer_opt">
                    <a href="#services">Services</a>
                    <a href="#about_us">About Us</a>
                    <a href="{{ url('doctors') }}" >Our Doctors</a>
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
</body>
</html>

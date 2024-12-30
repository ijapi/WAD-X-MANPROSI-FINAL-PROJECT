<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Appointment - Telkomedika</title>

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
        background-color: #f8f9fa;
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
    .specialization_help {
        margin: 25px 0 35px;
        padding: 20px;
        background-color: #FFE2E3;
        border-left: 6px solid #EB1F27;
        border-radius: 10px;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.15);
        text-align: center;
    }

    .specialization_help p {
        margin: 0;
        font-size: 1.2rem;
        line-height: 1.5;
        color: #851216;
        font-weight: 600;
    }

    .specialization_link {
        color: #FFFFFF;
        background-color: #EB1F27;
        padding: 10px 25px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 600;
        display: inline-block;
        margin-top: 10px;
        transition: background-color 0.3s ease;
    }

    .specialization_link:hover {
        background-color: #B71C1C;
        text-decoration: underline;
    }


    .appointment_form {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .form_group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .form_group label {
        font-weight: 600;
        color: #851216;
    }

    .form_group select, .form_group input, .form_group textarea {
        padding: 10px;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 1rem;
        width: 100%;
    }

    .form_group input[type="date"] {
        padding: 8px;
    }

    .form_group textarea {
        resize: vertical;
    }

    .submit_button {
        background-color: #EB1F27;
        color: white;
        padding: 12px 20px;
        font-size: 1rem;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .submit_button:hover {
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
    }
</style>
<body>
    <header>
        <div class="logo">
            <img src="{{ asset('icons/logo.png') }}" alt="Telkomedika">
        </div>
    </header>

    <div class="form_body">
        <div class="form_head">
            <h1>Book an Appointment</h1>
            <hr>
            <p>Fill in the form below to book your appointment</p>
        </div>

        <div class="specialization_help">
            <p>
                <strong>Not sure what specialist to consult?</strong><br>
                Explore our <a href="{{ route('symptoms.index') }}" class="specialization_link">Symptom Checker</a> to find the right care for you.
            </p>
        </div>

        <form method="POST" action="{{ route('appointments.store') }}">
            @csrf

            <div class="appointment_form">
                <div class="form_group">
                    <label for="specialization_id">Specialization</label>
                    <select name="specialization_id" id="specialization_id" required>
                        <option value="">Select Specialization</option>
                        @foreach ($specializations as $specialization)
                            <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form_group">
                    <label for="doctor_id">Doctor</label>
                    <select name="doctor_id" id="doctor_id">
                        <option value="">Select Doctor (Optional)</option>
                        @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form_group">
                    <label for="appointment_date">Appointment Date</label>
                    <input type="date" name="appointment_date" id="appointment_date" required>
                </div>

                <div class="form_group">
                    <label for="notes">Notes</label>
                    <textarea name="notes" id="notes" rows="4" placeholder="Any additional notes"></textarea>
                </div>

                <div class="form_group">
                    <button type="submit" class="submit_button">Book Appointment</button>
                </div>
            </div>
        </form>
    </div>

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


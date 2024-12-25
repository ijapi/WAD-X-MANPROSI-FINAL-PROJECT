<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

    <style>
        .btn-logout {
            display: block;
            width: 100px; 
            padding: 10px;
            align-items: center;
            text-align: center;
            color: #000;
            background-color:  #f1f1f1;
            border: 3px solid #851216; /* Red border */
            border-radius: 5px; /* Rounded corners */
            transition: background-color 0.3s, color 0.3s; /* Smooth transition for hover effects */
        }
    </style>
</head>

<body>
    <aside class="sidebar">
        <ul class="list-unstyled">
            <li>
                <a class="active" href="{{ route('admins.home') }}">
                    TELKOMEDIKA ADMIN
                </a>
            </li>
            <li>
                <a href="{{ route('adminPatient.index') }}" class="sidebar-link">Patient</a>
            </li>
            <li>
                <a href="{{ route('adminmedicine.index') }}" class="sidebar-link">Medicine</a>
            </li>
            <li>
                <a href="{{ route('admindoctors.index') }}" class="sidebar-link">Doctor</a>
            </li>
        </ul>
        <a href="{{ route('views.landing') }}" class="btn btn-logout">Logout</a>
    </aside>

</body>
</html>
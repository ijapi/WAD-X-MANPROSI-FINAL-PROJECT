<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>

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
        </ul>
    </aside>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telkomedika</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/login_user.css') }}">
    
</head>
<body>
    <div id="header">
        <header>
            <div class="logo">
                <img src="{{ asset('icons/logo.png') }}" alt="Telkomedika">
            </div>
        </header>
    </div>

    <div class="form_body">
        <div class="login_head">
            <h1>Login to Account (Admin Portal)</h1>
            <hr>
        </div>

        <div class="login_body">
            <div class="circles">
                <div class="c1">
                    <img src="{{ asset('icons/circle 1.png') }}">
                </div>
                <div class="c2">
                    <img src="{{ asset('icons/circle 2.png') }}">
                </div>
            </div>
            <form action="{{ route('admins.login') }}" method="POST">
                @csrf
                <div class="form_box">
                    <div class="form_input">
                        <label for="username">Admin Username</label>
                        <input type="text" id="username" name="username" placeholder="Username" value="{{ old('username') }}" required>
                        @error('username')
                            <div class="error_message">
                                {{ $message }}
                            </div>
                        @enderror

                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" required>
                        @error('password')
                            <div class="error_message">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="show_password">
                            <input type="checkbox" name="show_password" onclick="myFunction()">Show Password
                        </div>
                    </div>
                </div> 
                <div class="buttons">
                    <button type="button" class="cancel">Cancel</button>
                    <button type="submit" class="login_account">Login</button>
                </div>
                <div class="login_admin">
                    <a href="{{ url('patients/login') }}">Or Log In as Patient</a>
                </div> 
            </form>
        </div>
    </div>

</body>

<script>
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
</html>
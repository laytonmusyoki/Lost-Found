<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('auth/style.css') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset password</title>
</head>
<body>
    <div class="box">
        <h3>RESET PASSWORD!!!</h3>
        <form action="" method="post">
            <div class="form-inputs">
                <label for="">Password</label>
                <input type="password" placeholder="Enter password">
                <label for="">Confirm Password</label>
                <input type="password" placeholder="Confirm password">

                <button type="submit" class="button">Reset</button>
                <p style="margin-top: 10px; text-align: center;">Already have an account <a href="{{ route('auth.login') }}" style="text-decoration: none; color: blu;">Login</a> </p>
            </div>
        </form>
    </div>
</body>
</html>
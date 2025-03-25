<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('auth/style.css') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>lOGIN</title>
</head>
<body>
    <div class="box">
        <h3>WELCOME BACK!!!</h3>
        <form action="" method="post">
            <div class="form-inputs">
                <label for="">Email</label>
                <input type="email" placeholder="Enter Email">
                <label for="">Password</label>
                <input type="password" placeholder="Enter password">
                <a href="{{ route('auth.forgot') }}" style="float: right; color: rgb(48, 48, 48); text-decoration: none; margin-bottom: 5px; ">Forgot password</a>
                <button type="submit" class="button">Sign in</button>
                <p style="margin-top: 10px; text-align: center;">Don't have an account <a href="{{ route('auth.register') }}" style="text-decoration: none; color: blu;">Register</a> </p>
            </div>
        </form>
    </div>
</body>
</html>
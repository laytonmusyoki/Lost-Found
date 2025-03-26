<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('auth/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot</title>
</head>
<body>
    <div class="box">
        <h3>FORGOT PASSWORD!!!</h3>
        <form action="{{route('auth.forgotpost')}}" method="post">
            @csrf
            <div class="form-inputs">
                <label for="">Email</label>
                <input type="email" placeholder="Enter Email" name="email">
                <button type="submit" class="button">Forgot</button>
                <p style="margin-top: 10px; text-align: center;">Already have an account <a href="{{ route('auth.login') }}" style="text-decoration: none; color: blu;">Login</a> </p>
            </div>
        </form>
    </div>
    <x-sweet-alert/>
</body>
</html>

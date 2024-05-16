<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Link -->
    <link rel="stylesheet" href="{{ '../css/register.css' }}">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
</head>
<body>
    <div class="wrapper">
    <form action="/account" method="POST" enctype="multipart/form-data">
    @csrf
    <h1>Register</h1>

    <div class="input-box">
        <input class="form-controll form-control-sm" type="text" name="name" id="name" placeholder="Nama">
    </div>

    <div class="input-box">
        <input class="form-controll form-control-sm" type="email" name="email" id="email" placeholder="Email">
    </div>

    <div class="input-box">
        <input class="form-controll form-control-sm" type="password" name="password" id="password" placeholder="Password">
    </div>

    <div class="input-box">
        <input class="form-controll form-control-sm" type="password" name="passwordconfirm" id="passwordconfirm" placeholder="Confrim Password">
    </div>


    <button class="btn" type="submit">Create Account</button>

    <div class="register-link">
            <p>Already have an account? <a 
            href="/account">Login</a></p>
         </div>
    </form>
    </div>
</body>
</html>
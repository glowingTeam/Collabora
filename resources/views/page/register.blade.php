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
            <form id="registerForm" action="/account" method="POST" enctype="multipart/form-data">
                @csrf
                <h1>Register</h1>
            
                <div class="input-box">
                    <input class="form-controll form-control-sm" type="text" name="name" id="name" placeholder="Nama" required>
                </div>
            
                <div class="input-box">
                    <input class="form-controll form-control-sm" type="email" name="email" id="email" placeholder="Email" required>
                </div>
            
                <div class="input-box">
                    <input class="form-controll form-control-sm" type="password" name="password" id="password" placeholder="Password" required>
                </div>
            
                <div class="input-box">
                    <input class="form-controll form-control-sm" type="password" name="password_confirmation" id="passwordconfirm" placeholder="Confirm Password" required>
                </div>
            
                <button class="btn" type="submit">Create Account</button>
            
                <div class="register-link">
                    <p>Already have an account? <a href="/account">Login</a></p>
                </div>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById('registerForm');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                fetch('/account', {
                    method: 'POST',
                    body: new FormData(form),
                    headers: {
                        'Accept': 'application/json' // Important to expect JSON
                    }
                })
                .then(response => response.json()) // Parse JSON response
                .then(data => {
                    if (data.message) {
                        Swal.fire({
                            title: 'Success!',
                            text: data.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/account'; // Redirect to login page
                            }
                        });
                    } else if (data.error) {
                        Swal.fire({
                            title: 'Error!',
                            text: data.error,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                })
                .catch(error => {
                    console.error('Unexpected error:', error);
                    Swal.fire({
                        title: 'Error!',
                        text: 'Unexpected error occurred.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                });
            });
        });

        </script>
    </body>
</html>
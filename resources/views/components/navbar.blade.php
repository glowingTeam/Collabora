<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Collabora</title>

  <!-- CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Sytle -->
  <link rel="stylesheet" href="{{ '../css/navbar.css' }}">
</head>

<body>
<!-- Start Navbar -->
<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand me-auto" href="/dashboard"><b>Collabora</b></a>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
     
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
          
          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="/">Volenteer</a>
          </li>

          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="/event">Event</a>
          </li>

          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="/event">Manage Account</a>
          </li>

          <li class="nav-item">
            <a class="nav-link mx-lg-2" href="/event">Manage Event</a>
          </li>
        </ul>
        <a href="/" class="logout-button">Logout</a>
    <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    </nav>
<!-- End Navbar -->

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <!-- Start Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <a class="navbar-brand me-auto" href="/dashboard"><b>Collabora</b></a>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><b>Collabora</b></h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">

            <li class="nav-item">
              <a class="nav-link mx-lg-2" href="/dashboard">Dashboard</a>
            </li>
            @if(session('account')['role']=='user')
            <li class="nav-item">
              <a class="nav-link mx-lg-2" href="/event">Event</a>
            </li>
            @else(session('account')['role']=='admin')
            <li class="nav-item">
              <a class="nav-link mx-lg-2" href="/admin/manage-account">Manage Account</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link mx-lg-2" href="/admin/manage-event">Manage Event</a>
            </li>
            @endif
          </ul>
          {{-- <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark ">
            <div class="container-fluid ">
              <a class="navbar-brand text-light" href="/">Collabora</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse  navbar-collapse " id="navbarNavAltMarkup">
                <div class="navbar-nav">
                  <a class="nav-link text-light" aria-current="page" href="/dashboard">Dashboard</a>
                  <a class="nav-link text-light" href="/event">Event</a>
                  <a class="nav-link text-light" href="/volunteer">Volunteer</a>
                  <div class="dropdown ">
                    <ul class="navbar-nav">
                      <li class="nav-item dropdown">
                        <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                          Manage
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                          <li><a class="dropdown-item" href="/admin/manage-event">Manage Event</a></li>
                          <li><a class="dropdown-item" href="/admin/manage-account">Manage Account</a></li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                  <div class="navbar-nav ml-auto">
                    <a class="nav-link text-light btn btn-light text-dark" href="/account">Login</a>
                  </div>
                </div>
              </div>
            </div>
          </nav> --}}
            <a href="/logout" class="logout-button" onclick="return confirm ('Apakah anda yakin untuk melakukan logout?')">Logout</a>
            <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas"
              data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
        </div>
  </nav>
  <!-- End Navbar -->


  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

</body>

</html>
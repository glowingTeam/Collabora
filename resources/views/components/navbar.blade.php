<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark ">
    <div class="container-fluid ">
      <a class="navbar-brand text-light" href="/">Collabora</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse  navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link text-light" aria-current="page" href="/dashboard">Dashboard</a>
          <a class="nav-link text-light" href="/event">Event</a>

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

          <!-- <div class="navbar-nav ml-auto">
            <a class="nav-link text-light btn btn-light text-dark"  href="/account">Login</a>
          </div> -->
          {{-- <a class="nav-link disabled" aria-disabled="true">Disabled</a> --}}
        </div>
      </div>
    </div>
  </nav>
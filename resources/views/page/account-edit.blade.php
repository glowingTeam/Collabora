@extends('layouts.admin')

@section('content')
    <br>
    <br>
    <br>
    <div class="w-50 center border px-3 py-3 mx-auto bg-light p-3 ktk">
        <h1>Edit Account</h1>
        <form id="updateEventForm" action="/account/{{ $account->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">nama</label>
                <br>
                <input class="form-control form-control-sm" type="string" name="name" id="name"
                    value="{{ $account->name }}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <br>
                <input class="form-control form-control-sm" type="email" name="email" id="email"
                    value="{{ $account->email }}">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <br>
                <input class="form-control form-control-sm" type="password" name="password" id="password"
                    value="{{ $account->password }}">
            </div>

            <div class="d-flex justify-content-center gap-2">
                <button class="btn btn-warning" type="submit">Update</button>
                <a href="/account"> <button class="btn btn-danger">Cancel</button> </a>
            </div>
        </form>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </div>
    
    <!-- Include SweetAlert2 Library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Script to Handle Form Submission -->
    <script>
        // Pastikan ini dijalankan setelah DOM selesai dimuat
        document.addEventListener("DOMContentLoaded", function() {
            // Ambil formulir
            const form = document.getElementById('updateEventForm');

            // Tambahkan event listener untuk pengiriman formulir
            form.addEventListener('submit', function(event) {
                // Hentikan aksi default pengiriman formulir
                event.preventDefault();

                // Kirim data formulir menggunakan fetch atau AJAX
                fetch(form.action, {
                    method: 'POST',
                    body: new FormData(form),
                })
                .then(response => {
                    // Periksa status respons
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    // Jika berhasil, tampilkan SweetAlert
                    return Swal.fire({
                        title: 'Success!',
                        text: 'Account has been updated successfully.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        // Redirect ke halaman event setelah menekan tombol OK
                        if (result.isConfirmed) {
                            window.location.href = "/admin/manage-account";
                        }
                    });
                })
                .catch(error => {
                    // Tangani kesalahan jika ada
                    console.error('There was an error!', error);
                    // Tampilkan SweetAlert jika terjadi kesalahan
                    Swal.fire({
                        title: 'Error!',
                        text: 'There was an error while updating the account.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                });
            });
        });
    </script>
@endsection

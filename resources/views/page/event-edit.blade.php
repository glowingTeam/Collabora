@extends('layouts.main')

@section('content')
    <div class="w-50 center border px-3 py-3 mx-auto bg-light p-3 ktk mt-5">
        <h1>Edit Event</h1>
        <form action="/event/update/{{ $eventList->id }}" method="POST" enctype="multipart/form-data" id="updateEventForm">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="name" class="form-label">Name Event</label>
                <br>
                <input class="form-control form-control-sm" type="string" name="name_event" id="name"
                    value="{{ $eventList->name_event }}">
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <br>
                <input class="form-control form-control-sm" type="text" name="location" id="location"
                    value="{{ $eventList->location }}">
            </div>

            <div class="d-flex mb-3">
                <div class="row form-group">
                    <label for="date" class="">Date</label>
                    <div class="col-sm-7">
                        <input class="form-control" type="date" name="date" id="date"
                            value="{{ $eventList->date }}">
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description Event</label>
                <br>
                <textarea class="form-control" type="text" name="description_event" id="description">{{ $eventList->description_event }}</textarea>
            </div>

            <div class="d-flex justify-content-center gap-2">
                <button class="btn btn-warning" type="submit">Update</button>
                <a href="/event" class="btn btn-danger">Cancel</a>
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
                        text: 'Event has been updated successfully.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        // Redirect ke halaman event setelah menekan tombol OK
                        if (result.isConfirmed) {
                            window.location.href = "/event";
                        }
                    });
                })
            });
        });
    </script>
@endsection

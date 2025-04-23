@extends('layouts.main')

@section('content')
    <br>
    <br>
    <br>
    <div class="w-50 center border px-3 py-3 mx-auto bg-light p-3 ktk">
        <h1>Create Event</h1>
        <form action="/event" method="POST" id="eventForm" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name Event</label>
                <br>
                <input class="form-control form-control-sm" type="string" name="name_event" id="name" required
                    aria-label=".form-control-sm">
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <br>
                <input class="form-control form-control-sm" type="text" name="location" id="location" required
                    aria-label=".form-control-sm">
            </div>

            <div class="d-flex mb-3">
                <div class="row form-group">
                    <div class="col-sm-3">
                        <label for="date" class="">Date</label>
                    </div>
                <input type="date" name="date" id="date" class="form-control">
                </div>
                <div class="row mb-3 mx-4">
                    <label for="image" class="form-label mb-3">Upload Logo</label>
                    <input type="file" class="form-control" id="image-file" name="image">
                </div>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description Event</label>
                <br>
                <textarea class="form-control" type="text" name="description_event" id="description" required rows="3"></textarea>
            </div>

            <div class="d-flex justify-content-center gap-2">
                <button class="btn btn-success" type="submit">Create</button>
                <a class="btn btn-danger" href="../event/index">Cancel </a> {{-- eca --}}
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById('eventForm');
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                fetch('/event', {
                    method: 'POST',
                    body: new FormData(form),
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return Swal.fire({
                        title: 'Success!',
                        text: 'Event has been created successfully.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        // redirek
                        if (result.isConfirmed) {
                            window.location.href = "/event";
                        }
                    });
                })
                // kalau eror
                .catch(error => {
                    console.error('There was an error!', error);
                    Swal.fire({
                        title: 'Error!',
                        text: 'There was an error while creating the event.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                });
            });
        });
    </script>
@endsection

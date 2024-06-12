<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Event</title>

    <!-- Link -->
    <link rel="stylesheet" href="{{ '../css/manageac.css' }}">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="path/to/sweetalert2.css">
</head>

<body>
    @extends('layouts.main')

    @section('content')
        <br>
        <br>
        <br>
        <div class="d-flex mb-4">
            <form action="event/search" method="GET" class="d-flex col-4">
                <input class="form-control mme 2 flex-item" type="text" name="search" placeholder="Search Event">
                <button class="btn bg-dark text-white flex-item" type="submit">Search</button>
            </form>

            <div class="d-flex ms-auto">
                <a href="event/create" class="btn btn-dark">Create Data</a>
            </div>
        </div>

        <table class="table bg-light border px-3 evt">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th>Name Event</th>
                    <th>Location</th>
                    <th>Date</th>
                    <th>Deskripsion</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $counter = 1; // Initialize a counter variable
                @endphp
                {{-- Cuma coba ngeluarin data  --}}
                @foreach ($eventList as $item)
                    <tr>
                        <th scope="row">{{ $counter++ }}</th>
                        <td>{{ $item->name_event }}</td>
                        <td>{{ $item->location }}</td>
                        <td>{{ $item->date }}</td>
                        <td>{{ $item->description_event }}</td>
                        <td>
                            <a class="btn btn-outline-secondary" href="/event/show/{{ $item->id }}">Show</a>
                            <a class="btn btn-outline-warning" href="/event/edit/{{ $item->id }}">Edit</a>
                            <a class="btn btn-outline-primary" href="/sponsorship/{{$item->id}}">Sponsors</a>
                            <a class="btn btn-outline-dark"
                            href="{{ route('show.volunteer', ['event' => $item->id]) }}">Request</a>
                            <a class="btn btn-outline-success"
                            href="{{ route('show.accepted.volunteer', ['event' => $item->id]) }}">Member</a>
                            <button class="ml-5 btn btn-outline-danger delete-btn" data-id="{{ $item->id }}">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Include SweetAlert2 Library -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Script to Handle Delete Button Click -->
        <script>
            // Ambil semua tombol delete
            const deleteButtons = document.querySelectorAll('.delete-btn');

            // Tambahkan event listener untuk setiap tombol delete
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Ambil ID acara dari atribut data
                    const eventId = this.getAttribute('data-id');

                    // Tampilkan konfirmasi SweetAlert2
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'You will not be able to recover this event!',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'No, cancel!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirect ke rute penghapusan jika pengguna menekan tombol "Yes, delete it!"
                            window.location.href = `/event/${eventId}`;
                        }
                    });
                });
            });
        </script>
    @endsection
</body>

</html>

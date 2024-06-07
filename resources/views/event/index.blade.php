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
</head>

<body>
    @extends('layouts.main')

    @section('content')
        <br>
        <br>
        <br>
        <div class="d-flex mb-4">
            <form action="/event/search" method="GET" class="d-flex col-4">
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
                    <th>Aksi</th>
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
                            <a class="btn btn-outline-primary" href="/sponsorship">Sponsors</a>
                            <a class="btn btn-outline-dark"
                                href="{{ route('show.volunteer', ['event' => $item->id]) }}">Request</a>
                            <a class="btn btn-outline-success"
                                href="{{ route('show.accepted.volunteer', ['event' => $item->id]) }}">Member</a>
                            <a class="btn btn-outline-danger" href="/event/{{ $item->id }}">Delete</a>
                            {{-- <form action="/event/{{ $item->id }}" method="POST">

                        <div class="d-flex gap-2">
                            <a class="btn btn-secondary btn-sm" href="/event/show/{{ $item->id }}">Show</a>
                            <a class="btn btn-warning btn-sm" href="/event/edit/{{ $item->id }}">Edit</a>
                            <a class="btn btn-danger btn-sm" onclick="return confirm ('Apakah anda yakin untuk menghapus event ini?')" href="/event/{{ $item->id }}">Delete</a>
                            {{-- <form action="/event/{{ $item }}" method="POST">

                                @csrf
                                @method('delete')
                                <button class="btn btn-outline-danger" type="submit" onclick="return confirm ('Apakah anda yakin untuk menghapus event ini?')">Delete</button>
                            </form> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection
</body>

</html>

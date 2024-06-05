<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Event</title>

     <!-- Link -->
     <link rel="stylesheet" href="{{ '../css/manageevent.css' }}">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
</head>
<body>
@extends('layouts.main')

<br>
<br>
<br>

<div class="d-flex ms-auto">
    <a href="event/create" class="btn btn-dark">Create Data</a>
</div>


<table class="table">
    <thead>
        <tr>
            <th>Name Event</th>
            <th>Location</th>
            <th>Date</th>
            <th>Deskripsion</th>
            <th>Aksiiiiiiiiii</th>
        </tr>
    </thead>
    <tbody>
    {{-- Cuma coba ngeluarin data  --}}
         @foreach ($eventList as $item)
            <tr>
                <td>{{ $item->name_event }}</td>
                <td>{{ $item->location }}</td>
                <td>{{ $item->date }}</td>
                <td>{{ $item->description_event }}</td>
                <td>
                    <div>
                        <a class="btn btn-secondary btn-sm" href=''>Edit</a>
                        <form action="/event/{{ $item->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit" onclick="return confirm ('Apakah anda yakin untuk menghapus account ini?')">Delete</button>
                        </form>
                        {{-- <a class="btn btn-secondary btn-sm" href=''>Delete</a> --}}
                    </div>
                </td>
            </tr>
        @endforeach 
    </tbody>
</table>    
@endsection
</body>
</html>
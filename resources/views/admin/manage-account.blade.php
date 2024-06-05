<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Account</title>

    <!-- Link -->
    <link rel="stylesheet" href="{{ '../css/manageac.css' }}">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
</head>
<body>

@extends('layouts.main')
@section('content')
        <br>
        <br>
        <br>
    <div class="d-flex ms-auto">
        <a href="../account/create" class="btn btn-dark">Create Account</a>
    </div>
    <br>
    <table class="table table-light table-hover">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @php
            $counter = 1; // Initialize a counter variable
        @endphp
            @foreach ($accountList as $item)
            <tr>
            <th scope="row">{{ $counter++ }}</th>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>                    
                    <a class="btn btn-outline-dark" href="{{url('account/'.$item->id.'/edit')}}">Edit</a>
                    <a class="btn btn-outline-danger" href= "/account/{{ $item->id }}">Delete</a>
                   
                </div>
            </td>
        </tr>
            @endforeach 
        </tbody>
    </table>
@endsection
</body>
</html>
</body>
</html>
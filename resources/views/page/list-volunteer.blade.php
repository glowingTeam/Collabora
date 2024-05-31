@extends('layouts.main')

@section('content')

    {{-- <div class="d-flex mb-4">
        <form action="" method="GET" class="d-flex col-4">
            <input class="form-control mme 2 flex-item" type="text" name="search" placeholder="Search Event">
            <button class="btn bg-dark text-white flex-item" type="submit">Search</button>
        </form>

        <div class="d-flex ms-auto">
            <a href="event/create" class="btn btn-primary">Create Data</a>
        </div>
    </div> --}}
    
    <table class="table bg-light border px-3 evt">
        <br>
        <br>
        <br>
        <thead>
            <tr>
                <th>Nama Volunteer</th>
                <th>Email</th>
                <th>Tanggal Lahir</th>
                <th>No.HP</th>
                <th>id</th>
                <th>Event</th>
            </tr>
        </thead>
        <tbody>
        {{-- Cuma coba ngeluarin data  --}}
            @foreach ($volunteerList as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->birthdate }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->id}}</td>
                    <td>{{ $item->event['name_event']}}</td>
                        {{-- <div class="d-flex gap-2">
                            <a class="btn btn-secondary btn-sm" href="">Show</a>
                            <a class="btn btn-warning btn-sm" href="">Edit</a>
                            <form action="/event/{{ $item->id }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit" onclick="return confirm ('Apakah anda yakin untuk menghapus event ini?')">Delete</button>
                            </form>
                        </div> --}}
                        {{-- <a class="btn btn-danger btn-sm" href=''>Delete</a> --}}
                    </td>
                </tr>
            @endforeach 
        </tbody>
    </table>
@endsection
@extends('layouts.main')

@section('content')
<br>
<br>
    <div class="d-flex mb-4">
        <form action="/event/search" method="GET" class="d-flex col-4">
            <input class="form-control mme 2 flex-item" type="text" name="search" placeholder="Search Event">
            <button class="btn bg-dark text-white flex-item" type="submit">Search</button>
        </form>

        <div class="d-flex ms-auto">
            <a href="event/create" class="btn btn-primary">Create Data</a>
        </div>
    </div>
    
    <table class="table bg-light border px-3 evt">
        <thead>
            <tr>
                <th>Name Event</th>
                <th>Location</th>
                <th>date</th>
                <th>Deskripsion</th>
                <th>Aksi</th>
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
                        <div class="d-flex gap-2">
                            <a class="btn btn-secondary btn-sm" href="/event/show/{{ $item->id }}">Show</a>
                            <a class="btn btn-warning btn-sm" href="/event/edit/{{ $item->id }}">Edit</a>
                            <a class="btn btn-danger btn-sm" href="/event/{{ $item->id }}">Delete</a>
                            {{-- <form action="/event/{{ $item->id }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit" onclick="return confirm ('Apakah anda yakin untuk menghapus event ini?')">Delete</button>
                            </form> --}}
                            <a class="btn btn-primary btn-sm" href="{{ route('show.volunteer',['event' => $item->id ]) }}">Request</a>
                            <a class="btn btn-success btn-sm" href="{{ route('show.accepted.volunteer',['event' => $item->id ]) }}">Member</a>
                        </div>
                        {{-- <a class="btn btn-danger btn-sm" href=''>Delete</a> --}}
                    </td>
                </tr>
            @endforeach 
        </tbody>
    </table>
@endsection
@extends('layouts.main')

@section('content')

    <div class="d-flex mb-4">
        <form action="" method="GET" class="d-flex col-4">
            <input class="form-control mme 2 flex-item" type="text" name="search" placeholder="Search Event">
            <button class="btn bg-dark text-white flex-item" type="submit">Search</button>
        </form>

        <div class="d-flex ms-auto">
            <a href="event-create" class="btn btn-primary">Create Data</a>
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
                        {{-- <a class="btn btn-secondary btn-sm" href=''>Detail</a> --}}
                        <a class="btn btn-secondary btn-sm" href=''>Edit</a>
                        <a class="btn btn-secondary btn-sm" href=''>Delete</a>
                    </td>
                </tr>
            @endforeach 
        </tbody>
    </table>
@endsection
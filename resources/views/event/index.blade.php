@extends('layouts.main')

@section('content')

    <div class="my-5">
        <a href="event-create" class="btn btn-primary">Create Data</a>
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
             @foreach ($data as $item)
                <tr>
                    <td>{{ $item->name_event }}</td>
                    <td>{{ $item->location }}</td>
                    <td>{{ $item->date }}</td>
                    <td>{{ $item->description_event }}</td>
                    <td><a class="btn btn-secondary btn-sm" href='{{ url('/event/'.$item->name_event) }}'>Detail</a></td>
                </tr>
            @endforeach 
        </tbody>
    </table>
@endsection
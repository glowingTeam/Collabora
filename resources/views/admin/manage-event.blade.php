@extends('layouts.main')

@section('content')
<h1>Admin Manage Event Page</h1>

<div class="d-flex ms-auto">
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

{{-- <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut, harum? Libero non quaerat explicabo officia similique quos laborum incidunt,
dolore accusamus expedita illo eius rem alias deleniti quidem, quo sit?</p> --}}
    
@endsection
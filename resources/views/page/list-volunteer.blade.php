@extends('layouts.main')

@section('content')
    
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
                    </td>
                </tr>
            @endforeach 
        </tbody>
    </table>
@endsection
@extends('layouts.main')
@section('content')
    <div class="mt-5 border p-2 rounded-1 bg-light border">
        <table id="example" class="hover" style="width:100%">
            <thead>
                <tr>
                    <th>Nama sponsor</th>
                    <th>contact</th>
                    <th>logo</th>
                    <th>status</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sponsorshipList as $item)
                    <tr>
                        <td>{{ $item->name_sponsor }}</td>
                        <td>{{ $item->contact }}</td>
                        <td>{{ $item->img }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a class="btn btn-danger btn-sm"href="{{ route('deny.volunteer', ['id' => $item->id]) }}">deny</a>
                            <a class="btn btn-success btn-sm"href="{{ route('accept.volunteer', ['id' => $item->id]) }}">accept</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

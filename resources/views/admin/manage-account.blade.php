@extends('layouts.main')
@section('content')

        {{-- fungsi search --}}
    {{-- <div class="d-flex mb-4">
        <form action="" method="GET" class="d-flex col-4">
            <input class="form-control mme 2 flex-item" type="text" name="search" placeholder="Search Event">
            <button class="btn bg-dark text-white flex-item" type="submit">Search</button>
        </form>
    </div> --}}

    <table class="table bg-light border px-3 evt">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        {{-- Cuma coba ngeluarin data  --}}
            @foreach ($accountList as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>
                        {{-- <a class="btn btn-secondary btn-sm" href=''>Detail</a> --}}
                        <a class="btn btn-warning btn-sm" href=''>Edit</a>
                        <a class="btn btn-danger btn-sm" href=''>Delete</a>
                    </td>
                </tr>
            @endforeach 
        </tbody>
    </table>
@endsection
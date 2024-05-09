@extends('layouts.main')
@section('content')

    <div class="d-flex ms-auto">
        <a href="../account/create" class="btn btn-primary">Create Account</a>
    </div>

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
                        <div class="d-flex gap-2">
                            <a class="btn btn-warning btn-sm" href="/account/{{ $item->id }}">Edit</a>
                            <form action="/account/{{ $item->id }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit" onclick="return confirm ('Apakah anda yakin untuk menghapus account ini?')">Delete</button>
                            </form>
                        </div>
                        {{-- <a class="btn btn-secondary btn-sm" href=''>Detail</a> --}}
                    </td>
                </tr>
            @endforeach 
        </tbody>
    </table>
@endsection
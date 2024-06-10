@extends('layouts.main')
@section('content')
    <div class="mt-5 border p-2 rounded-1 bg-light border">
        <table id="example" class="hover" style="width:100%">
            <thead>
                <tr>
                    <th>Nama sponsor</th>
                    <th>Contact</th>
                    <th>Logo</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sponsorshipList as $item)
                {{-- @php
                    $acc = App\Models\Account::where('id', $item->account_id)->first();
                    // dd($acc);
                @endphp --}}
                    <tr>
                        <td>{{ $item->nama_sponsor }}</td>
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

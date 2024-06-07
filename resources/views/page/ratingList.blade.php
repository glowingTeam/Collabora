@extends('layouts.main')
@section('content')
    <div class="mt-5 border p-2 rounded-1 bg-light border">
        <table id="example" class="hover" style="width:100%">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>rating</th>
                    <th>star</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ratings as $item)
                    {{-- @php
                    $acc = App\Models\Account::where('id', $item->account_id)->first();
                    // dd($acc);
                @endphp --}}
                    <tr>
                        <td>{{ $item->account_id }}</td>
                        <td>{{ $item->feedback }}</td>
                        <td>{{ $item->star }}</td>
                        <td>
                            @if ($item->account_id == session('account')['id'])
                                <form method="POST" action="{{ route('rating.destroy', ['rating' => $item->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger ms-3">Hapus</button>

                                </form>
                            @else
                            <p>Ini Bukan Comment mu</p>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

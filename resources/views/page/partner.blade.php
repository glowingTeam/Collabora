@extends('layouts.main')
@section('content')
    <div class="mt-5 border p-2 rounded-1 bg-light">
        @php

        @endphp
        
        {{-- @php
        dd($volunteerList);
        @endphp --}}
        <table id="example" class="hover" style="width:100%">
            <thead>
                <tr>
                    <th>Nama sponsor</th>
                    <th>Contact</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listSponsor as $item)
                
                    @if ($item->status == 'partner')
                        <tr>
                            <td>{{ $item->nama_sponsor }}</td>
                            <td>{{ $item->contact }}</td>
                            <td>{{ $item->status }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/v/dt/dt-2.0.8/datatables.min.js"></script>
    <script>
        new DataTable('#example');
    </script>
@endpush

@push('css')
    <link href="https://cdn.datatables.net/v/dt/dt-2.0.8/datatables.min.css" rel="stylesheet">
@endpush

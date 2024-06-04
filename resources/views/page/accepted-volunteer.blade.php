@extends('layouts.main')
@section('content')
    
<div class="mt-5 border p-2 rounded-1">

    <table id="example" class="hover" style="width:100%">
        <thead>
            <tr>
                <th>Nama Volunteer</th>
                <th>Email</th>
                <th>No.HP</th>
                <th>Experience</th>
                <th>status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($volunteerList as $item)
            @if ($item->status=='accepted')
                
            <tr>
                <td>{{ $item->account['name'] }}</td>
                <td>{{ $item->account['email'] }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->experience }}</td>
                <td>{{ $item->status }}</td>
            </tr>
            @endif
            @endforeach 
        </tbody>
        <tfoot>
            <tr>
                <th>Nama Volunteer</th>
                <th>Email</th>
                <th>No.HP</th>
                <th>Experience</th>
                <th>Event</th>
            </tr>
        </tfoot>
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
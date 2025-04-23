@extends('layouts.main')

{{-- <table>
    @foreach ($sponsorList as $item)
        @if($item->status == 'request') {
            @if($item->nama_sponsor == '') {
                <p>sponsor kosong</p>
            }
            @endif
        }
        @endif


    @endforeach
</table> --}}

@section('content')
<div class="mt-5 border p-2 rounded-1 bg-light border">

    <div class="d-flex justify-content-center mb-3">
        <a class="btn btn-outline-dark" href="/partner">sponsor</a>
    </div>

    <table id="example" class="hover" style="width:100%">
        <thead>
            <tr>
                <th>Nama Sponsor</th>
                <th>Contact</th>
                <th>Logo</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @php
                $hasSponsor = false;
            @endphp

            @foreach ($sponsorList as $item)
                @if (!empty($item->nama_sponsor) && $item->status == 'request')
                    @php $hasSponsor = true; @endphp
                    <tr>
                        <td>{{ $item->nama_sponsor }}</td>
                        <td>{{ $item->contact }}</td>
                        <td>{{ $item->img }}</td>
                        <td>{{ $item->status }}</td>

                        <td>
                            <a class="btn btn-danger btn-sm" href="{{ route('deny.sponsor', ['id' => $item->id]) }}">deny</a>
                            <a class="btn btn-success btn-sm" href="{{ route('accept.sponsor', ['id' => $item->id]) }}">accept</a>
                        </td>
                    </tr>
                @endif
            @endforeach

            @if (!$hasSponsor)
                <tr>
                    <td colspan="5" class="mt-5 text-center">Tidak ada sponsor.</td>
                </tr>
            @endif

        </tbody>
    </table>

</div>
@endsection


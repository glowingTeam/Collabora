@extends('layouts.main')

@section('content')

<div class="w-50 center border px-3 py-3 mx-auto text-bg-light p-3 ktk">
        <h1>Create Event</h1>
        <form action="/create" method="POST">
            @csrf
            <div class="mb-3">
                <label for="controlInput" class="form-label">Name Event</label>
                <br>
                <input class="form-control form-control-sm" type="text" placeholder="name event" aria-label=".form-control-sm">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">location</label>
                <br>
                <input class="form-control form-control-sm" type="text" placeholder="location" aria-label=".form-control-sm">
            </div>
            <div class="d-flex mb-3">
                <form>
                    <div class="row form-group">
                        <label for="date" class="">Date</label>
                        <div class="col-sm-7">
                            <div class="input-group date" id="datepicker">
                                <input type="text" class="form-control">
                                <span class="input-group-append">
                                    <span class="input-group-text bg-white d-block">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">description</label>
                <br>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="d-flex justify-content-center gap-2">
                <button name="create" type="button" class="btn btn-success">create</button>
                <button name="cancel" type="button" class="btn btn-danger">cancel</button>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        $(function() {
            $('#datepicker').datepicker();
        });
    </script>
@endsection

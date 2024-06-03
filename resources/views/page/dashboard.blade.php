<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Link -->
    <link rel="stylesheet" href="{{ '../css/dashboard.css' }}">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
</head>
<body>
@extends('layouts.main')
@section('content')
<div class="slide-container">
    <div class="slide-content">
        <br>
        <br>
        <br>
        <div class="judul2">
            <h1><b>Hi, {{ session('account')['name'] }}!</b></h1>
        </div>

      
        <section class="container">
            <div class="slide-wrapper">
                <div class="slider">
                <img id="slide-1" src="img/foto1.jpg" alt="" class="card-img">
                <img id="slide-2" src="img/foto2.jpg" alt="" class="card-img">
                <img id="slide-3" src="img/foto3.jpg" alt="" class="card-img">
                </div>
                <div class="slider-nav">
                    <a href="#slide-1"></a>
                    <a href="#slide-2"></a>
                </div>
            </div>
        </section>

        {{-- <div class="judul1">
                    <h2><b>List Volenteer</b></h2>
        </div> --}}
        <br>
        <div class="card-wrapper d-flex flex-row gap-4">
            @foreach ($events as $event )
            <div class="card ">
                
                <div class="image-content">
                    <span class="overlay"> </span>

                        <div class="card-image">
                            <img src="img/potret3.jpg" alt="" class="card-img">
                        </div>
                </div>
                    
                <div class="card-content">
                    <h2 class="name_event">{{ $event->name_event }}</h2>
                    <h4 class="location">{{ $event->location }}</h4>
                    <h6 class="date">{{ $event->date }}</h6>
                    <p class="description">{{ $event->description_event }}</p>
                    
                    <a href="/event/show/{{ $event->id }}"> <button class="button">View More</button></a>
                    <button class="button" data-toggle="modal" data-target="#modalEventRegist{{$event->id}}">Volunteer</button>
                    <div class="modal fade" id="modalEventRegist{{$event->id}}" tabindex="-1" role="dialog" aria-labelledby="modalEventRegistLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalEventRegistLabel">Registration Form</h5>
                                </div>

                                <div class="modal-body">
                                    <form name="formEventRegist" id="formEventRegist" action="{{ route('regist.event',['event' => $event->id]) }}" method="post" enctype="multipart/form-data">
                                        @csrf


                                        <p>
                                        <div class="form-group row">
                                            <label for="phone" class="col-sm-4 col-form-label">HP</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Masukan Nomor Telepon Anda">
                                            </div>
                                        </div>

                                        <p>
                                        <div class="form-group row">
                                            <label for="experience" class="col-sm-4 col-form-label">Pengalaman</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="experience" name="experience" placeholder="Masukkan Pengalaman Anda">
                                            </div>
                                        </div>

                                        <p>
                                        <div class="modal-footer">
                                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="submit" name="eventRegist" class="btn btn-success">Register</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            @endforeach
       </div>
</div>
@endsection
</body>
</html>
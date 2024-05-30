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
        
        <div class="judul2">
            <h1><b>Hi, it's Collabora</b></h1>
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
                    <a href="#slide-3"></a>
                </div>
            </div>
        </section>

        <div class="judul1">
                    <h2><b>List Volenteer</b></h2>
        </div>
        <div class="card-wrapper">
            @foreach ($events as $event )
            <div class="card ">
                
                <div class="image-content">
                    <span class="overlay"> </span>

                        <div class="card-image">
                            <img src="img/potret.png" alt="" class="card-img">
                        </div>
                </div>
                    
                <div class="card-content">
                    <h2 class="name_event">{{ $event->name_event }}</h2>
                    <h4 class="location">{{ $event->location }}</h4>
                    <h6 class="date">{{ $event->date }}</h6>
                    <p class="description">{{ $event->description_event }}</p>
                    
                    <a href="/event/{{ $event->id }}"> <button class="button">View More</button> </a>
                </div>
                
            </div>
            <br>
            @endforeach
        </div>
    </div>
</div>

@endsection
</body>
</html>

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
        <div class="card-wrapper">
            @foreach ($events as $event )
            <div class="card ">
                <div class="image-content">
                    <span class="overlay">  </span>

                        <div class="card-image">
                            <img src="img/potret.png" alt="" class="card-img">
                        </div>
                </div>
                    
                <div class="card-content">
                    <h2 class="name_event">{{ $event->name_event }}</h2>
                    <h2 class="location">{{ $event->location }}</h2>
                    <h2 class="date">{{ $event->date }}</h2>
                    <p class="description">{{ $event->description_event }}</p>
                    
                    <button class="button">View More</button>
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

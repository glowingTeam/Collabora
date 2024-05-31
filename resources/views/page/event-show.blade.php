<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Details</title>
    
    <!-- Link to CSS -->
    <link rel="stylesheet" href="{{ asset('css/showevent.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
</head>
<body>
    
    @extends('layouts.main')
    @section('content')
    <br>
    <br>
    <br>
      <div class="heading">
        <h1><b>{{ $eventList->name_event }}</b></h1>
        <p>{{ $eventList->location }}</p>
      </div>
      <div class="container">
        <section class="show">
            <div class="show-image">
            <img src="../img/foto2.jpg" alt="">
            </div>
            <div class="show-content">

            </div>
        </section>
      </div>
    @endsection
</body>
</html>

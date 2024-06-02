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
  <br>
  <br>
        <div class="heading">
            <h1><b>{{ $eventList->name_event }}</b></h1>
            <p>Tanggal: {{ $eventList->date }}</p>
        </div>
        <div class="container">
            <section class="show">
                <div class="show-image">
                    <img src="{{ asset('img/potret3.jpg') }}" alt="Event Image">
                </div>
                <div class="show-content">
                    <h2>📍{{ $eventList->location }}</h2>
                    <p>{{ $eventList->description_event }}</p>
                    <a href="/dashboard" class="read-more">Back to Dashboard</a>
                </div>
            </section>
        </div>
</body>
</html>

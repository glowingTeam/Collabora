<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Details</title>

    <!-- Link to CSS -->
    <link rel="stylesheet" href="{{ asset('css/showevent.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Link Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @stack('css')
    <!-- Link  JQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Link Boostrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Link Boostrap Date/ Tanggal -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
</head>

<body>

    <br>
    <br>
    <div class="heading">
        <h1><b>{{ $eventList->name_event }}</b></h1>
        <p>Tanggal: {{ $eventList->date }}</p>
    </div>
    <div class="container ">
        <section class="show">
            <div class="show-image">
                <img src="{{ asset('img/potret3.jpg') }}" alt="Event Image">
            </div>
            <div class="show-content">
                <h2>📍{{ $eventList->location }}</h2>
                <p>{{ $eventList->description_event }}</p>
                <p>interested in sponsoring? apply here!</p>
                <button type="button" class="sponsor" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Sponsorship
                </button>
                <a href="/dashboard" class="read-more">Back to Dashboard</a>
            </div>
        </section>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Sponsorship</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form name="formEventShow" id="formEventShow" action="{{ route('addsponsorship') }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            <p>
                            <div class="form-group row">
                                <label for="name_sponsor" class="col-sm-4 col-form-label">Nama Sponsor</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="name_sponsor" name="nama_sponsor"
                                        placeholder="Masukan Nama Sponsor Anda">
                                </div>
                            </div>
                            <p>
                            <div class="form-group row">
                                <label for="Contact" class="col-sm-4 col-form-label">Contact</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="Contact" name="contact"
                                        placeholder="Masukkan Contact Anda">
                                </div>
                            </div>
                            <p>
                            <div class="form-group row">
                                <label for="logo" class="col-sm-4 col-form-label">Upload Logo</label>
                                <div class="col-sm-8">
                                    <input type="file" id="image-file" name="image">
                                </div>
                            </div>
                            <p>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancel</button>
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
</body>

</html>

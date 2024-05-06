@extends('layouts.main')

@section('content')

<div>
    <div class="container flex text-center bs-secondary-bg">

        <form action="" class="d-flex">
            <input class="form-control mme 2" type="search" placeholder="search">
            <button class="btn bg-dark text-white" type="send">Search</button>
        </form>
        <br>
        <div class="bungkus">
            <div class="image">
                <img src="{{ asset('img/potret1.png') }}" alt="Image">
                <div class="content">
                    <h1>Upcoming Events</h1>
                </div>
            </div>
        </div>
        <br>    
        <div class="card-container">
            <div class="card">
                <br>
            <div class="h3"><h2>Goal SGDS</h3></div>
            <div class="alamat"><h6 class="card-subtitle mb-2 text-body-secondary">JL. Jalan  sama kamu</h6></div>
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                <div class="link">
                    <button class="button"><a href="#" class="card-link">See More</a></button>
                </div>
                <br>
            </div>

            <br>
            <div class="card-container">
            <div class="card">
                <br>
            <div class="h3"><h2>Goal SGDS</h3></div>
            <div class="alamat"><h6 class="card-subtitle mb-2 text-body-secondary">JL. Jalan  sama kamu</h6></div>
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                <div class="link">
                    <button class="button"><a href="#" class="card-link">See More</a></button>
                </div>
                <br>
            </div>

            <br>
            <div class="card-container">
            <div class="card">
                <br>
            <div class="h3"><h2>Goal SGDS</h3></div>
            <div class="alamat"><h6 class="card-subtitle mb-2 text-body-secondary">JL. Jalan  sama kamu</h6></div>
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                <div class="link">
                    <button class="button"><a href="#" class="card-link">See More</a></button>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
<br>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5>About Us</h5>
                <p> Hai kami Collabora !</p>
            </div>
            <div class="col-md-4">
                <h5>Contact Us</h5>
                <ul>
                    <li>Address: Telkom University Surabaya</li>
                    <li>Phone: +0987654321</li>
                    <li>Email: collabora@telkomuniversity.ac.id</li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Follow Us</h5>
                <!-- <ul class="social-icons">
                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                </ul> -->
            </div>
        </div>
    </div>
</footer>
<br>
<p>@colabora copyright</p>
@endsection

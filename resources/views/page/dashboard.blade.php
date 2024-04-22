@extends('layouts.main')

@section('content')
<div>
    <div class="container flex text-center bs-secondary-bg">
        <form action="" class="d-flex">
            <input class="form-control mme 2" type="search" placeholder="search">
            <button class="btn bg-dark text-white" type="send">search</button>
        </form>
        <h1>this is dashboard page</h1>

        <!-- <div class="w-50 border py-3 mx-auto bg-white">
            <h1>GOAL SDGS</h1>
            <h5>jl. jalan sama kamu</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce lacinia, erat a ornare eleifend, 
                nulla sapien viverra est, nec tristique nunc mi eget nunc. Nunc laoreet odio eu mauris luctus venenatis. 
                Cras eros ipsum, tristique vitae vulputate et, condimentum et turpis. Cras et malesuada lectus.</p>
        </div> -->
        <div class="card" style="width: 20rem;">
            <div class="card-body center">
                <h5 class="card-title">GOAL SDGS</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">JL. Jalan  sama kamu</h6>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div>
        </div>
    </div>
</div>
@endsection

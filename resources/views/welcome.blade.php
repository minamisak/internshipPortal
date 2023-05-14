@extends('layouts.app')
@section('title', 'ELSweedy Internships')
@section('content')


    <!-- Home Carousel -->
    <div id="home-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('assets/img/slide1.jpeg') }}" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption">
                    <span class="caption-title">Announcement</span>
                    <p class="caption-para">INTERNSHIP PROGRAMS</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/img/slide2.jpg') }}" class="d-block w-100" alt="Slide 2">
                <div class="carousel-caption">
                    <span class="caption-title">Slide 2 Title</span>
                    <p>Slide 2 Description</p>
                    <a href="#" class="btn btn-primary">Register</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/img/slide3.jpg') }}" class="d-block w-100" alt="Slide 3">
                <div class="carousel-caption">
                    <h5>Slide 3 Title</h5>
                    <p>Slide 3 Description</p>
                    <a href="#" class="btn btn-primary">Register</a>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#home-carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">
            </span>
        </a>
        <a class="carousel-control-next" href="#home-carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only"></span>
        </a>
    </div>
    <!-- Body Section -->
<div class="container my-5">
    <div class="row">
        <div class="container my-5">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<a href="{{ route('register.index') }}">Register Now</a></a></p>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Electric Engineer</h5>
                    <p class="card-text">orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Finance specialist</h5>
                    <p class="card-text">orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">HR specialist</h5>
                    <p class="card-text">orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsecsion
<!-- Bootstrap 5 JS Bundle with Popper -->
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

<style>
    
.card {
    height: 400px;
    background-color: #0dbfd6!important;
}

.card-body .btn-primary {
    background-color: #140d45;
    float:right;
}
.carousel-caption{
    bottom: 15.25rem!important;
    right:50%!important;

}
.caption-title{
    font-size: 3.1rem;
    color: #140d45;
}
.caption-para{
    font-size: 3rem;
    color: #0dbfd6;
}

.carousel-item img {
    height: 100vh;
    width: 100%;
    object-fit: cover;
}



</style>
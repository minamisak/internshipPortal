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
            <div class="border rounded p-4 my-3" id="whoweare" style="font-size:14px;margin-top:10px;margin-bottom:10px;">
                <h2 class="text-center mb-4" style="font-size: 3em;margin-bottom:10px;">Who We Are</h2>
                <p>El Sewedy Industries Group was established by Mr. Ahmed Sadek El Sewedy
                in 1938 in Egypt and across the Middle East as one of the market leaders in
                multiple competitive industries today.</p>
                <p>Over the past 80 years, The Group has succeeded in influencing the local
                market in various operational scopes; Energy Solutions, Manufacturing,
                Lighting systems &amp; Fixtures, Building Materials, Retail and Real Estate
                Development.</p>
                <p>The Internship Program is offered by the Industrial Sector covering 4 main
                diversified industries of Lighting, Sheet Metal, Steel and Panels</p>
            </div>
            <div class="border rounded p-3 my-4" style="font-size:14px;margin-top:10px;margin-bottom:10px;">
                <h3 class="text-center mb-4" style="font-size: 2em;">Who can apply (eligibility criteria):</h3>
                <ul>
                    <li>Class 2024 &amp; 2025 are only enrolled for the internship program</li>
                    <li>Student’s last year Grad with minimum Good (Minimum GPA is 2.0)</li>
                    <li>One month is the minimum period for the program enrollment</li>
                    <li>Extracurricular activities and previous internships are desirable</li>
                </ul>
            </div>
            <div class="border rounded p-3 mt-3 mb-3" style="font-size:14px;margin-top:10px;margin-bottom:10px;">
                <h2 class="text-center fw-bold fs-4 mb-4">The selection process consists of four main steps:</h2>
                <ol>
                    <li>Online Application: First, an online application form should be filled in. A link to the application form can be found below.</li>
                    <li>Screening: All applications are screened by the Human Resources Team.</li>
                    <li>Interview: Only semi-finalists will be invited to brief interviews with the Selection Panel lasting up to 20 minutes.</li>
                    <li>Internship Acceptance: those persons who are selected following the previous steps, will receive an e-mail / Call with their internship acceptance.</li>
                </ol>
            </div>
            <div class="rounded p-3 my-4" style="font-size:14px;margin-top:10px;margin-bottom:10px;">
                <h2 class="text-center fs-4 mb-4">Application form and the deadline:</h2>
                <p class="mb-0">All interested candidates are invited to submit their application by the following 
                    <a class="text-decoration-none fw-bold" href="{{ route('register.index') }}">Register link</a> before 10 June. Applications received after this deadline will not be considered.
                </p>
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

<!-- Bootstrap 5 JS Bundle with Popper -->
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
    bottom: 12.25rem!important;
    right:50%!important;

}
.caption-title{
    font-size: 2.1rem;
    color: #140d45;
}
.caption-para{
    font-size: 1rem;
    color: #0dbfd6;
}

.carousel-item img {
    height: 100vh;
    width: 100%;
    object-fit: cover;
}




</style>
<script>
    function showSuccessAlert(type) {
  // Get the alert div
  const alertDiv = document.getElementById("alert");
  
  if(type == 'success'){
    // Create the success alert element
  const successAlert = document.createElement("div");
  successAlert.className = "alert alert-success";
  successAlert.role = "alert";
  
  // Add the message to the alert element
  const textNode = document.createTextNode(message);
  successAlert.appendChild(textNode);
  
  // Add the alert element to the alert div
  alertDiv.appendChild(successAlert);
  
  // Hide the alert after 3 seconds
  setTimeout(() => {
    successAlert.style.display = "none";
  }, 3000);
  }
  else{
    // Create the success alert element
  const errorAlter = document.createElement("div");
  errorAlter.className = "alert alert-danger";
  errorAlter.role = "alert";
  
  // Add the message to the alert element
  const textNode = document.createTextNode(message);
  errorAlter.appendChild(textNode);
  
  // Add the alert element to the alert div
  alertDiv.appendChild(errorAlter);
  
  // Hide the alert after 3 seconds
  setTimeout(() => {
    errorAlter.style.display = "none";
  }, 3000);
  }
}
</script>

@if (session('success'))
    <script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}'
            });
        });
    </script>
@endif

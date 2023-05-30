@extends('layouts.app')
@section('title', 'ELSweedy Internships')
@section('content')
    <!-- Home Carousel -->
    <div id="home-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('assets/img/slide1.jpeg') }}" class="d-block w-100" alt="Slide 1">
                <div class="carousel-caption">
                    <span class="caption-title">Summer Internship <br>Program 2023</span>
                    
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
    <div class="container">
        
                <div class="image">
                    <img src="{{ asset('assets/img/who.jpg') }}" alt="Image">
                </div>
                <div class="content" id="whoweare">
                    <h2 class="text-center mb-4" style="font-size=40px!important;font-weight:700;">Who We Are</h2>
                    <p>
                    <strong>El Sewedy Industries Group</strong> was established by Mr. Ahmed Sadek El Sewedy in 1938 in Egypt and across the Middle East as one of the market leaders in multiple competitive industries today.<br><br>
                    Over the past 80 years, The Group has succeeded in influencing the local market in various operational scopes; Energy Solutions, Manufacturing, Lighting systems & Fixtures, Building Materials, Retail and Real Estate Development.<br><br><br>
                    The Internship Program is offered by the <strong>Industrial Sector</strong> covering 4 main diversified industries of Lighting, Sheet Metal, Steel and Panels.
                    </p>
                </div>
                </div>

                <div class="big-div">
                    <div class="title-div">
                        <h2 class="title">Purpose of the Internship Program</h2>
                    </div>
                    <div class="content">
                        <p>Designed to offer students the opportunity for career exploration, professional development and capability building.</p>
                    </div>
                </div>
                <div class="big-div">
                    
                <div class="title-div">
                        <h2 class="title">Structure of the Internship Program</h2>
                    </div>
                    <div class="content">
                        <p>Designed to offer students the opportunity for career exploration, professional development, and capability building.</p>
                        <p>The internship will last up to one month. Interns will be involved in one of the following areas:</p>
                        <div class="streams">
                        <div class="stream">
                            <h4>Stream 1 (Technical):</h4>
                            <ul>
                            <li>Manufacturing</li>
                            <li>Technical Office</li>
                            <li>Commercial</li>
                            </ul>
                        </div>
                        <div class="stream">
                            <h4>Stream 2 (Non-Technical):</h4>
                            <ul>
                            <li>Finance</li>
                            <li>Human resources</li>
                            <li>Information &amp; Communication Technology (ICT)</li>
                            <li>Supply Chain</li>
                            </ul>
                        </div>
                        </div>
                        <p>Each applicant should choose one of the two streams. Depending on this choice, the intern will be assigned mentors accordingly.</p>
                    </div>
                </div>
                <div class="big-div" id="canapplay">
                        <div class="title-div">
                                <h2 class="title">Who can apply (eligibility criteria)</h2>
                            </div>
                            <div class="content">
                                    <ul>
                                        <li>Class 2024 & 2025 are only enrolled for the internship program </li>
                                        <li>Student’s last year Grad with minimum Good (Minimum GPA is 2.0) </li>
                                        <li>One month is the minimum period for the program enrollment </li>
                                        <li>Extracurricular activities and previous internships are desirable</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                </div>
    </div>
</div>
<div class="separator"></div>
<div class="container my-5">
    
<div class="row">
    
            <div class="big-div">
                    <div class="title-div">
                        <h2 class="title">Selection process </h2>
                    </div>
                    <div class="content">
                        <ol>
                            <li>Online Application: First, an online application form should be filled in. A link to the application form can be found below.</li>
                            <li>S<strong>creening:</strong> All applications are screened by the Human Resources Team.</li>
                            <li><strong>Interview:</strong> Only semi-finalists will be invited to brief interviews with the Selection Panel lasting up to 20 minutes. </li>
                            <li><strong>Internship Acceptance:</strong> those persons who are selected following the previous steps, will receive an e-mail / Call with their internship acceptance.</li>
                        </ol>
                    </div>
                </div>
                <div class="big-div" id="register">
                    <div class="title-div">
                        <h2 class="title">Application form and the deadline</h2>
                    </div>
                    <div class="content">
                        <p>All interested candidates are invited to submit their application by the following link <strong>before 10 June 2023.</strong> </p>
                        <p>Applications received after this deadline will not be considered.</p>
                        <a href="{{ route('register.index') }}" class="button">Apply for the Internship</a>
                    </div>
                    
                </div>
          
                
    
</div>
</div>


<!-- Bootstrap 5 JS Bundle with Popper -->
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<style>
.button {
  display: inline-block;
  background-color: #252A68;
  color: #FFFFFF;
  padding: 10px 20px;
  text-decoration: none;
  border-radius: 5px;
  width: 90%;
margin: 0 auto;
text-align: center;
}

.button:hover {
  background-color: #1E224F;
}


.separator {
    background-image: url('{{ asset("assets/img/selection.jpg") }}');
  background-size: contain;
  background-repeat: no-repeat;
  width: 100%;
  height: 800px;
}
.card {
    height: 400px;
    background-color: #0dbfd6!important;
}

.card-body .btn-primary {
    background-color: #140d45;
    float:right;
}
.carousel-caption{
    background-color: #e8ebe9a6;
    bottom: 12.25rem!important;
    right:50%!important;
    border-radius:29px;

}
.caption-title{
    font-size: 2.1rem;
    font-weight: 700;

    color: #140d45;
}
.caption-para{
    font-size: 2rem;
    color: #140d45;
}

.carousel-item img {
    height: 100vh;
    width: 100%;
    object-fit: cover;
}


/* Home page styles */
.container {
  display: flex;
  font-family: "DM Sans", sans-serif;

}

.content {
  flex: 1;
  font-size: 18px;
  margin-top: 10px;
  margin-bottom: 10px;
}

.image {
  margin-right: 20px;
}

@media (max-width: 767px) {
    .big-div {
    flex-direction: column;
  }

  .content {
    margin-top: 20px;
    margin-left: 0;
  }
  .container {
    flex-direction: column;
  }

  .image {
    margin: 0 auto;
    order: 2;
  }
}
.big-div {
  display: flex;
  padding: 8%;
  margin-top: 2%!important;

  border: 1px solid #ddd;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);

}
.big-div:hover {
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
}

.title-div {
  flex: 1;
  display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
}

.title {
  font-size: 24px;
  text-align:center
}

.content {
  flex: 1;
  margin-left: 20px;
}
.streams {
  display: flex;
  margin-top: 10px;
}

.stream {
  flex: 1;
}

.stream h4 {
  font-size: 18px;
  font-weight: bold;
  margin-bottom: 5px;
}

.stream ul {
  list-style-type: disc;
  padding-left: 20px;
}

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

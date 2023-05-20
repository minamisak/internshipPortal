<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
    <!-- jQuery and Bootstrap 5 JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title>El-Sewedy Industries</title>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #161f6e99; height: 100px;">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('assets/img/logo-1.png') }}" height="80" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#whoweare">Who We Are</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">What We Do</a>
                </li>
            </ul>
        </div>
        <div class="d-flex align-items-center">
            <a href="#" class="btn btn-outline-light mr-2">Login</a>
        </div>
    </div>
</nav>
    <!-- add your navigation menu here -->
    <!-- Login Modal -->

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <img src="{{ asset('assets/img/logo-1.png') }}" style="display: block;width: 60%;margin: 0 auto;" height="80" alt="Logo">
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('processLogin') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="login-btn btn btn-primary" style="display:block;background-color:#1f1759;">Login</button>
        </form>

      </div>
    </div>
  </div>
</div>
<div class="container" style="margin-top: 12%;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus required>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birthdate" class="col-md-4 col-form-label text-md-right">{{ __('Birthdate') }}</label>

                            <div class="col-md-6">
                                <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('birthdate') }}"  autocomplete="birthdate" required>

                                @error('birthdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile Number') }}</label>

                            <div class="col-md-6">
                                <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}"  autocomplete="mobile" required>

                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <select id="city" class="form-control select2 @error('city') is-invalid @enderror" name="city" required>
                                    <option value="" selected disabled>Select City</option>
                                    <option value="Cairo">Cairo</option>
                                    <option value="Giza">Giza</option>
                                    <option value="Sharkia">Sharkia</option>
                                </select>
                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                        <div class="col-md-6">
                            <textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address" >{{ old('address') }}</textarea>

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="university" class="col-md-4 col-form-label text-md-right">{{ __('University') }}</label>

                        <div class="col-md-6">
                            <input id="university" type="text" class="form-control @error('university') is-invalid @enderror" name="university" value="{{ old('university') }}" autocomplete="university" required>

                            @error('university')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="bachelor_degree" class="col-md-4 col-form-label text-md-right">{{ __('Bachelor Degree') }}</label>

                        <div class="col-md-6">
                            <select id="bachelor_degree" class="form-control select2 @error('bachelor_degree') is-invalid @enderror" name="bachelor_degree" required>
                                <option value="" selected disabled>Select Bachelor Degree</option>
                                <option value="Engineering">Engineering</option>
                                <option value="Commerce">Commerce</option>
                                <option value="Business Administration">Business Administration</option>
                                <option value="other">Other</option>
                            </select>

                            @error('bachelor_degree')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="major" class="col-md-4 col-form-label text-md-right">{{ __('Major') }}</label>

                        <div class="col-md-6">
                            <input id="major" type="text" class="form-control @error('major') is-invalid @enderror" name="major" value="{{ old('major') }}" required>

                            @error('Major')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="graduation_year" class="col-md-4 col-form-label text-md-right">{{ __('Graduation Year') }}</label>
                        <div class="col-md-6">
                            <select id="graduation_year" class="form-control @error('graduation_year') is-invalid @enderror" name="graduation_year"  autocomplete="graduation_year" required>
                                <option value="">-- Select Graduation Year --</option>
                                <option value="2024"{{ old('graduation_year') == '2024' ? ' selected' : '' }}>Class of 2024</option>
                                <option value="2025"{{ old('graduation_year') == '2025' ? ' selected' : '' }}>Class of 2025</option>
                                <option value="other"{{ old('graduation_year') && !in_array(old('graduation_year'), ['2024', '2025']) ? ' selected' : '' }}>Other</option>
                            </select>

                            @error('graduation_year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="grade_certificate" class="col-md-4 col-form-label text-md-right">{{ __('File') }}</label>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <input type="file" class="form-control form-control-sm" id="grade_certificate" name="grade_certificate" required>
                            </div>

                            @error('grade_certificate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="preferred_industry" class="col-md-4 col-form-label text-md-right">{{ __('Preferred Industry') }}</label>
                        <div class="col-md-6">
                            <select id="preferred_industry" class="form-control @error('preferred_industry') is-invalid @enderror" name="preferred_industry" required>
                                <option value="" disabled selected>Select an option</option>
                                <option value="Lighting" {{ old('preferred_industry') == 'Lighting' ? 'selected' : '' }}>Lighting</option>
                                <option value="Panels" {{ old('preferred_industry') == 'Panels' ? 'selected' : '' }}>Panels</option>
                                <option value="Steel" {{ old('preferred_industry') == 'Steel' ? 'selected' : '' }}>Steel</option>
                                <option value="Sheet Metal Fabrication" {{ old('preferred_industry') == 'Sheet Metal Fabrication' ? 'selected' : '' }}>Sheet Metal Fabrication</option>
                                <option value="Support Functions" {{ old('preferred_industry') == 'Support Functions' ? 'selected' : '' }}>Support Functions (HR, ICT, SCM & Finance)</option>
                            </select>
                            @error('preferred_industry')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="training_field" class="col-md-4 col-form-label text-md-right">{{ __('Preferred Training Field') }}</label>

                        <div class="col-md-6">
                            <select id="training_field" class="form-control @error('training_field') is-invalid @enderror" name="training_field" required>
                                <option value="">-- Select Preferred Training Field --</option>
                                <option value="Technical Office">Technical Office (Engineers only)</option>
                                <option value="Commercial">Commercial (Engineers only)</option>
                                <option value="Manufacturing">Manufacturing (Engineers only)</option>
                                <option value="Human Resources">Human Resources</option>
                                <option value="Finance">Finance</option>
                                <option value="Supply Chain">Supply Chain</option>
                                <option value="Information & Communications Technology">Information & Communications Technology</option>
                            </select>

                            @error('training_field')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="grade" class="col-md-4 col-form-label text-md-right">{{ __('Acumulative Grade') }}</label>

                        <div class="col-md-6">
                            <select id="grade" class="form-control @error('grade') is-invalid @enderror" name="grade" autocomplete="grade" required>
                                <option value="">-- Select Grade --</option>
                                <option value="Fair" {{ old('grade') == 'Fair' ? 'selected' : '' }}>Fair</option>
                                <option value="Good" {{ old('grade') == 'Good' ? 'selected' : '' }}>Good</option>
                                <option value="Very Good" {{ old('grade') == 'Very Good' ? 'selected' : '' }}>Very Good</option>
                                <option value="Excellent" {{ old('grade') == 'Excellent' ? 'selected' : '' }}>Excellent</option>
                            </select>

                            @error('grade')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <label for="grade_certificate" class="col-md-4 col-form-label text-md-right">{{ __('Acumulative Grade Certificate') }}</label>

                        <div class="col-md-6">
                            <input id="grade_certificate" type="file" class="form-control-file @error('grade_certificate') is-invalid @enderror" name="grade_certificate" value="{{ old('grade_certificate') }}" autocomplete="grade_certificate">

                            @error('grade_certificate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> -->
                    <div class="form-group row">
                        <label for="trainings" class="col-md-4 col-form-label">{{ __('Performed Trainings') }}</label>

                        <div class="col-md-6">
                            <textarea id="trainings" class="form-control @error('trainings') is-invalid @enderror" name="trainings" rows="5" required>{{ old('trainings') }}</textarea>

                            @error('trainings')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="source" class="col-md-4 col-form-label text-md-right">{{ __('How did you know about the Internship?') }}</label>

                        <div class="col-md-6">
                            <select id="source" class="form-control @error('source') is-invalid @enderror" name="source" required>
                                <option value="">--Select--</option>
                                
                                <option value="Company Website">Company's Website</option>
                                <option value="Linkedin">LinkedIn</option>
                                <option value="Facebook">Facebook</option>
                                <option value="Referral">Referral</option>
                                <option value="Other">Other</option>
                            </select>

                            @error('source')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div id="referral-container" class="mt-3 d-none">
                                <label for="referral" class="form-label">{{ __('Referral') }}</label>
                                <input id="referral" type="text" class="form-control @error('referral') is-invalid @enderror" name="referral" value="{{ old('referral') }}">

                                @error('referral')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div id="other-container" class="mt-3 d-none">
                                <label for="other" class="form-label">{{ __('Other') }}</label>
                                <input id="other" type="text" class="form-control @error('other') is-invalid @enderror" name="other" value="{{ old('other') }}">

                                @error('other')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>




                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="register-btn btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif



<style>
    .custom-file-input::-webkit-file-upload-button {
  visibility: hidden;
}
.custom-file-input::before {
  content: 'Choose file';
  display: inline-block;
  background: #007bff;
  border: none;
  color: #fff;
  padding: 8px 20px;
  outline: none;
  white-space: nowrap;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  cursor: pointer;
  margin-right: 10px;
}
.custom-file-input:hover::before {
  background-color: #0069d9;
}
.custom-file-input:active::before {
  background-color: #0062cc;
}
.custom-file-input:focus::before {
  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}
.custom-file-label {
  margin-left: 10px;
}

    .register-btn{
        margin-top: 57px;
        float: right;
        display: block;
        width: 55%;
        height: 54px;
        background-color: #1f1759!important;
        font-size: 22px;
    }
    .card-header{
        display: block;
        text-align: center;
        font-size: 32px;
        color: #2a19a4!important;
        font-weight: 700;
    }
    .form-group{
        margin-bottom: 15px;
    }
    .col-form-label{
        color: #2a19a4!important;
        font-weight:700!important;
    }

    .navbar-nav li a {
    color: #fff;
    font-weight: bold;
}

    .login-btn{
        background-color: #1f1759;
        margin-top: 20px;
        width: 80%;
        height: 57px;
        display: block;
        margin: 17px auto;
    }
</style>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        var loginBtn = document.querySelector('.navbar .btn-outline-light');
        loginBtn.addEventListener('click', function() {
            $('#loginModal').modal('show');
        });
    </script>
<script>

    $(document).on('ready',function(){
        console.log("sss");
    });
    document.addEventListener("DOMContentLoaded", function() {
        var sourceSelect = document.getElementById("source");
        var referralContainer = document.getElementById("referral-container");
        var otherContainer = document.getElementById("other-container");

        sourceSelect.addEventListener("change", function() {
            if (sourceSelect.value === "Referral") {
                referralContainer.classList.remove("d-none");
                otherContainer.classList.add("d-none");
            } else if (sourceSelect.value === "Other") {
                referralContainer.classList.add("d-none");
                otherContainer.classList.remove("d-none");
            } else {
                referralContainer.classList.add("d-none");
                otherContainer.classList.add("d-none");
            }
        });
    });
</script>

@if (session('error'))
    <script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ session('error') }}'
            });
        });
    </script>
@endif


@extends('layouts.app')
@section('title', 'Register')

@section('content')

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
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

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
                                <input id="birthdate" type="date" class="form-control @error('birthdate') is-invalid @enderror" name="birthdate" value="{{ old('birthdate') }}"  autocomplete="birthdate">

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
                                <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}"  autocomplete="mobile">

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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

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
                                <select id="city" class="form-control select2 @error('city') is-invalid @enderror" name="city" >
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
                            <input id="university" type="text" class="form-control @error('university') is-invalid @enderror" name="university" value="{{ old('university') }}" autocomplete="university">

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
                            <select id="bachelor_degree" class="form-control select2 @error('bachelor_degree') is-invalid @enderror" name="bachelor_degree">
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
                            <input id="major" type="text" class="form-control @error('major') is-invalid @enderror" name="major" value="{{ old('major') }}">

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
                            <select id="graduation_year" class="form-control @error('graduation_year') is-invalid @enderror" name="graduation_year"  autocomplete="graduation_year">
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
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="grade_certificate" name="grade_certificate">
                                <label class="custom-file-label" for="file">Choose file</label>
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
                            <select id="preferred_industry" class="form-control @error('preferred_industry') is-invalid @enderror" name="preferred_industry">
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
                            <select id="training_field" class="form-control @error('training_field') is-invalid @enderror" name="training_field">
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
                            <select id="grade" class="form-control @error('grade') is-invalid @enderror" name="grade" autocomplete="grade">
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
                            <textarea id="trainings" class="form-control @error('trainings') is-invalid @enderror" name="trainings" rows="5">{{ old('trainings') }}</textarea>

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
                            <select id="source" class="form-control @error('source') is-invalid @enderror" name="source">
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
@endsection

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
</style>
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


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


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title>Internship Registration</title>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #e8ebe9a6; height: 100px;">
    <div class="container">
        <a class="navbar-brand" href="#">
        <a href="{{route ('welcome')}}" style="color:darkblue;"><img src="{{ asset('assets/img/logo-1.png') }}" height="80" alt="Logo"></a>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="d-flex align-items-center">
            <a href="#" class="btn btn-outline-light mr-2" style="background-color: #0dbfd6;width: 123px;height: 45px;padding: 11px;">Login</a>
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
        <form id="reg" method="POST" action="{{ route('processLogin') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                

                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" >
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
                                <div class="card-header">{{ __('El-Sewedy Industries Internship Program 2023') }}</div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('register.store') }}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

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
                            <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" autocomplete="mobile" placeholder="01XXXXXXXXX" pattern="01[0-9]{9}" maxlength="11" required>

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
                                <input id="reg-email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">
                                <span id="email-error" class="text-danger"></span>
                                <span id="email-available" class="text" style="color:green;"></span>
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
        <select id="city" class="form-control select2 @error('city') is-invalid @enderror" name="city">
            <option value="" selected disabled>Select City</option>
            <option value="Cairo">Cairo</option>
            <option value="Alexandria">Alexandria</option>
            <option value="Giza">Giza</option>
            <option value="Sharkia">Sharkia</option>
            <option value="Luxor">Luxor</option>
            <option value="Aswan">Aswan</option>
            <option value="Port Said">Port Said</option>
            <option value="Suez">Suez</option>
            <option value="Mansoura">Mansoura</option>
            <option value="Tanta">Tanta</option>
            <option value="Damietta">Damietta</option>
            <option value="Ismailia">Ismailia</option>
            <option value="Fayoum">Fayoum</option>
            <option value="Zagazig">Zagazig</option>
            <option value="Asyut">Asyut</option>
            <option value="Beni Suef">Beni Suef</option>
            <option value="Sohag">Sohag</option>
            <option value="Minya">Minya</option>
            <option value="Qena">Qena</option>
            <option value="Banha">Banha</option>
            <option value="Damanhur">Damanhur</option>
            <option value="Kafr El Sheikh">Kafr El Sheikh</option>
            <option value="Mallawi">Mallawi</option>
            <option value="Marsa Matruh">Marsa Matruh</option>
            <option value="El Arish">El Arish</option>
            <option value="Assiut">Assiut</option>
            <option value="Hurghada">Hurghada</option>
            <option value="El-Mahalla El-Kubra">El-Mahalla El-Kubra</option>
            <option value="Bani Mazar">Bani Mazar</option>
            <option value="Port Fuad">Port Fuad</option>
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
        <select id="university" class="form-control @error('university') is-invalid @enderror" name="university" autocomplete="university">
            <option value="">Select University</option>
            <option value="Ain Shams University">Ain Shams University</option>
            <option value="Ahram Canadian University">Ahram Canadian University</option>
            <option value="Al-Azhar University">Al-Azhar University</option>
            <option value="AlAlamein International University">AlAlamein International University</option>
            <option value="Alexandria University">Alexandria University</option>
            <option value="Arab Academy for Science, Technology and Maritime Transport">Arab Academy for Science, Technology and Maritime Transport</option>
            <option value="Arab Open University">Arab Open University</option>
            <option value="Aswan University">Aswan University</option>
            <option value="Assiut University">Assiut University</option>
            <option value="Banha University">Banha University</option>
            <option value="Badr University In Assiut">Badr University In Assiut</option>
            <option value="Badr University In Cairo">Badr University In Cairo</option>
            <option value="Beni-Suef University">Beni-Suef University</option>
            <option value="British University in Egypt">British University in Egypt</option>
            <option value="Cairo University">Cairo University</option>
            <option value="Canadian International College">Canadian International College</option>
            <option value="Damietta University">Damietta University</option>
            <option value="Damanhour University">Damanhour University</option>
            <option value="Delta University for Science and Technology">Delta University for Science and Technology</option>
            <option value="Egypt-Japan University of Science and Technology">Egypt-Japan University of Science and Technology</option>
            <option value="Egyptian Chinese University">Egyptian Chinese University</option>
            <option value="Egyptian e-Learning University">Egyptian e-Learning University</option>
            <option value="Egyptian Russian University">Egyptian Russian University</option>
            <option value="Egypt University Of Informatics">Egypt University Of Informatics</option>
            <option value="El Shorouk Academy">El Shorouk Academy</option>
            <option value="European Universities in Egypt (University of London, University of Central Lancashire)">European Universities in Egypt (University of London, University of Central Lancashire)</option>
            <option value="Fayoum University">Fayoum University</option>
            <option value="French University of Egypt">French University of Egypt</option>
            <option value="Future University in Egypt">Future University in Egypt</option>
            <option value="Galala University">Galala University</option>
            <option value="German International University">German International University</option>
            <option value="German University in Cairo">German University in Cairo</option>
            <option value="Heliopolis University">Heliopolis University</option>
            <option value="Helwan University">Helwan University</option>
            <option value="Hertfordshire University In Egypt">Hertfordshire University In Egypt</option>
            <option value="King Salman International University">King Salman International University</option>
            <option value="Kafrelsheikh University">Kafrelsheikh University</option>
            <option value="Mansoura University">Mansoura University</option>
            <option value="Military Technical College">Military Technical College</option>
            <option value="Minia University">Minia University</option>
            <option value="Minufiya University">Minufiya University</option>
            <option value="Misr International University">Misr International University</option>
            <option value="Misr University for Science and Technology">Misr University for Science and Technology</option>
            <option value="Modern Sciences and Arts University">Modern Sciences and Arts University</option>
            <option value="MTI University">MTI University</option>
            <option value="Nahda University">Nahda University</option>
            <option value="Nile University">Nile University</option>
            <option value="New Giza University">New Giza University</option>
            <option value="New Mansoura University">New Mansoura University</option>
            <option value="New Valley University">New Valley University</option>
            <option value="October 6 University">October 6 University</option>
            <option value="Pharos University In Alexandria">Pharos University In Alexandria</option>
            <option value="Port Said University">Port Said University</option>
            <option value="Sadat Academy for Management Sciences">Sadat Academy for Management Sciences</option>
            <option value="Sinai University">Sinai University</option>
            <option value="South Valley University">South Valley University</option>
            <option value="Suez Canal University">Suez Canal University</option>
            <option value="Suez University">Suez University</option>
            <option value="Sohag University">Sohag University</option>
            <option value="Tanta University">Tanta University</option>
            <option value="The American University in Cairo">The American University in Cairo</option>
            <option value="University of Sadat City">University of Sadat City</option>
            <option value="Zagazig University">Zagazig University</option>
            <option value="Zewail City of Science, Technology and Innovation">Zewail City of Science, Technology and Innovation</option>
        </select>
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
            <option value="Bachelor of Architecture (B.Arch.)">Bachelor of Architecture (B.Arch.)</option>
            <option value="Bachelor of Engineering (B.E./B.Eng.)">Bachelor of Engineering (B.E./B.Eng.)</option>
            <option value="Bachelor of Science in Agricultural Engineering (B.S.A.E.)">Bachelor of Science in Agricultural Engineering (B.S.A.E.)</option>
            <option value="Bachelor of Science in Chemical Engineering (B.S.Ch.E.)">Bachelor of Science in Chemical Engineering (B.S.Ch.E.)</option>
            <option value="Bachelor of Arts (B.A.)">Bachelor of Arts (B.A.)</option>
            <option value="Bachelor of Biomedical Engineering (B.B.m.E.)">Bachelor of Biomedical Engineering (B.B.m.E.)</option>
            <option value="Bachelor of Business Administration (B.B.A.)">Bachelor of Business Administration (B.B.A.)</option>
            <option value="Bachelor of Commerce (B.C.)">Bachelor of Commerce (B.C.)</option>
            <option value="Bachelor of Computer Science (B.C.S.)">Bachelor of Computer Science (B.C.S.)</option>
            <option value="Bachelor of Electrical Engineering (B.E.E.)">Bachelor of Electrical Engineering (B.E.E.)</option>
            <option value="Bachelor of Fine Arts (B.F.A.)">Bachelor of Fine Arts (B.F.A.)</option>
            <option value="Bachelor of Laws (LL.B.)">Bachelor of Laws (LL.B.)</option>
            <option value="Bachelor of Literature (B.Lit.)">Bachelor of Literature (B.Lit.)</option>
            <option value="Bachelor of Pharmacy (B.Pharm.)">Bachelor of Pharmacy (B.Pharm.)</option>
            <option value="Bachelor of Philosophy (B.Phil.)">Bachelor of Philosophy (B.Phil.)</option>
            <option value="Bachelor of Science in Biomedical Engineering (B.S.B.E./B.S.B.M.E.)">Bachelor of Science in Biomedical Engineering (B.S.B.E./B.S.B.M.E.)</option>
            <option value="Bachelor of Science (B.S.)">Bachelor of Science (B.S.)</option>
            <option value="Other">Other</option>
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
                                <option value="2024"{{ old('graduation_year') == '2020' ? ' selected' : '' }}>Class of 2020</option>
                                <option value="2024"{{ old('graduation_year') == '2021' ? ' selected' : '' }}>Class of 2021</option>
                                <option value="2024"{{ old('graduation_year') == '2022' ? ' selected' : '' }}>Class of 2023</option>
                                <option value="2024"{{ old('graduation_year') == '2024' ? ' selected' : '' }}>Class of 2024</option>
                                <option value="2025"{{ old('graduation_year') == '2025' ? ' selected' : '' }}>Class of 2025</option>
                                <option value="2025"{{ old('graduation_year') == '2026' ? ' selected' : '' }}>Class of 2026</option>
                                <option value="other"{{ old('graduation_year') && !in_array(old('graduation_year'), ['2024', '2025']) ? ' selected' : '' }}>Other</option>
                            </select>

                            @error('graduation_year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <!-- Add error return -->
                    <div class="form-group row">
                        <label for="grade_certificate" class="col-md-4 col-form-label text-md-right">{{ __('Accumulative Grade Certificate') }}</label>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <input type="file" accept=".pdf,.jpeg,.jpg" class="form-control" id="grade_certificate" name="grade_certificate">
                                <span id="file-error" class="text-danger"></span>

                            </div>
                            @error('grade_certificate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <span class="form-text text-muted">Upload a PDF, JPEG, or JPG file.</span>
                        </div>
                    </div>




                    <div class="form-group row">
    <label for="preferred_industry" class="col-md-4 col-form-label text-md-right">{{ __('Preferred Industry') }}</label>
    <div class="col-md-6">
        <select id="preferred_industry" class="form-control @error('preferred_industry') is-invalid @enderror" name="preferred_industry" onchange="updateTrainingFields()">
            <option value="" disabled selected>Select an option</option>
            <option value="Lighting" {{ old('preferred_industry') == 'Lighting' ? 'selected' : '' }}>Lighting</option>
            <option value="Panels" {{ old('preferred_industry') == 'Panels' ? 'selected' : '' }}>Panels</option>
            <option value="Steel" {{ old('preferred_industry') == 'Steel' ? 'selected' : '' }}>Steel</option>
            <option value="Sheet Metal Fabrication" {{ old('preferred_industry') == 'Sheet Metal Fabrication' ? 'selected' : '' }}>Sheet Metal Fabrication</option>
            <option value="Support Functions" {{ old('preferred_industry') == 'Support Functions' ? 'selected' : '' }}>Support Functions</option>
        </select>
        @error('preferred_industry')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row" id="training_field_container">
    <label for="training_field" class="col-md-4 col-form-label text-md-right">{{ __('Preferred Training Field') }}</label>
    <div class="col-md-6">
        <select id="training_field" class="form-control @error('training_field') is-invalid @enderror" name="training_field">
            <option value="">-- Select Preferred Training Field --</option>
        </select>
        @error('training_field')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<div class="form-group row" id="solidworks_rating" style="display:none;">
    <label for="solidworks_rating" class="col-md-4 col-form-label text-md-right">How would you rate yourself in SOLIDWORKS?</label>
    <div class="col-md-6">
        <select id="solidworks_rating" class="form-control @error('solidworks_rating') is-invalid @enderror" name="solidworks_rating">
            <option value="">-- Select Rating --</option>
            <option value="5"{{ old('solidworks_rating') == '5' ? ' selected' : '' }}>5</option>
            <option value="4"{{ old('solidworks_rating') == '4' ? ' selected' : '' }}>4</option>
            <option value="3"{{ old('solidworks_rating') == '3' ? ' selected' : '' }}>3</option>
            <option value="2"{{ old('solidworks_rating') == '2' ? ' selected' : '' }}>2</option>
            <option value="1"{{ old('solidworks_rating') == '1' ? ' selected' : '' }}>1</option>
        </select>
        @error('solidworks_rating')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<div class="form-group row" id="autocad_rating" style="display:none;">
    <label for="autocad_rating" class="col-md-4 col-form-label text-md-right">How would you rate yourself in AutoCAD?</label>
    <div class="col-md-6">
        <select id="autocad_rating" class="form-control @error('autocad_rating') is-invalid @enderror" name="autocad_rating">
            <option value="">-- Select Rating --</option>
            <option value="5"{{ old('autocad_rating') == '5' ? ' selected' : '' }}>5</option>
            <option value="4"{{ old('autocad_rating') == '4' ? ' selected' : '' }}>4</option>
            <option value="3"{{ old('autocad_rating') == '3' ? ' selected' : '' }}>3</option>
            <option value="2"{{ old('autocad_rating') == '2' ? ' selected' : '' }}>2</option>
            <option value="1"{{ old('autocad_rating') == '1' ? ' selected' : '' }}>1</option>
        </select>
        @error('autocad_rating')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<script>
    // Get references to the elements
    var preferredIndustrySelect = document.getElementById('preferred_industry');
    var solidworks_rating = document.getElementById('solidworks_rating');
    var autocad_rating = document.getElementById('autocad_rating');

    // Add event listener for the change event
    preferredIndustrySelect.addEventListener('change', function() {
        var selectedValue = preferredIndustrySelect.value;

        // Check if the selected industry is eligible for rating fields
        if (selectedValue === 'Lighting' || selectedValue === 'Sheet Metal Fabrication' || selectedValue === 'Steel' || selectedValue === 'Panels') {
            solidworks_rating.style.display = 'flex'; // Show the rating fields
            autocad_rating.style.display = 'flex'; // Show the rating fields
        } else {
            solidworks_rating.style.display = 'none'; // Hide the rating fields
            autocad_rating.style.display = 'none'; // Hide the rating fields

        }
    });
</script>
<script>
    function updateTrainingFields() {
        var preferredIndustry = document.getElementById("preferred_industry").value;
        var trainingFieldSelect = document.getElementById("training_field");

        // Clear existing options
        trainingFieldSelect.innerHTML = '<option value="">-- Select Preferred Training Field --</option>';

        if (preferredIndustry === "Lighting" || preferredIndustry === "Sheet Metal Fabrication" || preferredIndustry === "Steel" || preferredIndustry === "Panels") {
            var trainingFields = ["Technical Office (Engineers only)", "Commercial (Engineers only)", "Manufacturing (Engineers only)"];
            
            // Add new options
            trainingFields.forEach(function(trainingField) {
                var option = document.createElement("option");
                option.value = trainingField;
                option.text = trainingField;
                trainingFieldSelect.appendChild(option);
            });

            // Show the container
            
        } else {
            var trainingFields = ["Human Resources", "Health and Safety","Finance","Information Technology"];
            // Add new options
            trainingFields.forEach(function(trainingField) {
                var option = document.createElement("option");
                option.value = trainingField;
                option.text = trainingField;
                trainingFieldSelect.appendChild(option);
            });
            // Hide the container
            
        }
    }
</script>

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
   
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Rate Yourself in English</label>
                            <div class="col-md-6">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="language1_rating" id="language1_rating_beginner" value="beginner"{{ old('language1_rating') == 'beginner' ? ' checked' : '' }}>
                                    <label class="form-check-label" for="language1_rating_beginner">Beginner</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="language1_rating" id="language1_rating_intermediate" value="intermediate"{{ old('language1_rating') == 'intermediate' ? ' checked' : '' }}>
                                    <label class="form-check-label" for="language1_rating_intermediate">Intermediate</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="language1_rating" id="language1_rating_fluent" value="fluent"{{ old('language1_rating') == 'fluent' ? ' checked' : '' }}>
                                    <label class="form-check-label" for="language1_rating_fluent">Fluent</label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Rate Yourself in French</label>
                            <div class="col-md-6">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="language2_rating" id="language2_rating_beginner" value="beginner"{{ old('language2_rating') == 'beginner' ? ' checked' : '' }}>
                                    <label class="form-check-label" for="language2_rating_beginner">Beginner</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="language2_rating" id="language2_rating_intermediate" value="intermediate"{{ old('language2_rating') == 'intermediate' ? ' checked' : '' }}>
                                    <label class="form-check-label" for="language2_rating_intermediate">Intermediate</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="language2_rating" id="language2_rating_fluent" value="fluent"{{ old('language2_rating') == 'fluent' ? ' checked' : '' }}>
                                    <label class="form-check-label" for="language2_rating_fluent">Fluent</label>
                                </div>
                            </div>
                        </div>


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

                    <!-- <div class="form-group row">
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
                                <label for="referral" class="form-label">{{ __('Referral Name') }}</label>
                                <input id="referral" type="text" class="form-control @error('referral') is-invalid @enderror" name="referral" value="{{ old('referral') }}">

                                @error('referral')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div id="referral-container" class="mt-3 d-none">
                                <label for="referral_position" class="form-label">{{ __('Referral Position') }}</label>
                                <input id="referral_position" type="text" class="form-control @error('referral') is-invalid @enderror" name="referral" value="{{ old('referral') }}">

                                @error('referral')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div id="referral-container" class="mt-3 d-none">
                                <label for="referral_company" class="form-label">{{ __('Referral Company') }}</label>
                                <input id="referral_company" type="text" class="form-control @error('referral') is-invalid @enderror" name="referral" value="{{ old('referral') }}">

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
                    </div> -->
                    <div class="form-group row">
                        <label for="intern_opinion" class="col-md-4 col-form-label text-md-right">What makes you a good candidate?</label>
                        <div class="col-md-6">
                            <textarea id="intern_opinion" class="form-control" name="intern_opinion" rows="4">{{ old('intern_opinion') }}</textarea>
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
                                
                            <input id="referralhidden" type="hidden" class="form-control @error('referral') is-invalid @enderror" name="referral" value="{{ old('referral') }}">
                                
                                <label for="referral" class="form-label">{{ __('Referral Name') }}</label>
                                <input id="referral" type="text" class="form-control @error('referral') is-invalid @enderror" name="referral_text" value="{{ old('referral') }}">
                                @error('referral')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="referral_position" class="form-label">{{ __('Referral Position') }}</label>
                                <input id="referral_position" type="text" class="form-control @error('referral_position') is-invalid @enderror" name="referral_position" value="{{ old('referral_position') }}">
                                @error('referral_position')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="referral_company" class="form-label">{{ __('Referral Company') }}</label>
                                <input id="referral_company" type="text" class="form-control @error('referral_company') is-invalid @enderror" name="referral_company" value="{{ old('referral_company') }}">
                                @error('referral_company')
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
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
        <span> Create your own password for el sewedy internship profile</span>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            
        @enderror
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
    /* Custom styles for invalid-feedback */
.invalid-feedback {
  color: red;
  font-size: 14px;
}

.error {
  border-color: red;
}

/* Optionally, you can style the error message container as well */
.error-message {
  margin-top: 5px;
  font-size: 14px;
  color: red;
}
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

<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    

    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    

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
    // document.addEventListener("DOMContentLoaded", function() {
    //     var sourceSelect = document.getElementById("source");
    //     var referralContainer = document.getElementById("referral-container");
    //     var otherContainer = document.getElementById("other-container");

    //     sourceSelect.addEventListener("change", function() {
    //         if (sourceSelect.value === "Referral") {
    //             referralContainer.classList.remove("d-none");
    //             otherContainer.classList.add("d-none");
    //         } else if (sourceSelect.value === "Other") {
    //             referralContainer.classList.add("d-none");
    //             otherContainer.classList.remove("d-none");
    //         } else {
    //             referralContainer.classList.add("d-none");
    //             otherContainer.classList.add("d-none");
    //         }
    //     });
    // });

    $(document).ready(function() {
        $('#reg-email').on('blur', function() {
            var email = $(this).val();
            console.log(email);
            $.ajax({
                url: '{{ route('check.email') }}',
                method: 'GET',
                data: { email: email },
                success: function(response) {
                    // Email is available, do something if needed
                    $('#email-available').text(response.message);
                    $('#email-error').removeClass('d-block').addClass('d-none');
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    var message = JSON.parse(xhr.responseText).message;
                    // Display the error message to the user
                    $('#email-error').text(message);
                    $('#email-available').removeClass('d-block').addClass('d-none');
                    console.log(message);
                }
            });
        });

        $('#grade_certificate').change(function() {
            var file = $(this).prop('files')[0];
            console.log("here");
            // Validate the file type
            if (file && !isAcceptedFileType(file)) {
                $('#file-error').text('Invalid file type. Please upload a valid file.');
                console.log("error");
            } else {
                console.log("er");
                $('#file-error').empty();
            }
            });

            // Function to check if the file type is accepted
            function isAcceptedFileType(file) {
            var acceptedTypes = ['image/jpeg', 'image/png', 'application/pdf']; // Add accepted file types here
            return acceptedTypes.includes(file.type);
            }
    });
    $(document).ready(function() {
        // Show or hide referral fields based on the selected option
        $('#source').change(function() {
            var selectedOption = $(this).val();
            if (selectedOption === 'Referral') {
                $('#referral-container').removeClass('d-none');
                $('#other-container').addClass('d-none');
            } else if (selectedOption === 'Other') {
                $('#other-container').removeClass('d-none');
                $('#referral-container').addClass('d-none');
            } else {
                $('#referral-container').addClass('d-none');
                $('#other-container').addClass('d-none');
            }
        });

        $('#referral, #referral_position, #referral_company').blur(function() {
            var source = $('#source').val();
            if (source === 'Referral') {
                var referralName = $('#referral').val();
                var referralPosition = $('#referral_position').val();
                var referralCompany = $('#referral_company').val();
                var fullName = referralName + ' | ' + referralPosition + ' | ' + referralCompany;
                $('#referralhidden').val(fullName);
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


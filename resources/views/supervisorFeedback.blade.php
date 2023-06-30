<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome to Elsweedy</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" crossorigin="anonymous">
      <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
  <style>
    /* set the height of the sidebar to the page height */
    .sidebar {
      min-height:100vh;
      height: auto;
      
    }
    #sidebarMenu{
        background-color:#70707d;
    }
    .nav-link{
        color:#fff;
    }
    
    /* style the logo */
    .logo {
      margin: 20px;
      font-size: 2rem;
      font-weight: bold;
    }
    main{
        display: block;
        width: 65%!important;
        margin: 65px auto !important;
        border: 6PX SOLID;
        border-radius: 28px;
    }
  </style>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
        <div class="position-sticky pt-3">
          <div class="logo">
            <img src="{{ asset('assets/img/logo-1.png') }}" alt="Logo" height="40" class="d-inline-block align-middle me-2">
          </div>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{ route('supervisor') }}">
                <span data-feather="home"></span>
                Dashboard
              </a>
            </li>
            
            <li class="nav-item">
            <a class="nav-link modal-selector" href="#" data-toggle="modal" data-target="#resetPasswordModal">
                <span data-feather="bar-chart-2"></span>
                Reset Password
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="#">
                
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"><span data-feather="layers">Logout</span></button>
                </form>
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Login Modal -->
      <div class="modal fade" id="resetPasswordModal" tabindex="-1" aria-labelledby="resetPasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <img src="{{ asset('assets/img/logo-1.png') }}" style="display: block;width: 60%;margin: 0 auto;" height="80" alt="Logo">
            </div>
            <div class="modal-body">
              <form method="POST" action="{{ route('resetPassword', ['userId' => $supervisor->id]) }}">
                  @csrf

                  <div class="mb-3">
                      <label for="password">New Password</label>
                      <input type="password" id="password" name="password" class="form-control" required>
                  </div>

                  <div class="mb-3">
                      <label for="password_confirmation">Confirm New Password</label>
                      <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                  </div>

                  <div class="mb-3">
                    <div class="text-muted" style="background-color:#9bdc9b; color:white;">Password must contain:</div>
                    <ul class="text-muted" style="background-color:#9bdc9b; color:white;">
                        <li>At least 8 characters</li>
                        <li>At least 1 lowercase letter [a-z]</li>
                        <li>At least 1 uppercase letter [A-Z]</li>
                        <li>At least 1 numeric character [0-9]</li>
                        <li>At least 1 special character: ~`!@#$%^&*()-_+={}[]|\;:"<>,./?</li>
                    </ul>
                  </div>

                  <button type="submit" class="btn btn-primary">Reset Password</button>
              </form>


            </div>
          </div>
        </div>
      </div>
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="container-fluid" style="padding:40px;">
                            <div class="row">
                            
                            <form method="POST" action="{{ route('feedback.store') }}">
                              @csrf

                              <div class="mb-3">
                                <label for="supervisor_full_name" class="form-label">Supervisor's Full Name</label>
                                <br>
                                <label for="supervisor_full_name" class="form-label" name="supervisor_full_name">{{$supervisor->name}}</label>
                                <input type="hidden" class="form-control" id="supervisor_full_name" name="supervisor_full_name" value="{{ $supervisor->name }}" required>
                                <input type="hidden" class="form-control" id="supervisor_id" name="supervisor_id" value="{{ $supervisor->id }}" required>
                              </div>
                              
                            @error('supervisor_full_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                              <div class="mb-3">

                                <label for="intern_full_name" class="form-label">Intern's Full Name (English)</label>
                                <select class="form-select" id="intern_full_name" name="intern_full_name" required>
                                    @foreach($interns as $intern)
                                        <option value="{{ $intern->full_name }}">{{ $intern->full_name }}</option>
                                    @endforeach
                                   

                                    <input type="hidden" class="form-control" id="intern_id" name="intern_id" value="" required>
                                    <script>
                                      $(document).ready(function() {
                                          var selectedValue = $('#intern_full_name').val();
                                          $('#intern_id').val(selectedValue);
                                      });
                                  </script>
                                  </select>
                                
                                
                            @error('intern_full_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                              </div>

                              <div class="mb-3">
                                <label for="training_industry" class="form-label">Training Industry</label>
                                <select class="form-select" id="training_industry" name="training_industry" required>
                                  <option value="">Select Training Industry</option>
                                  <option value="Lighting">Lighting</option>
                                  <option value="Panels">Panels</option>
                                  <option value="Steel">Steel</option>
                                  <option value="Sheet Metal Fabrication">Sheet Metal Fabrication</option>
                                  <option value="Support Functions (HR, ICT, SCM & Finance)">Support Functions (HR, ICT, SCM & Finance)</option>
                                </select>
                                
                            @error('training_industry')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                              </div>

                              <div class="mb-3">
                                <label for="training_field" class="form-label">Training Field</label>
                                <select class="form-select" id="training_field" name="training_field" required>
                                  <option value="">Select Training Field</option>
                                  <option value="Commercial">Commercial</option>
                                  <option value="Technical Office">Technical Office</option>
                                  <option value="Manufacturing">Manufacturing</option>
                                  <option value="HR">HR</option>
                                  <option value="Supply Chain">Supply Chain</option>
                                  <option value="Finance">Finance</option>
                                  <option value="ICT">ICT</option>
                                </select>
                                
                            @error('training_field')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                              </div>

                              <div class="mb-3">
                                <label for="training_round" class="form-label">Training's Round</label>
                                <select class="form-select" id="training_round" name="training_round" required>
                                  <option value="">Select Training Round</option>
                                  <option value="Round 1 July 2023">Round 1 July 2023</option>
                                  <option value="Round 2 August 2023">Round 2 August 2023</option>
                                  <option value="Other">Other</option>
                                </select>
                                
                            @error('training_round')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                              </div>

                              <div class="mb-3">
                                <label for="considered_others" class="form-label">Objectively considered other people’s ideas and opinions?</label>
                                <select class="form-select" id="considered_others" name="considered_others" required>
                                  <option value="">Select Option</option>
                                  <option value="Strongly Agree">Strongly Agree</option>
                                  <option value="Agree">Agree</option>
                                  <option value="Neutral">Neutral</option>
                                  <option value="Disagree">Disagree</option>
                                </option value="Strongly Disagree">Strongly Disagree</option>
                              </select>
                              
                            @error('considered_others')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                              
                              </div>
                              <div class="mb-3">
                              <label for="receptive" class="form-label">Was receptive to supervision?</label>
                              <select class="form-select" id="receptive" name="receptive" required>
                                <option value="">Select Option</option>
                                <option value="Strongly Agree">Strongly Agree</option>
                                <option value="Agree">Agree</option>
                                <option value="Neutral">Neutral</option>
                                <option value="Disagree">Disagree</option>
                                <option value="Strongly Disagree">Strongly Disagree</option>
                              </select>
                            </div>

                            <div class="mb-3">
                              <label for="punctual_dependable" class="form-label">Was punctual and dependable?</label>
                              <select class="form-select" id="punctual_and_dependable" name="punctual_and_dependable" required>
                                <option value="">Select Option</option>
                                <option value="Strongly Agree">Strongly Agree</option>
                                <option value="Agree">Agree</option>
                                <option value="Neutral">Neutral</option>
                                <option value="Disagree">Disagree</option>
                                <option value="Strongly Disagree">Strongly Disagree</option>
                              </select>
                            </div>

                            <div class="mb-3">
                              <label for="demonstrated_initiative" class="form-label">Demonstrated initiative?</label>
                              <select class="form-select" id="demonstrated_completed_tasks" name="demonstrated_completed_tasks" required>
                                <option value="">Select Option</option>
                                <option value="Strongly Agree">Strongly Agree</option>
                                <option value="Agree">Agree</option>
                                <option value="Neutral">Neutral</option>
                                <option value="Disagree">Disagree</option>
                                <option value="Strongly Disagree">Strongly Disagree</option>
                              </select>
                            </div>

                            <div class="mb-3">
                              <label for="tasks_completed_efficiently" class="form-label">Tasks were completed in an efficient manner?</label>
                              <select class="form-select" id="tasks_completed_efficiently" name="tasks_completed_efficiently" required>
                                <option value="">Select Option</option>
                                <option value="Strongly Agree">Strongly Agree</option>
                                <option value="Agree">Agree</option>
                                <option value="Neutral">Neutral</option>
                                <option value="Disagree">Disagree</option>
                                <option value="Strongly Disagree">Strongly Disagree</option>
                              </select>
                            </div>

                            <div class="mb-3">
                              <label for="quality_of_tasks" class="form-label">Quality of completed tasks met expectations?</label>
                              <select class="form-select" id="quality_of_tasks" name="quality_of_tasks" required>
                                <option value="">Select Option</option>
                                <option value="Strongly Agree">Strongly Agree</option>
                                <option value="Agree">Agree</option>
                                <option value="Neutral">Neutral</option>
                                <option value="Disagree">Disagree</option>
                                <option value="Strongly Disagree">Strongly Disagree</option>
                              </select>
                            </div>

                            <div class="mb-3">
                              <label for="able_to_learn" class="form-label">Able to learn new skills?</label>
                              <select class="form-select" id="able_to_learn" name="able_to_learn" required>
                                <option value="">Select Option</option>
                                <option value="Strongly Agree">Strongly Agree</option>
                                <option value="Agree">Agree</option>
                                <option value="Neutral">Neutral</option>
                                <option value="Disagree">Disagree</option>
                                <option value="Strongly Disagree">Strongly Disagree</option>
                              </select>
                            </div>

                            <div class="mb-3">
                              <label for="critical_thinking" class="form-label">Effectively solved problems using critical thinking skills?</label>
                              <select class="form-select" id="critical_thinking" name="critical_thinking" required>
                                <option value="">Select Option</option>
                                <option value="Strongly Agree">Strongly Agree</option>
                                <option value="Agree">Agree</option>
                                <option value="Neutral">Neutral</option>
                                <option value="Disagree">Disagree</option>
                                <option value="Strongly Disagree">Strongly Disagree</option>
                              </select>
                            </div>

                            <div class="mb-3">
                              <label for="academically_prepared" class="form-label">Was academically prepared for internship?</label>
                              <select class="form-select" id="academically_prepared" name="academically_prepared" required>
                                <option value="">Select Option</option>
                                <option value="Strongly Agree">Strongly Agree</option>
                                <option value="Agree">Agree</option>
                                <option value="Neutral">Neutral</option>
                                <option value="Disagree">Disagree</option>
                                <option value="Strongly Disagree">Strongly Disagree</option>
                              </select>
                            </div>

                            <div class="mb-3">
                              <label for="intern_strengths" class="form-label">What were the intern's strengths?</label>
                              <textarea class="form-control" id="intern_strengths" name="intern_strengths" rows="3" required></textarea>
                            </div>

                            <div class="mb-3">
                              <label for="intern_weaknesses" class="form-label">What were the intern's weaknesses?</label>
                              <textarea class="form-control" id="intern_weaknesses" name="intern_weaknesses" rows="3" required></textarea>
                            </div>

                            <div class="mb-3">
                              <label for="hire_intern" class="form-label">I would hire this intern as an employee (if an appropriate position were open).</label>
                              <select class="form-select" id="hire_intern" name="hire_intern" required>
                                <option value="">Select Option</option>
                                <option value="1">Agree</option>
                                <option value="0">Disagree</option>
                              </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                            </form>                                
                        
                        </div>
                    </div>
                </div>
            </div>
      </main>

     
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

    .add-feedback{
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
    


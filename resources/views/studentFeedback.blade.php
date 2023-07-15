<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome to Elsweedy</title>
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" crossorigin="anonymous">
  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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
          
          @if($intern->IsAccepted == true)
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">
                <span data-feather="home"></span>
                Dashboard
              </a>
            </li>
            @if(session('intern_id'))
            <li class="nav-item">
            <!-- supervisor.feedback -->
            <a class="nav-link" href="{{ route('feedback.form', ['internId' => session('intern_id')]) }}">
                <span data-feather="bar-chart-2"></span>
                Feedback
              </a>
            </li>
            @else
            <li class="nav-item">
            <!-- supervisor.feedback -->
              <a class="nav-link" href="{{ route('supervisor.feedback', ['userId' => session('id')]) }}">
                <span data-feather="bar-chart-2"></span>
                Feedback
              </a>
            </li>
            @endif
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="layers"></span>
                Print Certificate
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
          @else
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="#">
                
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"><span data-feather="layers">Logout</span></button>
                </form>
              </a>
            </li>
          </ul>
          @endif
        </div>
      </nav>
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="container-fluid" style="padding:40px;">
                            <div class="row">
                            
        <form method="GET" action="{{ route('intern.feedbackstore') }}" enctype="multipart/form-data">
            @csrf

                <div class="mb-3">
                    <label for="full_name" class="col-md-4 col-form-label text-md-right">Intern's Full Name (English)</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" value="{{ $intern->full_name }}" required>
                </div>

                <input type="hidden" class="form-control" id="student_id" name="intern_id" value="{{ $intern->id }}">

                <div class="mb-3">
                    <label for="mobile_number" class="col-md-4 col-form-label text-md-right">Mobile Number</label>
                    <input type="text" class="form-control" id="mobile_number" name="mobile_number" required>
                </div>

                <div class="mb-3">
                    <label for="training_industry" class="col-md-4 col-form-label text-md-right">Training Industry</label>
                    <input type="text" class="form-control" id="training_industry" name="training_industry" value="{{ $intern->preferred_industry }}" required>
                </div>

                <div class="mb-3">
                    <label for="training_field" class="col-md-4 col-form-label text-md-right">Training Field</label>
                    <input type="text" class="form-control" id="training_field" name="training_field" value="{{ $intern->preferred_training_field }}" required>
                </div>

                <div class="mb-3">
                    <label for="supervisor_full_name" class="col-md-4 col-form-label text-md-right">Supervisor's Full Name</label>
                    <input type="text" class="form-control" id="supervisor_full_name" name="supervisor_full_name" value="{{$super->name}}" required>
                </div>

                <div class="mb-3">
                    <label for="supervisor_title" class="col-md-4 col-form-label text-md-right">Supervisor's Position</label>
                    <input type="text" class="form-control" id="supervisor_title" name="supervisor_title" required>
                </div>

                <div class="mb-3">
                    <label class="col-md-4 col-form-label text-md-right">The orientation was sufficient?</label>
                    <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="orientation_sufficient" value="Strongly Disagree" required>
                        <label class="form-check-label">Strongly Disagree</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="orientation_sufficient" value="Disagree" required>
                        <label class="form-check-label">Disagree</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="orientation_sufficient" value="Neutral" required>
                        <label class="form-check-label">Neutral</label>
                    </div>      
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="orientation_sufficient" value="Agree" required>
                        <label class="form-check-label">Agree</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="orientation_sufficient" value="Strongly Agree" required>
                        <label class="form-check-label">Strongly Agree</label>
                    </div>
                    </div>
                </div>
                <div class="mb-3" class="col-md-4 col-form-label text-md-right">
                <label>A supervisor was assigned to oversee my work?</label>
                <div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="supervisor_assigned" value="Strongly Disagree" required>
                    <label class="form-check-label">Strongly Disagree</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="supervisor_assigned" value="Disagree" required>
                    <label class="form-check-label">Disagree</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="supervisor_assigned" value="Neutral" required>
                    <label class="form-check-label">Neutral</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="supervisor_assigned" value="Agree" required>
                    <label class="form-check-label">Agree</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="supervisor_assigned" value="Strongly Agree" required>
                    <label class="form-check-label">Strongly Agree</label>
                    </div>
                </div>
                </div>
                <div class="mb-3" class="col-md-4 col-form-label text-md-right">
                <label>My supervisor was available to answer questions throughout my internship?</label>
                <div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="supervisor_available" value="Strongly Disagree" required>
                    <label class="form-check-label">Strongly Disagree</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="supervisor_available" value="Disagree" required>
                    <label class="form-check-label">Disagree</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="supervisor_available" value="Neutral" required>
                    <label class="form-check-label">Neutral</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="supervisor_available" value="Agree" required>
                    <label class="form-check-label">Agree</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="supervisor_available" value="Strongly Agree" required>
                    <label class="form-check-label">Strongly Agree</label>
                    </div>
                </div>
                </div>
                <div class="mb-3" class="col-md-4 col-form-label text-md-right">
                <label>The internship was challenging?</label>
                <div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="challenging_internship" value="Strongly Disagree" required>
                    <label class="form-check-label">Strongly Disagree</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="challenging_internship" value="Disagree" required>
                    <label class="form-check-label">Disagree</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="challenging_internship" value="Neutral" required>
                    <label class="form-check-label">Neutral</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="challenging_internship" value="Agree" required>
                    <label class="form-check-label">Agree</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="challenging_internship" value="Strongly Agree" required>
                    <label class="form-check-label">Strongly Agree</label>
                    </div>
                </div>
                </div>
                <div class="mb-3" class="col-md-4 col-form-label text-md-right">
                <label>The internship helped me learn practical skills for my future career?</label>
                <div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="practical_skills" value="Strongly Disagree" required>
                    <label class="form-check-label">Strongly Disagree</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="practical_skills" value="Disagree" required>
                    <label class="form-check-label">Disagree</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="practical_skills" value="Neutral" required>
                    <label class="form-check-label">Neutral</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="practical_skills" value="Agree" required>
                    <label class="form-check-label">Agree</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="practical_skills" value="Strongly Agree" required>
                    <label class="form-check-label">Strongly Agree</label>
                    </div>
                </div>
                </div>
                <div class="mb-3" class="col-md-4 col-form-label text-md-right">
                <label>The work Environment was positive and productive?</label>
                <div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="positive_work_environment" value="Strongly Disagree" required>
                    <label class="form-check-label">Strongly Disagree</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="positive_work_environment" value="Disagree" required>
                    <label class="form-check-label">Disagree</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="positive_work_environment" value="Neutral" required>
                    <label class="form-check-label">Neutral</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="positive_work_environment" value="Agree" required>
                    <label class="form-check-label">Agree</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="positive_work_environment" value="Strongly Agree" required>
                    <label class="form-check-label">Strongly Agree</label>
                    </div>
                </div>
                </div>
                <div class="mb-3" class="col-md-4 col-form-label text-md-right">
                <label>Have you built your own network / Connection?</label>
                <div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="build_network" value="Strongly Disagree" required>
                    <label class="form-check-label">Strongly Disagree</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="build_network" value="Disagree" required>
                    <label class="form-check-label">Disagree</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="build_network" value="Neutral" required>
                    <label class="form-check-label">Neutral</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="build_network" value="Agree" required>
                    <label class="form-check-label">Agree</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="build_network" value="Strongly Agree" required>
                    <label class="form-check-label">Strongly Agree</label>
                    </div>
                </div>
                </div>
                <div class="mb-3" class="col-md-4 col-form-label text-md-right">
                <label>I would recommend this internship to another student.</label>
                <div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="recommend_internship" value="Strongly Disagree" required>
                    <label class="form-check-label">Strongly Disagree</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="recommend_internship" value="Disagree" required>
                    <label class="form-check-label">Disagree</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="recommend_internship" value="Neutral" required>
                    <label class="form-check-label">Neutral</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="recommend_internship" value="Agree" required>
                    <label class="form-check-label">Agree</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="recommend_internship" value="Strongly Agree" required>
                    <label class="form-check-label">Strongly Agree</label>
                    </div>
                </div>
                </div>
                <div class="mb-3" class="col-md-4 col-form-label text-md-right">
                <label>Would you consider working for this organization in the future? Why or why not?</label>
                <textarea class="form-control" name="consider_working_organization" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                <label class="col-md-4 col-form-label text-md-right">Please include any other comments or information you feel would be helpful</label>
                <textarea class="form-control" name="other_comments" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <div class="text-end">
                    <button type="submit" class="btn btn-primary add-feedback">Add Feedback</button>
                    </div>
                </div>
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


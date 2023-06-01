<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>HR Admin Panel</title>
      <!-- Bootstrap 5 CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- jQuery and Bootstrap 5 JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    /* set the height of the sidebar to the page height */
    .sidebar {
      min-height: 100vh;
      height:auto;

      
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
  </style>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<body>

@section('content')

<body>
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
                  <a class="nav-link active" aria-current="page" href="{{ route('hrdashboard') }}">
                    <span data-feather="home"></span>
                    Student Dashboard
                  </a>
              </li>
              <!-- supervisors.all -->
              <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{ route('supervisors.all') }}">
                    <span data-feather="home"></span>
                    Mentors & HR Dashboard
                  </a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('assignpage') }}">
                <span data-feather="file"></span>
                Assign Students
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('assignedview') }}">
                <span data-feather="file"></span>
                Assigned Students
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link modal-selector" href="#" data-toggle="modal" data-target="#addSupervisorModal">
                  <span data-feather="shopping-cart"></span>
                  Add New HR/Supervisor
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link modal-selector" href="{{ route('mentorfeedbacks.all') }}" data-toggle="modal" data-target="#addSupervisorModal">
                  <span data-feather="shopping-cart"></span>
                  Show Mentor Feedbacks
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="#">
                
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-danger" type="submit"><span data-feather="layers">Logout</span></button>
                </form>
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <!-- Add Superviosrs -->
      <div class="modal fade" id="addSupervisorModal" tabindex="-1" role="dialog" aria-labelledby="addSupervisorModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addSupervisorModalLabel">Add New HR/Supervisor</h5>
                </button>
              </div>
              <div class="modal-body">
                <form method="POST" action="{{ route('supervisors.store') }}">
                  @csrf
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="example@elswedey-ind.com" required>
                  </div>
                  <div class="form-group">
                      <label for="type">Type</label>
                      <select name="type" class="form-control" id="type">
                          <option value=""></option>
                          <option value= "hr">HR</option>
                          <option value="supervisor">Supervisor</option>
                      </select>
                  </div>
                  <div class="form-group" id="industry-group" style="display:none;">
                    <label for="industry">Industry:</label>
                    <select name="industry" id="industry" class="form-select" onchange="updateTrainingFieldsforAssign()">
                      <option value="" disabled selected>Select an option</option>
                      <option value="" disabled selected>Select an option</option>
                      <option value="Lighting" {{ old('preferred_industry') == 'Lighting' ? 'selected' : '' }}>Lighting</option>
                      <option value="Panels" {{ old('preferred_industry') == 'Panels' ? 'selected' : '' }}>Panels</option>
                      <option value="Steel" {{ old('preferred_industry') == 'Steel' ? 'selected' : '' }}>Steel</option>
                      <option value="Sheet Metal Fabrication" {{ old('preferred_industry') == 'Sheet Metal Fabrication' ? 'selected' : '' }}>Sheet Metal Fabrication</option>
                      <option value="Support Functions" {{ old('preferred_industry') == 'Support Functions' ? 'selected' : '' }}>Support Functions</option>
                    </select>
                </div>
                
                <div class="form-group" id="training_field_assign_id" style="display:none;">
                      <label for="training_field_assign">{{ __('Training Field') }}</label>
                      <select class="form-control" id="training_field_assign" name="training_field_assign">
                        <option value="">Select Training field</option>
                      </select>
                    </div>
                 
                  <div class="modal-footer">
                    <script>
                      function updateTrainingFieldsforAssign() {
        var preferredIndustryAssign = document.getElementById("industry").value;
        var trainingFieldSelectAssign = document.getElementById("training_field_assign");

        // Clear existing options
        trainingFieldSelectAssign.innerHTML = '<option value="">-- Select Preferred Training Field --</option>';

        if (preferredIndustryAssign === "Lighting" || preferredIndustryAssign === "Sheet Metal Fabrication" || preferredIndustryAssign === "Steel" || preferredIndustryAssign === "Panels") {
            var trainingFieldsAssign = ["Technical Office (Engineers only)", "Commercial (Engineers only)", "Manufacturing (Engineers only)"];
            
            // Add new options
            trainingFieldsAssign.forEach(function(trainingField) {
                var option = document.createElement("option");
                option.value = trainingField;
                option.text = trainingField;
                trainingFieldSelectAssign.appendChild(option);
            });

            // Show the container
            
        } else {
            var trainingFieldsAssign = ["Human Resources", "Health and Safety","Finance","Information Technology"];
            // Add new options
            trainingFieldsAssign.forEach(function(trainingField) {
                var option = document.createElement("option");
                option.value = trainingField;
                option.text = trainingField;
                trainingFieldSelectAssign.appendChild(option);
            });
            // Hide the container
            
        }
    }
    $(document).ready(function(){
        $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    //check box 
    $(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('input[type="checkbox"]').on('change', function() {
        var internId = $(this).attr('data-intern-id');
        var isChecked = $(this).is(':checked');
        console.log(internId);
        console.log(isChecked);
        

        $.ajax({
            url: '/interns/' + internId + '/accept',
            type: 'GET',
            dataType: 'json',
            data: { is_accepted: isChecked },
            success: function(response) {
                // handle success
            },
            error: function(xhr) {
                // handle error
                console.log(xhr.response);

            }
        });
    });
});
var industryGroup = document.getElementById('industry-group');
    var training_field_assign_id = document.getElementById('training_field_assign_id');
    var typeDropdown = document.getElementById('type');

    // Show/hide the industry group based on the selected value of the type dropdown
    typeDropdown.addEventListener('change', function() {
    if (typeDropdown.value === 'supervisor') {
        industryGroup.style.display = 'block';
        training_field_assign_id.style.display = 'block';
    } else {
        industryGroup.style.display = 'none';
        training_field_assign_id.style.display = 'none';
    }
    });

                    </script>
                    <button type="submit" class="btn btn-primary">Add User</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal upload users with excel -->
        <!--  -->
        

      <!-- Main content -->
      
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  @yield('content')
</main>

</div>
  </div>

 
</body>
</html>
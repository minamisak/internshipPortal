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
            <li class="nav-item">
              <a class="nav-link" href="{{ route('assignpage') }}">
                <span data-feather="file"></span>
                Assign Students
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('get-users-interns') }}">
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
                    <input type="email" class="form-control" id="email" name="email" placeholder="example@@elswedey-ind.com" required>
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
                    <select name="industry" id="industry" class="form-select">
                        <option value="technology">Lighting</option>
                        <option value="finance">Panels</option>
                        <option value="healthcare">Steel</option>
                    </select>
                </div>
                  
                  <div class="modal-footer">
                    
                    <button type="submit" class="btn btn-primary">Add User</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

      <!-- Add SuperVisor -->
      
      <!-- Main content -->
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" style="margin-top:20px;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header">
            <h1 class="text-center">{{ __('Assign Students') }}</h1>
          </div>
          <div class="card-body">
          <table class="table table-bordered">
    <thead>
        <tr>
            
            <th>User Name</th>
            <th>User Email</th>
            <th>User Industry</th>
            
            <th>Intern Full Name</th>
            <th>Intern Email</th>
            <th>Intern Industry</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
        <tr>
            
            <td>{{ $row['user_name'] }}</td>
            <td>{{ $row['user_email'] }}</td>
            <td>{{ $row['user_industry'] }}</td>
            
            <td>{{ $row['intern_full_name'] }}</td>
            <td>{{ $row['intern_email'] }}</td>
            <td>{{ $row['intern_industry'] }}</td>
            <td>
                <button class="btn btn-danger remove-intern-btn" data-intern-id="{{ $row['intern_id'] }}">Remove</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

          </div>
        </div>
      </div>
    </div>
  </div>
</main>

    </div>
  </div>

 
</body>
</html>
<script>
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

var loginBtn = document.querySelector('.modal-selector');
        loginBtn.addEventListener('click', function() {
            $('#addSupervisorModal').modal('show');
        });

    var typeDropdown = document.getElementById('type');

    // Get the industry group element
    var industryGroup = document.getElementById('industry-group');

    // Show/hide the industry group based on the selected value of the type dropdown
    typeDropdown.addEventListener('change', function() {
    if (typeDropdown.value === 'supervisor') {
        industryGroup.style.display = 'block';
    } else {
        industryGroup.style.display = 'none';
    }
    });


    $(document).ready(function() {
        $('.remove-intern-btn').on('click', function() {
    var internId = $(this).data('intern-id');
    
    $.ajax({
        url: '/hr/reomve-interns/' + internId,
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            // Display success message or perform any other actions
            location.reload();

        },
        error: function(xhr, status, error) {
            // Display error message or perform any other error handling
            alert('An error occurred while removing the intern.');
        }
    });
});

});



</script>

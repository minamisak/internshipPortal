<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>HR Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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
            <img src="{{ asset('assets/img/logo-1.png') }}" alt="Logo" height="50" class="d-inline-block align-middle me-2">
          </div>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">
                <span data-feather="home"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('assignpage') }}">
                <span data-feather="file"></span>
                Assign Students
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="shopping-cart"></span>
                Products
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="users"></span>
                Customers
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="bar-chart-2"></span>
                Reports
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="layers"></span>
                Integrations
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

      <!-- Main content -->
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="container"  style="overflow-x: scroll;">
    <div class="row">
        <div class="col-md-12">
            <h1>Student Records</h1>
            <input type="text" id="search" class="form-control mb-3" placeholder="Search...">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Birthdate</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>City</th>
                        <th>Address</th>
                        <th>University</th>
                        <th>Bachelor Degree</th>
                        <th>Graduation Year</th>
                        <th>Major</th>
                        <th>Certificate</th>
                        <th>Preferred Industry</th>
                        <th>Preferred Training Field</th>
                        <th>Grade</th>
                        <th>Training Info</th>
                        <th>Source</th>
                        <th>Referral Name</th>
                        <th>IsAccepted</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->full_name }}</td>
                            <td>{{ $student->birthdate }}</td>
                            <td>{{ $student->mobile }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->city }}</td>
                            <td>{{ $student->address }}</td>
                            <td>{{ $student->university }}</td>
                            <td>{{ $student->bachelor_degree }}</td>
                            <td>{{ $student->graduation_year }}</td>
                            <td>{{ $student->major }}</td>

                            <td><a href="{{ asset('assets/'.$student->grade_certificate) }}">File uploaded</a></td>
                            <!-- {{ asset('path/to/file.pdf') }}" target="_blank" -->
                            <td>{{ $student->preferred_industry }}</td>
                            <td>{{ $student->preferred_training_field }}</td>
                            <td>{{ $student->grade }}</td>
                            <td>{{ $student->training_info }}</td>
                            <td>{{ $student->source }}</td>
                            <td>{{ $student->referral_name }}</td>
                            <td>
                                <div class="form-check">
                                <input class="form-check-input is_accepted_checkbox" type="checkbox"
                                    data-intern-id="{{ $student->id }}" 
                                    @if($student->IsAccepted) checked @endif>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
</script>

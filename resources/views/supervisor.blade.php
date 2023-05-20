<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome to Elsweedy</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
              <a class="nav-link" href="#">
                <span data-feather="bar-chart-2"></span>
                Feedback
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
              <form method="POST" action="{{ route('resetPassword', ['userId' => $user->id]) }}">
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
        
            <div class="col-md-8">
                <h1>{{ $user->name }}</h1>
            </div>
            @foreach($supervisorData as $intern)
  <div class="card mb-3">
    <div class="card-body d-flex align-items-center">
      <div style="display: block;width: 80%;">
        <h5 class="card-title">{{ $intern->full_name }}</h5>
        <p class="card-text">{{ $intern->email }}</p>
        <p class="card-text">{{ $intern->preferred_industry }}</p>
      </div>
      <div class="ml-auto">
        <a href="" class="btn btn-primary float-right">Add Feedback</a>
      </div>
    </div>
  </div>
  @endforeach
        </div>
    </div>
        </div>
    </div>
    </div>

      </main>
    
    </div>
</div>

<!-- Bootstrap 5 JS Bundle with Popper -->
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
        var  resetPasswordModalBtn = document.querySelector('.nav-item .modal-selector');
        resetPasswordModalBtn.addEventListener('click', function() {
            $('#resetPasswordModal').modal('show');
        });
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
@elseif(session('error'))
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

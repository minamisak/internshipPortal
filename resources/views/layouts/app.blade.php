<!DOCTYPE html>
<html lang="en">
<head>
    <!-- //head -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/falogo.png') }}">

    <!-- Bootstrap 5 CSS -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <!-- jQuery and Bootstrap 5 JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert@2.1.2/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <title>@yield('title')</title>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #e8ebe9a6; height: 100px;">
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
                    <a class="nav-link" href="#whoweare" style="color:darkblue;" >Who We Are</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#canapplay" style="color:darkblue;" >Who Can Apply</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="#register" style="color:darkblue;" >Register Now</a>
                </li>
            </ul>
        </div>
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
            <button type="submit" class="login-btn btn btn-primary" style="background-color:#1f1759;">Login</button>
        </form>

      </div>
    </div>
  </div>
</div>

    
    <!-- add your footer here -->
    <script>
        var loginBtn = document.querySelector('.navbar .btn-outline-light');
        loginBtn.addEventListener('click', function() {
            $('#loginModal').modal('show');
        });
    </script>
    <div class="container">
        @yield('content')
    </div>
    

</body>
</html>
<style>
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

@if (session('error'))
    <script>
        $(document).ready(function() {
            Swal.fire({
                icon: 'error',
                title: 'error!',
                text: '{{ session('error') }}'
            });
        });
    </script>
@endif

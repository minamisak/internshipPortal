<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome to Elsweedy</title>
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
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="bar-chart-2"></span>
                Feedback
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="layers"></span>
                Print Certificate
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="#">
                
                <form action="{{ route('logout') }}" method="GET">
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
        @if($intern->IsAccepted == true)
        <div class="col-md-3">
                @if($intern->image_path)
                    <img src="{{ asset($intern->image_path) }}" alt="{{ $intern->full_name }}" class="img-fluid rounded-circle">
                @else
                    <div class="empty-image">
                    <img src="{{ asset('assets/img/emptyImg.png') }}" alt="user" height="100" class="d-inline-block align-middle me-2">

                        <span class="text-white">{{ strtoupper(substr($intern->full_name, 0, 1)) }}</span>
                    </div>
                @endif
            </div>
            <div class="col-md-8">
                <h1>{{ $intern->full_name }}</h1>
                <p>Training Industry: {{ $intern->training_industry }}</p>
                <p>Training Field: {{ $intern->training_field }}</p>
                <p>Supervisor's Full Name: {{ $intern->supervisor_name }}</p>
                <p>Supervisor's Title: {{ $intern->supervisor_title }}</p>
                <button class="btn btn-primary disabled float-right">Print Certificate</button>
            </div>
        </div>
        @else
            <div class="col-md-8">
                <h4>Welcome {{ $intern->full_name }} We will contact you soon</h4>
            </div>
          @endif
        </div>
        
    </div>
        </div>
    </div>
    </div>

      </main>
    
    </div>
</div>



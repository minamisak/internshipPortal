@extends('layouts.app')
@section('title', 'HR dashboard')
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
@section('content')
<div class="container mt-8" style="margin-top:200px;">
    <h1 class="text center mb-5">
        Admin Dashboard
    </h1>
    <div class="table-responsive">
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Full Name</th>
      <th scope="col">Birthdate</th>
      <th scope="col">Mobile</th>
      <th scope="col">Email</th>
      <th scope="col">City</th>
      <th scope="col">Address</th>
      <th scope="col">University</th>
      <th scope="col">Bachelor Degree</th>
      <th scope="col">Graduation Year</th>
      <th scope="col">Major</th>
      <th scope="col">Certificate</th>
      <th scope="col">Preferred Industry</th>
      <th scope="col">Preferred Training Field</th>
      <th scope="col">Grade</th>
      <th scope="col">Training Info</th>
      <th scope="col">Source</th>
      <th scope="col">Referral Name</th>
      <th scope="col">IsAccepted</th>
    </tr>
  </thead>
  <tbody>
    @foreach($interns as $intern)
    <tr>
      <td>{{ $intern->full_name }}</td>
      <td>{{ $intern->birthdate }}</td>
      <td>{{ $intern->mobile }}</td>
      <td>{{ $intern->email }}</td>
      <td>{{ $intern->city }}</td>
      <td>{{ $intern->address }}</td>
      <td>{{ $intern->university }}</td>
      <td>{{ $intern->bachelor_degree }}</td>
      <td>{{ $intern->graduation_year }}</td>
      <td>{{ $intern->major }}</td>
      <td>{{ $intern->grade_certificate }}</td>
      <td>{{ $intern->preferred_industry }}</td>
      <td>{{ $intern->preferred_training_field }}</td>
      <td>{{ $intern->grade }}</td>
      <td>{{ $intern->training_info }}</td>
      <td>{{ $intern->source }}</td>
      <td>{{ $intern->referral_name }}</td>
      <td>
        <div class="form-check">
          <input class="form-check-input is_accepted_checkbox" type="checkbox"
            data-intern-id="{{ $intern->id }}" 
            @if($intern->IsAccepted) checked @endif>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
    </div>


</div>
<script>
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

<style>
  /* Custom styles for the table */
  .table-responsive {
    margin-top:150px!important;
    overflow-x: auto;
  }
  th, td {
    vertical-align: middle;
  }
  .form-check-input {
    margin-top: 0;
    margin-bottom: 0;
  }
</style>

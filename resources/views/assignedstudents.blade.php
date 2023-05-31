@extends('layouts.adminlayouts')
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header">
            <h1 class="text-center">{{ __('Assign Students') }}</h1>
            <input type="text" id="search" class="form-control mb-3" placeholder="Search...">
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
@endsection

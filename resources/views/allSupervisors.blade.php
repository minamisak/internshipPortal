@extends('layouts.adminlayouts')
@section('content')
      <!-- Main content -->
      
      <div class="container"  style="overflow-x: scroll;">
    <div class="row">
        <div class="col-md-12">
            <h1>El Seweedy Users</h1>
            <input type="text" id="search" class="form-control mb-3" placeholder="Search...">
            <div style="margin:10px 0;">
    <form action="{{ route('import.data') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" required style="border: 1px solid #ccc; padding: 5px; border-radius: 5px;">
        <button type="submit" style="background-color: #140d45; color: #fff; padding: 10px; border: none; border-radius: 5px;">Import</button>
    </form>
</div>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Industry</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody> 
                    @foreach ($supervisors as $supervisor)
                        <tr>
                            <td>{{ $supervisor->id}}</td>
                            <td>{{ $supervisor->name }}</td>
                            <td>{{ $supervisor->email }}</td>
                            <td>{{ $supervisor->industry }}</td>
                            <td>{{ $supervisor -> type}}</td>
                            <td>
                                <button class="btn btn-danger remove-intern-btn" data-supervisor-id="{{ $supervisor->id }}">Remove</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
    var supervisorId = $(this).data('supervisor-id');
    
    $.ajax({
        url: '/hr/reomve-supervisor/' + supervisorId,
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
    

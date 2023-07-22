@extends('layouts.adminlayouts')
@section('content')
      <!-- Main content -->
      
      <div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Student Feedbacks</h1>
            <input type="text" id="search" class="form-control mb-3" placeholder="Search...">
            <div style="margin:10px 0;">
            <button class="btn btn-primary col-md-3 float-right" onclick="location.href='/export/studentsfeedback';" type="button" style="background: #140d45;color: whitesmoke;border-radius: 11px;">Download Student Feedbacks</button>
</div>



            <table class="table table-striped table-bordered" style="max-height: 800px; overflow-y: auto;">

                <thead>
                    <tr>
                        <th>Intern Full Name</th>
                        <th>Mobile Number</th>
                        <th>Mentor Name</th>
                        <th>Orientation Sufficient	</th>                        
                        <th>Supervisor Available</th>
                        <th>Challenging Internship</th>
                        <th>Practical Skills</th>
                        <th>Positive Work Environment</th>
                        <th>Build Network</th>
                        <th>Recommend Internship</th>
                        
                        <th>comments</th>
                        <th>Training Industry</th>
                        
                        
                        
                    </tr>
                </thead>
                <tbody> 
                    @foreach ($all_student_feedbacks as $all_feedback)
                        <tr>
                            <td>{{ $all_feedback->intern_full_name }}</td>
                            <td>{{ $all_feedback->mobile_number}}</td>
                            <td>{{ $all_feedback -> supervisor_full_name}}</td>
                            <td>{{ $all_feedback -> orientation_sufficient}}</td>
                            
                            <td>{{ $all_feedback -> supervisor_available }}</td>
                            <td>{{ $all_feedback -> challenging_internship	 }}</td>
                            <td>{{ $all_feedback -> practical_skills	 }}</td>
                            <td>{{ $all_feedback -> positive_work_environment	 }}</td>
                            <td>{{ $all_feedback -> build_network	 }}</td>
                            <td>{{ $all_feedback -> recommend_internship	 }}</td>
                            
                            <td>{{ $all_feedback -> comments	 }}</td>
                            <td>{{ $all_feedback -> training_industry	 }}</td>
                            
                            
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
    

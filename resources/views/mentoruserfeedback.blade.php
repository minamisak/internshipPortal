@extends('layouts.adminlayouts')
@section('content')
      <!-- Main content -->
      
      <div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Mentors Feedbacks</h1>
            <input type="text" id="search" class="form-control mb-3" placeholder="Search...">
            <div style="margin:10px 0;">
            <button class="btn btn-primary col-md-3 float-right" onclick="location.href='/export/mentorfeedback';" type="button" style="background: #140d45;color: whitesmoke;border-radius: 11px;">Download Feedbacks</button>
</div>



            <table class="table table-striped table-bordered" style="max-height: 800px; overflow-y: auto;">

                <thead>
                    <tr>
                        <th>Mentor Name</th>
                        <th>Intern Full Name</th>
                        <th>Industry</th>
                        <th>Training Field</th>
                        <th>Training Round</th>
                        <th>Objectively considered ideas</th>
                        <th>Was receptive to supervision?</th>
                        <th>Was punctual and dependable?</th>
                        <th>Demonstrated initiative?</th>
                        <th>Quality of completed tasks met expectations?</th>
                        <th>Able to learn new skills?</th>
                        <th>Effectively solved problems?</th>
                        <th>Was academically prepared for internship?</th>
                        <th>What were the intern's strengths?</th>
                        <th>What were the intern's weaknesses?</th>
                        <th>I would hire this intern </th>
                        
                        
                    </tr>
                </thead>
                <tbody> 
                    @foreach ($all_feedbacks as $all_feedback)
                        <tr>
                            <td>{{ $all_feedback->supervisor_full_name}}</td>
                            <td>{{ $all_feedback->intern_full_name }}</td>
                            <td>{{ $all_feedback->training_industry }}</td>
                            <td>{{ $all_feedback -> training_field}}</td>
                            <td>{{ $all_feedback -> training_round}}</td>
                            <td>{{ $all_feedback -> considered_other_people }}</td>
                            <td>{{ $all_feedback -> receptive }}</td>
                            <td>{{ $all_feedback -> punctual_and_dependable }}</td>
                            <td>{{ $all_feedback -> demonstrated_completed_tasks }}</td>
                            <td>{{ $all_feedback -> quality_of_completed_tasks }}</td>
                            <td>{{ $all_feedback -> able_to_learn }}</td>
                            <td>{{ $all_feedback -> critical_thinking }}</td>
                            <td>{{ $all_feedback -> academically_prepared }}</td>
                            <td>{{ $all_feedback -> intern_strengths }}</td>
                            <td>{{ $all_feedback -> intern_weaknesses }}</td>
                            <td>{{ $all_feedback -> hire_intern}}</td>
                            
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
    

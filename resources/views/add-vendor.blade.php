@extends('layouts.app')

@section('content')

    <!-- Datatable plugin CSS file -->
    <link rel="stylesheet" href= 
"https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" /> 
  
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success'))
<script>
    Swal.fire({
        title: 'Thank you!',
        text: '{{ session('success') }}',
        icon: 'success',
        confirmButtonText: 'OK'
    });
</script>
@endif

<div class="container">
  
    <div class="row justify-content-center mt-5">
        <div class="card">
            <div class="card-header">
                <h4>Add Vendor</h4>
            </div>
            <div class="card-body">
         <form id="carDetailsForm" action="vendor" method="POST" enctype="multipart/form-data">
            @csrf
        
        <div class="form-group">
            <label for="name">Name of Person</label>
            <input type="text"  class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="contact_no">Contact No.</label>
            <input type="text" class="form-control" id="contact_no" name="contact_no" required>
        </div>
        <div class="form-group">
            <label for="contact_no"> Email.</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="company_name">Company Name (if any)</label>
            <input type="text"  class="form-control" id="company_name" name="company_name">
        </div>
        <div class="form-group">
            <label for="no_of_cars">No. of Cars Operated</label>
            <input type="number"  class="form-control" id="no_of_cars" name="no_of_cars" required>
        </div>
        <div class="form-group">
            <label for="owner_drives">Does Owner Drive Himself?</label>
            <select id="owner_drives"  class="form-control" name="owner_drives" required>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="is_interested">Is Interested in Joining?</label>
            <select id="is_interested"  class="form-control" name="is_interested" required>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>

        <div id="carDetailsContainer">
            <div class="car-details">
                <h4>Car Details</h4>
                <div class="form-group">
                    <label for="car_type">Type of Vehicle</label>
                    <input type="text" class="form-control" name="car_type[0]" required>
                </div>
                <div class="form-group">
                    <label for="car_class">Class</label>
                    <input type="text" class="form-control" name="car_class[0]" required>
                </div>
                <div class="form-group">
                    <label for="car_registration">Registration Number</label>
                    <input type="text" class="form-control" name="car_registration[0]" required>
                </div>
            </div>
        </div>
        
        <button type="button" id="addCarDetails" class="btn btn-primary">Add More Car Details</button>
        <br><br>
        <button type="submit" class="btn btn-success">Submit</button>
        <a href="{{ URL::previous() }}" class="btn btn-primary">Back</a>

    </form>
            </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src= 
"https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"> 
     </script> 
    <script>
        
        /* Initialization of datatable */ 
        $(document).ready( function () {
    $('#tabledata').DataTable();
} );

        $(document).ready(function() {
            $('#addCarDetails').click(function() {
                var carDetails = `
                <div class="car-details">
                    <h4>Car Details</h4>
                    <div class="form-group">
                        <label for="car_type">Type of Vehicle</label>
                        <input type="text"  class="form-control" name="car_type[]" required>
                    </div>
                    <div class="form-group">
                        <label for="car_class">Class</label>
                        <input type="text"  class="form-control" name="car_class[]" required>
                    </div>
                    <div class="form-group">
                        <label for="car_registration">Registration Number</label>
                        <input type="text"  class="form-control" name="car_registration[]" required>
                    </div>
                    <button type="button" class="removeCarDetails btn btn-danger">Remove</button>
                </div>
                `;
                $('#carDetailsContainer').append(carDetails);
            });

            $(document).on('click', '.removeCarDetails', function() {
                $(this).parent('.car-details').remove();
            });

            // $('#carDetailsForm').submit(function(event) {
            //     event.preventDefault();
            //     alert('Form submitted successfully!');
            //     // Here you can add your AJAX form submission logic
            // });
        });
    </script>
    </div>
</div>
@endsection

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
    <div class="row">
        <div class="card">
            <div class="card-headerd-flex justify-content-space-between">
                <h4>Vendors</h4>
                <a href="add-vendor" class="btn btn-warning">Add Vendor</a>
            </div>
            <div class="card-body">
                <table class="table display" style="width:100%" id="tabledata">
                    <tr>
                        <th>Name</th>
                        <th>Contact No</th>
                        <th>Email</th>
                        <th>Company Name</th>
                        <th>No. of Cars</th>
                        <th>Action</th>
                    </tr>
                    @foreach($vendors as $vendor)
                    <tr>
                    <td>{{$vendor->name}}</td>
                    <td>{{$vendor->contact_no}}</td>
                    <td>{{$vendor->email}}</td>
                    <td>{{$vendor->company_name}}</td>
                    <td>{{$vendor->no_of_cars}}</td>
                    <td><a href="vendor-details?id={{$vendor->id}}" class="btn btn-success">View More</a></td>      
                    </tr>
                    @endforeach
                </table>
            </div>
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
@endsection

@extends('layouts.app')

@section('content')
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
            <div class="card-header d-flex">
                <h4>Vendor Detils</h4>
                <a href="{{ URL::previous() }}" class="btn btn-primary">Back</a>

            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Name</th>
                        <td>:</td>
                        <td>{{$vendor->name}}</td>
                    </tr>
                    <tr>
                        <th>Contact No</th>
                        <td>:</td>
                        <td>{{$vendor->contact_no}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>:</td>
                        <td>{{$vendor->email}}</td>
                    </tr>
                    <tr>
                        <th>Company Name</th>
                        <td>:</td>
                        <td>{{$vendor->company_name}}</td>
                    </tr>
                    <tr>
                        <th>No. of Cars</th>
                        <td>:</td>
                        <td>{{$vendor->no_of_cars}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="card">
            <div class="card-header">
                <h4>Car Detils</h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <th>Car Type</th>
                        <th>Car Class</th>
                        <th>Car Registration</th>
                        
                    </tr>
                    @foreach($car_details as $car_detail)
                    <tr>
                    <td>{{$car_detail->car_type}}</td>
                    <td>{{$car_detail->car_class}}</td>
                    <td>{{$car_detail->car_registration	}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
   
</div>
@endsection

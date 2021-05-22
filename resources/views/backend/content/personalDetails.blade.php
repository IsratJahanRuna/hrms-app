
@extends('backend.partial.employeeMaster')

@section('content')





    <h2 class="mt-3 text-center text-decoration-underline" style="color:rgb(10, 69, 136);">Personal Details</h2>
    <div class="card m-auto my-5 rounder shadow " style="width: 27rem; height: 30rem;">
        <div class="m-auto my-3 border shadow">
            <img src="{{url('/files/photo/'.$employee->file)}}" style="width:180px; height:150px;" >
        </div>
        <div class="card-body my-1 m-auto text-info fst-italic">
          <h4 class="card-text"><b class="" style="color:rgb(10, 69, 136);">Name:</b> {{$employee->employeeDetail->name}}</h4>
          <h5 class="card-text"><b class="" style="color:rgb(10, 69, 136);">ID:</b> {{$employee->employee_id}}</h5>
          <h5 class="card-text"><b class="" style="color:rgb(10, 69, 136);">Department:</b> {{$employee->department->department}}</h5>
          <h5 class="card-text"><b class="" style="color:rgb(10, 69, 136);">Designation:</b> {{$employee->designation->designation}}</h5>
          <h5 class="card-text"><b class="" style="color:rgb(10, 69, 136);">Email:</b> {{$employee->employeeDetail->email}}</h5>
          <h5 class="card-text"><b class="" style="color:rgb(10, 69, 136);">Contact:</b> {{$employee->contact}}</h5>
          <h5 class="card-text"><b class="" style="color:rgb(10, 69, 136);">Address:</b> {{$employee->address}}</h5>
          <h5 class="card-text"><b class="" style="color:rgb(10, 69, 136);">Total Leave:</b> {{$employee->total_casual_leave + $employee->total_anual_leave + $employee->total_sick_leave}} days</h5>

        </div>
      </div>



@endsection

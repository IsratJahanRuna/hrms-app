{{-- Employee Details table --}}
{{-- <table class="table my-3 " style="margin-right: 200px;">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Picture</th>
        <th scope="col">Name</th>
        <th scope="col">Account No.</th>
        <th scope="col">Department</th>
        <th scope="col">Designation</th>
        <th scope="col">Email</th>
        <th scope="col">Contact No.</th>
        <th scope="col">Address</th>
      </tr>
    </thead>

    <tbody>

      <tr>
        <th scope="row">1</th>
        <td><img src="{{url('/files/photo/'.$employee->file)}}" style="width:70px; height:60px;" ></td>
        <td> {{$employee->employeeDetail->name}}</td>
        <td>dssf </td>
        <td> {{$employee->department->department}}</td>
        <td> {{$employee->designation->designation}}</td>
        <td> {{$employee->employeeDetail->email}}</td>
        <td> {{$employee->contact}}</td>
        <td> {{$employee->address}}</td>

      </tr>

    </tbody>
  </table> --}}
@extends('backend.partial.adminMaster')

@section('contents')





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

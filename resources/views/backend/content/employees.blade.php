@extends('backend.partial.employeeMaster')

@section('contents')

{{-- Employee Details table --}}
<table class="table my-5 mx-5 rounded shadow">
    <thead >
      <tr >
        <th scope="col">#</th>
        <th scope="col">Picture</th>
        <th scope="col">Name</th>
        <th scope="col">Employee_Id</th>
        <th scope="col">Gender</th>
        <th scope="col">Department</th>
        <th scope="col">Designation</th>
        <th scope="col">Email</th>
        <th scope="col">Contact No.</th>
        <th scope="col">Address</th>

      </tr>
    </thead>
    <tbody>
        @foreach($employees as $key=>$request)

        <tr>
            <th scope="row">{{$key+1}}</th>
            <td><img src="{{url('/files/photo/'.$request->file)}}" style="width:70px; height:60px;" ></td>
            <td>{{$request->employeeDetail->name}}</td>
            <td>{{$request->employee_id}}</td>
            <td>{{$request->gender}}</td>
            <td>{{$request->department->department}}</td>
            <td>{{$request->designation->designation}}</td>
            <td>{{$request->employeeDetail->email}}</td>
            <td>{{$request->contact}}</td>
            <td>{{$request->address}}</td>

        </tr>
        @endforeach
        </tbody>

@endsection

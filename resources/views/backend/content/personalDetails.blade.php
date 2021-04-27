@extends('backend.partial.employeeMaster')

@section('contents')




{{-- Employee Details table --}}
<table class="table my-3 " style="margin-right: 200px;">
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
{{-- @dd($employee) --}}
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
  </table>









@endsection

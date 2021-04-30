@extends('backend.partial.adminMaster')

@section('contents')




<table class="table my-3 " style="margin-right: 200px;">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Department</th>
        <th scope="col">Leave_Type</th>
        {{-- <th scope="col">From_Date</th>
        <th scope="col">To_Date</th> --}}
        <th scope="col">Accepted_From_Date</th>
        <th scope="col">Accepted_To_Date</th>
        <th scope="col">About</th>
      </tr>
    </thead>
    <tbody>
        @foreach($notifications as $key=>$request)

        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$request->employeeDetail->name}}</td>
            <td>{{$request->employeeDetail->email}}</td>
            <td>{{$request->department->department}}</td>
            <td>{{$request->type}}</td>
            {{-- <td>{{$request->from}}</td>
            <td>{{$request->to}}</td> --}}
            <td>{{$request->accept_from}}</td>
            <td>{{$request->accept_to}}</td>
            <td>{{$request->about}}</td>


        </tr>
        @endforeach
        </tbody>

  </table>
  @endsection

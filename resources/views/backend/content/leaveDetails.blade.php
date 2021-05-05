@extends('backend.partial.adminMaster')

@section('contents')

<h2 class="mt-5 text-center text-decoration-underline">Leave Details</h2>


<table class="table my-3 " style="margin-right: 200px;">
    <thead>
      <tr>
        <th scope="col">#</th>
        {{-- <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Department</th> --}}

        <th scope="col">Leave_Type</th>
        <th scope="col">From_Date</th>
        <th scope="col">To_Date</th>
        <th scope="col">Description</th>
        <th scope="col">Reason</th>
        <th scope="col">Status</th>

      </tr>
    </thead>
    <tbody>
        @foreach($notifications as $key=>$request)
        {{-- @dd($request) --}}
        <tr>
            <th scope="row">{{$key+1}}</th>

            {{-- <td>{{$request->employeeDetail->name}}</td>
            <td>{{$request->employeeDetail->email}}</td>
            <td>{{$request->department->department}}</td> --}}
            <td>{{$request->type}}</td>
            <td>{{$request->from}}</td>
            <td>{{$request->to}}</td>
            <td>{{$request->about}}</td>
            <td>{{$request->reason}}</td>
            <td>{{$request->status}}</td>

        </tr>
        @endforeach
        </tbody>
        @endsection

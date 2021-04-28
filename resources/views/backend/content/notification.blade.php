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
        <th scope="col">From_Date</th>
        <th scope="col">To_Date</th>
        <th scope="col">Description</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($notifications as $key=>$request)

        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$request->name}}</td>
            <td>{{$request->email}}</td>
            <td>{{$request->department}}</td>
            <td>{{$request->type}}</td>
            <td>{{$request->from}}</td>
            <td>{{$request->to}}</td>
            <td>{{$request->about}}</td>
            <td>{{$request->status}}</td>
            <td>
                <a class="btn btn-success text-light" href="{{route('leaveAccept'),$request->id}}">Accept</a>
                <a class="btn btn-danger text-light" href="#">Decline</a>


            </td>
        </tr>
        @endforeach
        </tbody>

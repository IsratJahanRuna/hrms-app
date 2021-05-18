@extends('backend.partial.adminMaster')

@section('contents')


<h2 class="my-3 text-center text-decoration-underline">Leave Manage</h2>

<table class="table my-4 rounded shadow " style="margin-right: 200px;">
    <thead>
      <tr>
        <th class="py-4" scope="col">#</th>
        <th class="py-4" scope="col">Name</th>
        <th class="py-4" scope="col">Email</th>
        <th class="py-4" scope="col">Department</th>
        <th class="py-4" scope="col">Leave_Type</th>
        {{-- <th scope="col">From_Date</th>
        <th scope="col">To_Date</th> --}}
        <th class="py-4" scope="col">From_Date</th>
        <th class="py-4" scope="col">To_Date</th>
        <th class="py-4" scope="col">Status</th>
        <th class="py-4" scope="col">Reason</th>
        <th class="py-4" scope="col">About</th>
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
            <td>{{$request->from}}</td>
            <td>{{$request->to}}</td>
            <td>{{$request->status}}</td>
            <td>{{$request->reason}}</td>
            <td>{{$request->about}}</td>


        </tr>
        @endforeach
        </tbody>

  </table>

  {{$notifications->links()}}

  @endsection

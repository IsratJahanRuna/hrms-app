@extends('backend.partial.adminMaster')


@section('contents')

<h2 class="mt-3 text-center text-decoration-underline">Employee Attendance Record</h2>

<div style="overflow-x:auto;">

<table class="table my-4 rounded shadow " style="margin-right: 200px;">
    <thead>
      <tr>
        <th class="py-4" scope="col">#</th>
        <th class="py-4" scope="col">Employee_Name</th>
        <th class="py-4" scope="col">Logged_In_Email</th>
        <th class="py-4" scope="col">Entry_Time</th>
        <th class="py-4" scope="col">Out_Time</th>
      </tr>
    </thead>
    <tbody>
        @foreach($attendance as $key=> $request)

        <tr>
            <th scope="row">{{ $key+1}}</th>
            <td>{{ $request->attendanceUser->name}}</td>
            <td>{{ $request->attendanceUser->email}}</td>
            <td>{{ $request->in_time}}</td>
            <td>{{ $request->out_time}}</td>
        </tr>
        @endforeach
        </tbody>

  </table>
</div>

  {{$attendance->links()}}


@endsection



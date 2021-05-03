@extends('backend.partial.adminMaster')


@section('contents')

<h2 class="m-5 text-center text-decoration-underline">Employee Attendance Record</h2>

{{-- Employee Attendance Record Table --}}
<table class="table my-3 " style="margin-right: 200px;">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Employee_Name</th>
        <th scope="col">Logged_In_Email</th>
        <th scope="col">Entry_Time</th>
        <th scope="col">Out_Time</th>
      </tr>
    </thead>
    <tbody>
        @foreach($attendance as $key=> $request)

        <tr>
            <th scope="row">{{ $key+1}}</th>
            <td>{{ $request->attendanceUser-> name}}</td>
            <td>{{ $request->attendanceUser-> email}}</td>
            <td>{{ $request-> in_time}}</td>
            <td>{{ $request-> out_time}}</td>
        </tr>
        @endforeach
        </tbody>

  </table>


@endsection

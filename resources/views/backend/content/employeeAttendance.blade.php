@extends('backend.partial.EmployeeMaster')


@section('contents')

<h2 class="m-4 text-center text-decoration-underline">Attendance Record</h2>

{{-- Employee Attendance Record Table --}}
<table class="table my-3 rounded shadow" style="margin: 60px;">
    <thead>
      <tr>
        <th class="py-4" scope="col">#</th>
        <th class="py-4" scope="col">Employee_Name</th>
        <th class="py-4" scope="col">Logged_In_Email</th>
        <th class="py-4" scope="col">Entry_Time</th>
        <th class="py-4" scope="col">Out_Time</th>
        <th class="py-4" scope="col">Status</th>

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
            <td>{{ $request-> status}}</td>
        </tr>
        @endforeach
        </tbody>

  </table>
  {{$attendance->links()}}

@endsection

@extends('backend.partial.adminMaster')


@section('contents')

<h2 class="m-5 text-center text-decoration-underline">Employee Attendance Report</h2>

<form action={{route('report')}} method="GET">

    {{-- @csrf --}}

<div class="row">
    <div class="col-md-8">
        <div class=" row">
            <div class="col-md-6">
                <label for="from">Date From:</label>
                <input id="from" type="date" class="form-control" name="from_date">
            </div>

            <div class="col-md-6">
                <label for="to">Date To:</label>
                <input id="to" type="date" class="form-control" name="to_date">
            </div>
        </div>
    </div>
    <div class="col-md-4 mt-4 d-flex justify-content-center">
        <button type="submit" class= "btn btn-primary">Search</button>
        <button type="submit" class= "btn btn-success mx-3">Print</button>
    </div>
</div>
</form>

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

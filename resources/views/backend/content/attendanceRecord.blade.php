@extends('backend.partial.adminMaster')


@section('contents')

{{-- Employee Attendance Record Table --}}
<table class="table my-3 " style="margin-right: 200px;">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Employee_Name</th>
        <th scope="col">Employee_Id</th>
        <th scope="col">Logged_In_Email</th>
        <th scope="col">Date</th>
        <th scope="col">Entry_Time</th>
        <th scope="col">Out_Time</th>
      </tr>
    </thead>
    <tbody>
        {{-- @foreach($departments as $request) --}}

        <tr>
            <th scope="row">1</th>
            <td>Israt Jahan</td>
            <td>3</td>
            <td>isratjahanruna6@gmail.com</td>
            <td>4/11/2021</td>
            <td>10.00 AM</td>
            <td>6.00 PM</td>
        </tr>
        {{-- @endforeach --}}
        </tbody>

  </table>


@endsection

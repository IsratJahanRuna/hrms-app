@extends('backend.partial.EmployeeMaster')


@section('contents')

<h2 class="m-4 text-center text-decoration-underline">Attendance Record</h2>

<form method="GET" action={{route('employeeAttendance')}}>

    {{-- @csrf --}}

    <div class="row  my-4" style="margin-left: 100px;">
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
            <button type="submit" class="btn btn-primary">Search</button>
            <button type="button" onclick="printDiv()" class="btn btn-success mx-3">Print</button>
        </div>
    </div>
</form>

<div id="printArea">
    <div class="d-flex justify-content-center" style="overflow-x:auto;">

<table  style="margin-left: 100px;" class="table my-3 rounded shadow">
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

        @if ($attendance->count() > 0)

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


        @else

        <td>
            <h4>No Data Found!</h4>
        </td>


    @endif

        </tbody>

  </table>
  {{$attendance->links()}}
</div>


  <script type="text/javascript">
    function printDiv() {
        var printContents = document.getElementById("printArea").innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }

</script>

@endsection

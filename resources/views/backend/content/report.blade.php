@extends('backend.partial.adminMaster')


@section('contents')

    <h2 class="m-4 text-center text-decoration-underline">Employee Attendance Report</h2>

    <form action={{ route('report') }} method="GET">

        {{-- @csrf --}}

        <div class="row">
            <div class="col-md-8">
                <div class=" row">
                    <div class="col-md-4">
                        <label for="from">Name:</label>
                        <input id="from" type="text" class="form-control" name="name" placeholder="Enter employee name" required>
                    </div>

                    <div class="col-md-4">
                        <label for="from">Date From:</label>
                        <input id="from" type="date" class="form-control" name="from_date" required>
                    </div>

                    <div class="col-md-4">
                        <label for="to">Date To:</label>
                        <input id="to" type="date" class="form-control" name="to_date" required>
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

                @if ($attendance->count() > 0)

                    @foreach ($attendance as $key => $request)

                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $request->attendanceUser->name }}</td>
                            <td>{{ $request->attendanceUser->email }}</td>
                            <td>{{ $request->in_time }}</td>
                            <td>{{ $request->out_time }}</td>
                        </tr>
                    @endforeach


                @else

                <td colspan="5" class="text-center">
                    <h4>No Data Found!</h4>
                </td>



                @endif
            </tbody>

        </table>
        </div>
    </div>
    {{$attendance->links()}}

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

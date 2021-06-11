@extends('backend.partial.adminMaster')


@section('contents')

<h2 class="mt-3 text-center text-decoration-underline">Employee Attendance Record</h2>

<form action={{ route('attendanceRecord') }} method="GET">

    <div class="row d-flex mb-4">
        <div class="col-md-6">

        </div>
   <div class="col-md-3"></div>
        <div class="col-md-3 mt-4">


               <div class="form-group d-flex">
                   <input type="text" name="name" placeholder="Enter employee name" class="form-control">
                   <button class="btn btn-primary position-right mx-2">Search</button>
               </div>


       </div>
    </div>
</form>

<div style="overflow-x:auto;">

<table class="table my-4 rounded shadow " style="margin-right: 200px;">
    <thead>
      <tr>
        <th class="py-4" scope="col">#</th>
        <th class="py-4" scope="col">Employee_Name</th>
        <th class="py-4" scope="col">Logged_In_Email</th>
        <th class="py-4" scope="col">Entry_Time</th>
        <th class="py-4" scope="col">Out_Time</th>
        <th class="py-4" scope="col">Delay</th>
        <th class="py-4" scope="col">Working_Hours</th>
        <th class="py-4" scope="col">Over_Time</th>
         <th class="py-4" scope="col">Status</th>
      </tr>
    </thead>
    <tbody>

        @if ($attendance->count() > 0)

        @foreach($attendance as $key=> $request)

        <tr>
            <th scope="row">{{ $key+1}}</th>
            <td>{{ $request->attendanceUser->name}}</td>
            <td>{{ $request->attendanceUser->email}}</td>
            <td>{{ $request->in_time}}</td>
            <td>{{ $request->out_time}}</td>
            <td>{{ $request->delay}}</td>
            <td>{{$request->working_hours}}</td>
            <td>{{ $request->over_time}}</td>
            <td>{{ $request->check_status}}</td>
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

  {{$attendance->links()}}


@endsection



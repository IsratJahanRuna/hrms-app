@extends('backend.partial.adminMaster')

@section('contents')


<h2 class="mt-3 text-center text-decoration-underline">Leave Record</h2>

<form action="{{ route('LeaveManage') }}" method="GET">

    <div class="row d-flex mb-4">
        <div class="col-md-6">

        </div>
   <div class="col-md-3"></div>
        <div class="col-md-3 mt-3">


               <div class="form-group d-flex">
                   <input type="text" name="name" placeholder="Enter employee name" class="form-control">
                   <button class="btn btn-primary position-right mx-1">Search</button>
                   <button type="button" onclick="printDiv()" class="btn btn-success mx-1">Print</button>
               </div>


       </div>
    </div>
</form>
<div id="printArea">

<div style="overflow-x:auto;">
<table class="table my-4 rounded shadow table-bordered" style="margin-right: 200px;">
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
         <th class="py-4" scope="col">Total</th>
        <th class="py-4" scope="col">Reason</th>
        <th class="py-4" scope="col">About</th>
      </tr>
    </thead>
    <tbody>

        @if ($notifications->count() > 0)


        @foreach($notifications as $key=>$request)

        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$request->employeeDetail->name}}</td>
            <td>{{$request->employeeDetail->email}}</td>
            <td>{{$request->department}}</td>
            <td>{{$request->type}}</td>
            {{-- <td>{{$request->from}}</td>
            <td>{{$request->to}}</td> --}}
            <td>{{$request->from}}</td>
            <td>{{$request->to}}</td>
            <td>{{$request->status}}</td>
            <td>{{$request->total}}</td>
            <td>{{$request->reason}}</td>
            <td>{{$request->about}}</td>


        </tr>
        @endforeach

        @else

        <td colspan="10" class="text-center">
            <h4>No Data Found!</h4>
        </td>



    @endif
        </tbody>

  </table>
</div>
</div>

  {{$notifications->links()}}


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

@extends('backend.partial.adminMaster')


@section('contents')


<form class="container w-50 " style="margin-top:150px" >
    {{-- method="post" action="{{route('departmentUpdate', $user->id)}}" --}}

    @csrf

<div class="modal-body">
    <div class="form-group">
        <label for="exampleInputName">From</label>
        <input name="from" type="date" value="{{$application->from}}" class="form-control" id="exampleInputName" placeholder="Enter Employee Name" required>

    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">To</label>
        <input name="to" type="date" value="{{$application->to}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Employee Email Address" >

    </div>




</div>
<div class="modal-footer">
  {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
  <button type="submit" class="btn btn-info m-auto text-light" style="margin-right: 385px;">Accept</button>
</div>

</form>
@endsection

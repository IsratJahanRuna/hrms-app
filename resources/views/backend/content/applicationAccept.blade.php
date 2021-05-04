@extends('backend.partial.adminMaster')


@section('contents')


<form action="{{route('declineApplication',$notifications->id)}}" method="post" class="container w-50 " style="margin-top:150px">

    @csrf

    <input type="hidden" name="user_id" value="{{$user_id}}">

<div class="modal-body">
    <div class="form-group">
        <label for="exampleInputName">From_Date</label>
        <input name="accept_from" type="date"  class="form-control" value="{{$notifications->from}}" id="exampleInputName" placeholder="Enter Employee Name" required>

    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">To_Date</label>
        <input name="accept_to" type="date" class="form-control" value="{{$notifications->to}}" id="exampleInputEmail1" placeholder="Enter Employee Email Address" >

    </div>



</div>
<div class="modal-footer">
  {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
  <button type="submit" class="btn btn-info m-auto text-light" style="margin-right: 385px;">Accept</button>
</div>

</form>
@endsection

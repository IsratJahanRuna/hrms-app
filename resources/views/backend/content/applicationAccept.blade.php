@extends('backend.partial.adminMaster')


@section('contents')


<form class="container w-50 " style="margin-top:150px">

    @csrf

<div class="modal-body">
    <div class="form-group">
        <label for="exampleInputName">From_Date</label>
        <input name="form" type="date" class="form-control" value="{{$notifications->from}}" id="exampleInputName" placeholder="Enter Employee Name" required>

    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">To_Date</label>
        <input name="to" type="date" class="form-control" value="{{$notifications->to}}" id="exampleInputEmail1" placeholder="Enter Employee Email Address" >

    </div>



</div>
<div class="modal-footer">
  {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
  <button type="submit" class="btn btn-info m-auto text-light" style="margin-right: 385px;">Accept</button>
</div>

</form>
@endsection

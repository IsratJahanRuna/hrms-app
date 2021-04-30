@extends('backend.partial.adminMaster')


@section('contents')


<form action="{{route('declineApplication',$notifications->id)}}" method="post" class="container w-50 " style="margin-top:150px">

    @csrf

<div class="modal-body">
    <div class="form-group">
        <label for="exampleInputName">Decline_Reason</label>
        <input name="reason" type="date" class="form-control"  id="exampleInputName" placeholder="Enter Employee Name" required>

    </div>





</div>
<div class="modal-footer">
  {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
  <button type="submit" class="btn btn-info m-auto text-light" style="margin-right: 385px;">Accept</button>
</div>

</form>
@endsection

@extends('backend.partial.adminMaster')


@section('contents')


<form class="container w-50 " style="margin-top:150px" method="post" action="{{route('salaryUpdate', $employee->id)}}">

    @csrf

<div class="modal-body">
    <div class="form-group">
        <label for="exampleInputName">Designation</label>
        <input name="designation" type="text" value="{{$user->designation}}" class="form-control" id="exampleInputName" placeholder="Enter Designation" required>

    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Status</label>
        <input name="status" type="text" value="{{$user->status}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Employee Status" >

    </div>



</div>
<div class="modal-footer">
  {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
  <button type="submit" class="btn btn-info m-auto text-light" style="margin-right: 385px;">Update</button>
</div>

</form>
@endsection

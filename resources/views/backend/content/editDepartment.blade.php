@extends('backend.partial.adminMaster')


@section('contents')


<form class="container w-50 " style="margin-top:150px" method="post" action="{{route('departmentUpdate', $user->id)}}">

    @csrf

<div class="modal-body">
    {{-- <div class="form-group">
        <label for="exampleInputName">Department</label>
        <input name="department" type="text" value="{{$user->department}}" class="form-control" id="exampleInputName" placeholder="Enter Employee Name" required>

    </div>  --}}

    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input name="email" type="email" value="{{$user->email}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Department Email Address" >

    </div>
    <div class="form-group">
        <label for="exampleInputPhone">Contact No.</label>
        <input name="contact" type="text" value="{{$user->contact}}" class="form-control" id="exampleInputPhone" placeholder="Enter Department Phone Number">

    </div>



</div>
<div class="modal-footer">
    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
    <button type="submit" class="btn btn-info m-auto text-light" style="margin-right: 385px;">Update</button>
  </div>

</form>
@endsection

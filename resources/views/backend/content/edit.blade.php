@extends('backend.partial.adminMaster')


@section('contents')


<form class="container w-50 my-5" method="post" action="{{route('employeeUpdate', $user->id)}}">

    @csrf

<div class="modal-body">
    <div class="form-group">
        <label for="exampleInputName">Name</label>
        <input name="name" type="text" value="{{$user->employeeDetail->name}}" class="form-control" id="exampleInputName" placeholder="Enter Employee Name" required>

    </div>
    {{-- <div class="form-group">
        <label for="exampleInputName">Department</label>
        <input name="department" type="text" value="{{$user->department->department}}" class="form-control" id="exampleInputName" placeholder="Enter Department" required>

    </div> --}}
    <div class="form-group">
        <label for="exampleInputName">Designation</label>
        <input name="designation" type="text" value="{{$user->designation}}" class="form-control" id="exampleInputName" placeholder="Enter Department" required>

    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input name="email" type="email" value="{{$user->employeeDetail->email}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Employee Email Address" >

    </div>
    <div class="form-group">
        <label for="exampleInputPhone">Contact No.</label>
        <input name="contact" type="text" value="{{$user->contact}}" class="form-control" id="exampleInputPhone" placeholder="Enter Employee Phone Number">

    </div>

<div class="form-group">
    <label for="exampleInputAddress">Address</label>
    <input name="address" type="text" value="{{$user->address}}" class="form-control" id="exampleInputAddress" placeholder="Enter Employee Address">

</div>
<div class="form-group">
    <label for="exampleInputAddress">Status</label>
    <input name="status" type="text" value="{{$user->status}}" class="form-control" id="exampleInputAddress" placeholder="Enter Employee Status">

</div>
    {{-- <div class="form-group">
        <label for="exampleInputPassword">Password</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword" placeholder="Enter Employee Password" required>

    </div> --}}
    {{-- <div class="form-group">
        <label for="exampleInputRePicture">Upload Picture</label>
        <input name="picture" type="file" class="form-control" id="exampleInputRePicture" placeholder="Enter Employee Password Again" >

    </div> --}}

</div>
<div class="modal-footer">
  {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
  <button type="submit" class="btn btn-info m-auto text-light" style="margin-right: 385px;">Update</button>
</div>

</form>
@endsection

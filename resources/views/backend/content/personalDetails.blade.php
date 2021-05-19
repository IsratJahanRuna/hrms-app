{{-- Employee Details table --}}
{{-- <table class="table my-3 " style="margin-right: 200px;">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Picture</th>
        <th scope="col">Name</th>
        <th scope="col">Account No.</th>
        <th scope="col">Department</th>
        <th scope="col">Designation</th>
        <th scope="col">Email</th>
        <th scope="col">Contact No.</th>
        <th scope="col">Address</th>
      </tr>
    </thead>

    <tbody>

      <tr>
        <th scope="row">1</th>
        <td><img src="{{url('/files/photo/'.$employee->file)}}" style="width:70px; height:60px;" ></td>
        <td> {{$employee->employeeDetail->name}}</td>
        <td>dssf </td>
        <td> {{$employee->department->department}}</td>
        <td> {{$employee->designation->designation}}</td>
        <td> {{$employee->employeeDetail->email}}</td>
        <td> {{$employee->contact}}</td>
        <td> {{$employee->address}}</td>

      </tr>

    </tbody>
  </table> --}}
@extends('backend.partial.adminMaster')

@section('contents')




    {{-- <div class="col-12 col-md-6">
        <div class="form-group">
            <label>Blood Group</label>
            <select class="form-control select" name="blood_group">
                <option>A-</option>
                <option>A+</option>
                <option>B-</option>
                <option>B+</option>
                <option>AB-</option>
                <option>AB+</option>
                <option>O-</option>
                <option>O+</option>
            </select>
        </div>
    </div> --}}
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label>Email ID</label>
            <input type="email" name="email" class="form-control" ">
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="form-group">
            <label>Mobile</label>
            <input type="text" name="phone"  class="form-control">
        </div>
    </div>
    {{-- @dd($patient->patient) --}}
    <div class="col-12">
        <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" class="form-control" ">
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label>Gender</label>
            <input type="text" name="gender" class="form-control" ">
        </div>
    </div>

    <div class="submit-section">
        <a href=""></a>
        <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
    </div>
    </form>
    <!-- /Profile Settings Form -->



@endsection

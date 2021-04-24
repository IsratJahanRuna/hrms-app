@extends('backend.partial.adminMaster')

@section('contents')


 <!-- Button trigger modal -->
 <button type="button" class="btn btn-primary mt-5 mx-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Add Department
  </button>



{{-- Employee Details table --}}
<table class="table my-3 " style="margin-right: 200px;">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Department</th>
        <th scope="col">Designations</th>
        <th scope="col">Email</th>
        <th scope="col">Contact No.</th>
        <th scope="col">Edit/Delete</th>
      </tr>
    </thead>
    <tbody>
        @foreach($departments as $key=>$request)

        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$request->department}}</td>
            <td>{{$request->designation}}</td>
            <td>{{$request->email}}</td>
            <td>{{$request->contact}}</td>
            <td>
                <button type="button" class="btn btn-info text-white">Edit</button>
                <a class="btn btn-danger" href="{{route('employeeDelete', $request->id)}}"> Delete</a>

            </td>
        </tr>
        @endforeach
        </tbody>

  </table>


  {{-- {{$departments->links()}} --}}







  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add Department</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form method="post" action={{route('departmentCreate')}}>

            @csrf

        <div class="modal-body">
            <div class="form-group">
                <label for="exampleInputDepartment">Department</label>
                <input name="department" type="text" class="form-control" id="exampleInputDepartment" placeholder="Enter Department Name">

            </div>
            {{-- <div class="form-group">
                <label for="exampleInputDesignation">Designation</label>
                <input name="designation" type="text" class="form-control" id="exampleInputDesignation" placeholder="Enter Designation">

            </div> --}}
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Department Email Address">

            </div>
            <div class="form-group">
                <label for="exampleInputPhone">Contact No.</label>
                <input name="contact" type="text" class="form-control" id="exampleInputPhone" placeholder="Enter Department Phone Number">

            </div>
        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
          <button type="submit" class="btn btn-primary" style="margin-right: 220px;">Add</button>
        </div>

    </form>

      </div>
    </div>
  </div>



@endsection

@extends('backend.partial.adminMaster')

@section('contents')

<h2 class="mt-3 text-center text-decoration-underline">Department Manage</h2>
 <!-- Button trigger modal -->
 <button type="button" class="btn btn-primary mt-3 mb-1 mx-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Add Department
  </button>

  @if(session()->has('success'))

  <div class="alert alert-success mt-4 d-flex justify-content-between">
        {{session()->get('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

  </div>
  @endif
  @if ($errors->any())
  @foreach ($errors->all() as $error)
      <div class="alert alert-danger mt-4 d-flex justify-content-between">{{$error}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

      </div>
  @endforeach
@endif

<div style="overflow-x:auto;">
{{-- Employee Details table --}}
<table class="table my-4 rounded shadow table-bordered" style="margin-right: 200px;">
    <thead>
      <tr>
        <th class="py-4" scope="col">#</th>
        <th class="py-4" scope="col">Department</th>
        <th class="py-4" scope="col">Email</th>
        <th class="py-4" scope="col">Contact No.</th>
        <th class="py-4" scope="col">Edit</th>
      </tr>
    </thead>
    <tbody>
        @foreach($departments as $key=>$request)

        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$request->department}}</td>
            <td>{{$request->email}}</td>
            <td>{{$request->contact}}</td>
            <td>
                <a class="btn btn-info text-light" href="{{route('departmentEdit', $request->id)}}"><i class="fas fa-edit"></i></a>


            </td>
        </tr>
        @endforeach
        </tbody>

  </table>
</div>


  {{$departments->links()}}







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
                <input name="department" type="text" class="form-control" id="exampleInputDepartment" placeholder="Enter Department Name" required>

            </div>
            {{-- <div class="form-group">
                <label for="exampleInputDesignation">Designation</label>
                <input name="designation" type="text" class="form-control" id="exampleInputDesignation" placeholder="Enter Designation">

            </div> --}}
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Department Email Address" required>

            </div>
            <div class="form-group">
                <label for="exampleInputPhone">Contact No.</label>
                <input name="contact" type="text" class="form-control" id="exampleInputPhone" placeholder="Enter Department Phone Number" required>

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

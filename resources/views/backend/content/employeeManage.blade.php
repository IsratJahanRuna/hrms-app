@extends('backend.partial.adminMaster')

@section('contents')


 <!-- Button trigger modal -->
 <button type="button" class="btn mt-5 mx-3 text-white fw-bold" style="background-color: rgb(40, 48, 119); height:50px;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Register New Employee
  </button>
  <div>
    <form action="{{route('employees.search')}}" method="get">

        <div class="form-group">
            <input type="text" name="search" placeholder="Enter employee id" class="form-control">
            <button class="btn btn-primary position-right">Search</button>
        </div>

    </form>
</div>
@if(isset($search))
<p>
<span class="alert alert-success"> you are searching for '{{$search}}' , found ({{count($employees)}})</span>
</p>
@endif

  @if(session()->has('success'))

  <div class="alert alert-success mt-4">
        {{session()->get('success')}}
  </div>
  @endif

  @if ($errors->any())
     @foreach ($errors->all() as $error)
         <div class="alert alert-danger">{{$error}}</div>
     @endforeach
 @endif

{{-- Employee Details table --}}
<table class="table my-3 " style="margin-right: 200px;">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Picture</th>
        <th scope="col">Name</th>
        <th scope="col">Employee_Id</th>
        <th scope="col">Department</th>
        <th scope="col">Designation</th>
        <th scope="col">Email</th>
        <th scope="col">Contact No.</th>
        <th scope="col">Address</th>
        <th scope="col">Status</th>
        <th scope="col">Edit/Delete</th>
      </tr>
    </thead>
    <tbody>
        @foreach($employees as $key=>$request)

        <tr>
            <th scope="row">{{$key+1}}</th>
            <td><img src="{{url('/files/photo/'.$request->file)}}" style="width:70px; height:60px;" ></td>
            <td>{{$request->employeeDetail->name}}</td>
            <td>{{$request->employee_id}}</td>
            <td>{{$request->department->department}}</td>
            <td>{{$request->designation->designation}}</td>
            <td>{{$request->employeeDetail->email}}</td>
            <td>{{$request->contact}}</td>
            <td>{{$request->address}}</td>
            <td>{{$request->status}}</td>
            <td>
                <a class="btn btn-info text-light" href="{{route('employeeEdit', $request->id)}}">Edit</a>
                <a class="btn btn-danger" href="{{route('employeeDelete', $request->id)}}"> Delete</a>

            </td>
        </tr>
        @endforeach
        </tbody>
    {{-- <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        <td>@mdo</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td colspan="2">Larry the Bird</td>
        <td>@twitter</td>
      </tr>
    </tbody> --}}
  </table>

  {{$employees->links()}}





  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">

          <h5 class="modal-title" id="staticBackdropLabel">Employee Register</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form method="post" action={{route('employeeCreate')}} enctype="multipart/form-data">

            @csrf

        <div class="modal-body">
            <div class="form-group">
                <label for="exampleInputName">Name</label>
                <input name="name" type="text" class="form-control" id="exampleInputName" placeholder="Enter Employee Name" required>

            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputName">Employee_ID</label>
                    <input name="employee_id" type="text" class="form-control" id="exampleInputName" placeholder="Enter Employee Name" required>

                </div>
            <div class="form-group">
                <label for="exampleInputName">Department</label>
                <select class="form-select" name="department_id" required>
                    <option selected>Select Department</option>
                    @foreach ($departments as $request)
                        <option value="{{ $request->id }}">{{ $request->department }}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group">
                <label for="exampleInputName">Designation</label>
                <select class="form-select" name="designation_id" required>
                    <option selected>Select Department</option>
                    @foreach ($designations as $request)
                        <option value="{{ $request->id }}">{{ $request->designation}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Employee Email Address" required>

            </div>
            <div class="form-group">
                <label for="exampleInputPhone">Contact No.</label>
                <input name="contact" type="text" class="form-control" id="exampleInputPhone" placeholder="Enter Employee Phone Number" required>

            </div>

        <div class="form-group">
            <label for="exampleInputAddress">Address</label>
            <input name="address" type="text" class="form-control" id="exampleInputAddress" placeholder="Enter Employee Address" required>

        </div>
            {{-- <div class="form-group">
                <label for="exampleInputPassword">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword" placeholder="Enter Employee Password" required>

            </div> --}}
            <div class="form-group">
                <label for="exampleInputRePicture">Upload Picture</label>
                <input name="picture" type="file" class="form-control" id="exampleInputRePicture" placeholder="Enter Employee Password Again" required>

            </div>

        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
          <button type="submit" class="btn btn-primary" style="margin-right: 385px;">Register</button>
        </div>

    </form>

      </div>
    </div>
  </div>



@endsection

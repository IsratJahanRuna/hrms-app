@extends('backend.partial.adminMaster')

@section('contents')

<h2 class="mt-3 text-center text-decoration-underline">Employee Manage</h2>

 <div class="row d-flex mb-4">
     <div class="col-md-6">
        <!-- Button trigger modal -->
 <button type="button" class="btn mt-3 mx-3 text-white fw-bold bg-primary" style=" height:50px;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Register New Employee
  </button>
     </div>
<div class="col-md-3"></div>
     <div class="col-md-3 mt-4">
        <form action="{{route('employees.search')}}" method="get">

            <div class="form-group d-flex">
                <input type="text" name="search" placeholder="Enter employee id" class="form-control">
                <button class="btn btn-primary position-right mx-2">Search</button>
            </div>

        </form>
    </div>
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
  @if(session()->has('message'))

  <div class="alert alert-danger mt-4">
        {{session()->get('message')}}
  </div>
  @endif

  @if ($errors->any())
     @foreach ($errors->all() as $error)
         <div class="alert alert-danger">{{$error}}</div>
     @endforeach
 @endif

{{-- Employee Details table --}}
<table class="table my-3 rounded shadow mb-4" style="margin-right: 200px;">
    <thead>
      <tr >
        <th class="py-4" scope="col">#</th>
        <th class="py-4" scope="col">Picture</th>
        <th class="py-4" scope="col">Name</th>
        <th class="py-4" scope="col">Employee_Id</th>
        <th class="py-4" scope="col">Gender</th>
        <th class="py-4" scope="col">Department</th>
        <th class="py-4" scope="col">Designation</th>
        <th class="py-4" scope="col">Email</th>
        <th class="py-4" scope="col">Contact No.</th>
        <th class="py-4" scope="col">Address</th>
        <th class="py-4" scope="col">Status</th>
        <th class="py-4" scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($employees as $key=>$request)

        <tr>
            <th scope="row">{{$key+1}}</th>
            <td><img src="{{url('/files/photo/'.$request->file)}}" style="width:70px; height:60px;" ></td>
            <td>{{$request->employeeDetail->name}}</td>
            <td>{{$request->employee_id}}</td>
            <td>{{$request->gender}}</td>
            <td>{{$request->department->department}}</td>
            <td>{{$request->designation->designation}}</td>
            <td>{{$request->employeeDetail->email}}</td>
            <td>{{$request->contact}}</td>
            <td>{{$request->address}}</td>
            <td>{{$request->status}}</td>
            <td>
                <a class="btn btn-info text-light" href="{{route('employeeEdit', $request->id)}}"><i class="fas fa-user-edit"></i></a>


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
                <input name="name" type="text" class="form-control" id="exampleInputName" placeholder="Ex: Israt Jahan" required>

            </div>

                <div class="form-group">
                    <label for="exampleInputName">Employee_ID</label>
                    <input name="employee_id" type="text" class="form-control" id="exampleInputName" placeholder="Ex: 17203043" required>

                </div>

                    <div class="form-group">
                        <label for="exampleInputName">Gender</label>
                        <select class="form-select mb-3" type="text" name="gender" required>
                            <option selected value="">Select Gender</option>
                            <option >Male</option>
                            <option >Female</option>

                        </select>
                    </div>
            <div class="form-group">
                <label for="exampleInputName">Department</label>
                <select class="form-select" name="department_id" required>
                    <option selected  value="">Select Department</option>
                    @foreach ($departments as $request)
                        <option value="{{ $request->id }} ">{{ $request->department }}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group">
                <label for="exampleInputName">Designation</label>
                <select class="form-select" name="designation_id" required>
                    <option selected value="">Select Designation</option>
                    @foreach ($designations as $request)
                        <option value="{{ $request->id }}">{{ $request->designation}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Ex: R@gmail.com" required>

            </div>
            <div class="form-group">
                <label for="exampleInputPhone">Contact No.</label>
                <input name="contact" type="text" class="form-control" id="exampleInputPhone" placeholder="Ex: 017243*****" required>

            </div>

        <div class="form-group">
            <label for="exampleInputAddress">Address</label>
            <input name="address" type="text" class="form-control" id="exampleInputAddress" placeholder="Ex: Uttara, Dhaka" required>

        </div>
        <div class="form-group">
            <label for="exampleInputAddress">Salary</label>
            <input name="salary" type="decimal" class="form-control" id="exampleInputAddress" placeholder="Ex: 20,***" required>

        </div>
            {{-- <div class="form-group">
                <label for="exampleInputPassword">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword" placeholder="Enter Employee Password" required>

            </div> --}}
            <div class="form-group">
                <label for="exampleInputRePicture">Upload Picture</label>
                <input name="picture" type="file" class="form-control" id="exampleInputRePicture"  required>

            </div>

        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
          <button type="submit" class="btn btn-primary" style="margin-right: 385px;">Register</button>
        </div>
    </div>
    </form>

      </div>
    </div>
  </div>




@endsection

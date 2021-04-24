@extends('backend.partial.employeeMaster')

@section('contents')




{{-- Employee Details table --}}
<table class="table my-3 " style="margin-right: 200px;">
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
    {{-- <tbody>
        @foreach($employees as $key=>$request)

        <tr>
            <th scope="row">{{$key+1}}</th>
            <td><img src="{{url('/files/photo/'.$request->file)}}" style="width:70px; height:60px;" ></td>
            <td>{{$request->name}}</td>
            <td>{{$request->department->department}}</td>
            <td>{{$request->designation}}</td>
            <td>{{$request->email}}</td>
            <td>{{$request->contact}}</td>
            <td>{{$request->address}}</td>
            <td>...</td>
            <td>
                <button type="button" class="btn btn-info text-white">Edit</button>
                <a class="btn btn-danger" href="{{route('employeeDelete', $request->id)}}"> Delete</a>

            </td>
        </tr>
        @endforeach
        </tbody> --}}
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        <td>@mdo</td>
        <td>@mdo</td>
        <td>@mdo</td>
        <td>@mdo</td>
        <td>@mdo</td>
      </tr>
    </tbody>
  </table>









@endsection

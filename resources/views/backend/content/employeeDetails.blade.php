{{-- @extends('backend.partial.Master')

@section('content')







<table class="table my-3 " style="margin-right: 200px;">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Picture</th>
        <th scope="col">Name</th>
        <th scope="col">Department</th>

        <th scope="col">Email</th>
        <th scope="col">Contact No.</th>

      </tr>
    </thead>
    <tbody>
        @foreach($employees as $key=>$request)

        <tr>
            <th scope="row">{{$key+1}}</th>
            <td><img src="{{url('/files/photo/'.$request->file)}}" style="width:70px; height:60px;" ></td>
            <td>{{$request->name}}</td>
            <td>{{$request->department->department}}</td>

            <td>{{$request->email}}</td>
            <td>{{$request->contact}}</td>

        </tr>
        @endforeach
        </tbody>

  </table>

  @endsection --}}

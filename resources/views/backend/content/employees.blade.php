@extends('backend.partial.employeeMaster')

@section('contents')

    <h2 class="mt-3 text-center text-decoration-underline">All Employees</h2>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-3"></div>
    <div class="col-md-3"></div>
     <div class="col-md-3 mt-4">
        <form action="{{route('employee.search')}}" method="get">

            <div class="form-group d-flex">
                <input type="text" name="search" placeholder="Enter employee id" class="form-control">
                <button class="btn btn-primary position-right mx-2">Search</button>
            </div>

        </form>
    </div>
 </div>

@if(isset($search))
<p>
<span class="alert alert-success mx-5"> you are searching for '{{$search}}' , found ({{count($employees)}})</span>
</p>
@endif

<div style="overflow-x:auto;">
    {{-- Employee Details table --}}
    <table class="table my-4 mx-5 rounded shadow">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Picture</th>
                <th scope="col">Name</th>
                <th scope="col">Employee_Id</th>
                <th scope="col">Gender</th>
                <th scope="col">Department</th>
                <th scope="col">Designation</th>
                <th scope="col">Email</th>
                <th scope="col">Contact No.</th>
                <th scope="col">Address</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $key => $request)

                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td><img src="{{ url('/files/photo/' . $request->file) }}" style="width:70px; height:60px;"></td>
                    <td>{{ $request->employeeDetail->name }}</td>
                    <td>{{ $request->employee_id }}</td>
                    <td>{{ $request->gender }}</td>
                    <td>{{ $request->department->department }}</td>
                    <td>{{ $request->designation->designation }}</td>
                    <td>{{ $request->employeeDetail->email }}</td>
                    <td>{{ $request->contact }}</td>
                    <td>{{ $request->address }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>

    {{ $employees->links() }}

@endsection

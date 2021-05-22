@extends('backend.partial.employeeMaster')

@section('contents')

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

<form class="container w-50 mt-3 p-3 border " method="post" action="{{route('applicationCreate')}}">

    @csrf



    <div class="mb-2">
      <label for="exampleInputName1" class="form-label">Name</label>
      <input type="text" name="name" value="{{$application->employeeDetail->name}}" class="form-control" id="exampleInputName1" aria-describedby="nameHelp">
    </div>
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name="email" value="{{$application->employeeDetail->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      {{-- @dd($application) --}}
      <div class="mb-2">
        <label for="exampleInputDepartment" class="form-label">Department</label>
        <select class="form-select" name="department_id" required>
            <option value="{{$application->department->id }}" selected>{{$application->department->department}}</option>
            @foreach ($departments as $request)
                <option {{$application->department_id == $request->id ? 'selected': ''}} value="{{ $request->id }}">{{ $request->department }}</option>
            @endforeach
        </select>      </div>
      <div class="form-group">
        <label for="exampleInputName">Type</label>
        <select class="form-select mb-3" type="text" name="type" required>
            <option selected value="">Select Application type </option>
            {{-- <option >Leave</option> --}}
            <option value="Casual Leave" >Casual Leave ({{$application->total_casual_leave}})</option>
            <option value="Annual Leave">Annual Leave ({{$application->total_annual_leave}})</option>
            <option value="Sick Leave">Sick Leave ({{$application->total_sick_leave}})</option>
            {{-- @foreach ($designations as $request)
                <option value="{{ $request->id }}">{{ $request->designation}}</option>
            @endforeach --}}
        </select>
    </div>
    <div class="mb-2">
        <label for="exampleInputFrom" class="form-label">From</label>
        <input type="date" name="from" value="{{date('Y-m-d')}}" min="{{date('Y-m-d')}}" class="form-control" id="exampleInputFrom" aria-describedby="FromHelp" required>
      </div>
      <div class="mb-2">
        <label for="exampleInputTo" class="form-label">To</label>
        <input type="date" name="to" value="{{date('Y-m-d')}}" min="{{date('Y-m-d')}}" class="form-control" id="exampleInputTo" aria-describedby="ToHelp" required>
      </div>
      <div class="mb-3">
        <label for="exampleInputDepartment" class="form-label">Write Leave Description</label>
        <textarea type="text" name="about" class="form-control" id="exampleInputDepartment" aria-describedby="DepartmentHelp" required></textarea>
      </div>

    <button type="submit" class="btn btn-primary">Apply</button>
  </form>

@endsection

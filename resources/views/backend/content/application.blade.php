@extends('backend.partial.employeeMaster')

@section('contents')

<form class="container w-50 mt-3 p-3 border " method="post" action="{{route('applicationCreate')}}">

    @csrf

    <div class="mb-2">
      <label for="exampleInputName1" class="form-label">Name</label>
      <input type="text" name="name" class="form-control" id="exampleInputName1" aria-describedby="nameHelp">
    </div>
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-2">
        <label for="exampleInputDepartment" class="form-label">Department</label>
        <select class="form-select" name="department" required>
            <option selected>Select Department</option>
            @foreach ($departments as $request)
                <option value="{{ $request->deparment }}">{{ $request->department }}</option>
            @endforeach
        </select>      </div>
      <div class="form-group">
        <label for="exampleInputName">Type</label>
        <select class="form-select mb-3" type="text" name="type">
            <option selected>Select Application type </option>
            <option >Leave</option>
            <option >Business Leave</option>
            <option >Maternity Leave</option>
            <option >Other</option>
            {{-- @foreach ($designations as $request)
                <option value="{{ $request->id }}">{{ $request->designation}}</option>
            @endforeach --}}
        </select>
    </div>
    <div class="mb-2">
        <label for="exampleInputFrom" class="form-label">From</label>
        <input type="date" name="from"  class="form-control" id="exampleInputFrom" aria-describedby="FromHelp">
      </div>
      <div class="mb-2">
        <label for="exampleInputTo" class="form-label">To</label>
        <input type="date" name="to" class="form-control" id="exampleInputTo" aria-describedby="ToHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputDepartment" class="form-label">Write Leave Description</label>
        <textarea type="text" name="about" class="form-control" id="exampleInputDepartment" aria-describedby="DepartmentHelp">Write in brief</textarea>
      </div>

    <button type="submit" class="btn btn-primary">Apply</button>
  </form>

@endsection

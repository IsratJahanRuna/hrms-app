@extends('backend.partial.employeeMaster')

@section('contents')

<form class="container w-50 mt-3 p-3 border ">
    <div class="mb-2">
      <label for="exampleInputName1" class="form-label">Name</label>
      <input type="text" class="form-control" id="exampleInputName1" aria-describedby="nameHelp">
    </div>
    <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-2">
        <label for="exampleInputDepartment" class="form-label">Department</label>
        <input type="text" class="form-control" id="exampleInputDepartment" aria-describedby="DepartmentHelp">
      </div>
      <div class="form-group">
        <label for="exampleInputName">Type</label>
        <select class="form-select mb-3" name="type">
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
        <input type="date" class="form-control" id="exampleInputFrom" aria-describedby="FromHelp">
      </div>
      <div class="mb-2">
        <label for="exampleInputTo" class="form-label">To</label>
        <input type="date" class="form-control" id="exampleInputTo" aria-describedby="ToHelp">
      </div>
      <div class="mb-3">
        <label for="exampleInputDepartment" class="form-label">Write Leave Description</label>
        <textarea type="text" class="form-control" id="exampleInputDepartment" aria-describedby="DepartmentHelp">Write in brief</textarea>
      </div>

    <button type="submit" class="btn btn-primary">Apply</button>
  </form>

@endsection

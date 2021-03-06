@extends('backend.partial.adminMaster')

@section('contents')

<h2 class="mt-3 text-center text-decoration-underline">Holiday Setup</h2>
 <!-- Button trigger modal -->
 <button type="button" class="btn btn-primary mt-3 mb-1 mx-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Add Holiday
  </button>

  @if(session()->has('message'))

  <div class="alert alert-success mt-4 d-flex justify-content-between">
        {{session()->get('message')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

  </div>
  @endif

  @if ($errors->any())
  @foreach ($errors->all() as $error)
      <div class="alert alert-danger d-flex justify-content-between">{{$error}}
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
        <th class="py-4" scope="col">Title</th>
        <th class="py-4" scope="col">Date</th>
        <th class="py-4" scope="col">Day</th>
      </tr>
    </thead>
    <tbody>
        @foreach($holidays as $key=>$request)

        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$request->title}}</td>
            <td>{{$request->date}}</td>
            <td>{{$request->day}}</td>

        </tr>
        @endforeach
        </tbody>

  </table>
</div>


  {{$holidays->links()}}







  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add Holiday</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form  method="post" action={{route('holidayCreate')}}>


            @csrf

        <div class="modal-body">
            <div class="form-group">
                <label for="exampleInputDepartment">Title</label>
                <input name="title" type="text" class="form-control" id="exampleInputDepartment" placeholder="Enter Holiday Title" required>

            </div>
            {{-- <div class="form-group">
                <label for="exampleInputDesignation">Designation</label>
                <input name="designation" type="text" class="form-control" id="exampleInputDesignation" placeholder="Enter Designation">

            </div> --}}
            <div class="form-group">
                <label for="exampleInputPhone">Date</label>
                <input name="date" type="date" class="form-control" id="exampleInputPhone"  required>

            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Day</label>
                <input name="day" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Day" required>

            </div>

        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
          <button type="submit" class="btn btn-primary" style="margin-right: 220px;" onclick="return confirm('Are you sure you want to add this holiday?')">Add</button>
        </div>

    </form>

      </div>
    </div>
  </div>



@endsection

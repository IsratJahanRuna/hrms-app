@extends('backend.partial.adminMaster')

@section('contents')


 <!-- Button trigger modal -->
 <button type="button" class="btn btn-primary mt-5 mx-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Add Salary
  </button>



{{-- Employee Details table --}}
<table class="table my-3 " style="margin-right: 200px;">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Employment Type</th>
        <th scope="col">Amount</th>
        <th scope="col">Month</th>
        <th scope="col">Bonus</th>
        <th scope="col">Edit</th>
      </tr>
    </thead>
    <tbody>
         @foreach($salaries as $key=>$request)

        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$request->employment}}</td>
            <td>{{$request->amount}}</td>
            <td>{{$request->month}}</td>
            <td>{{$request->bonus}}</td>
            <td>
                <button type="button" class="btn btn-info text-white">Edit</button>


            </td>
        </tr>
        @endforeach
        </tbody>

  </table>


  {{-- {{$departments->links()}} --}}







  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add Salary</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form method="post" action="{{route('salaryCreate')}}">

            @csrf

        <div class="modal-body">
            <div class="form-group">
                <label for="exampleInputDepartment">Employment Type</label>
                <input name="employment" type="text" class="form-control" id="exampleInputDepartment" placeholder="Enter Department Name">

            </div>
            {{-- <div class="form-group">
                <label for="exampleInputDesignation">Designation</label>
                <input name="designation" type="text" class="form-control" id="exampleInputDesignation" placeholder="Enter Designation">

            </div> --}}
            <div class="form-group">
                <label for="exampleInputEmail1">Amount</label>
                <input name="amount" type="decimal" class="form-control" id="exampleInputEmail1" placeholder="Enter Department Email Address">

            </div>
            <div class="form-group">
                <label for="exampleInputPhone">Month</label>
                <input name="month" type="month" class="form-control" id="exampleInputPhone" placeholder="Enter Department Phone Number">

            </div>
            <div class="form-group">
                <label for="exampleInputPhone">Bonus</label>
                <input name="bonus" type="decimal" class="form-control" id="exampleInputPhone" placeholder="Enter Department Phone Number">

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

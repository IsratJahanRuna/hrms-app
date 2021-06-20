@extends('backend.partial.employeeMaster')

@section('contents')

<h2 class="mt-5 text-center text-decoration-underline mb-5">Account Details</h2>



  @if(session()->has('success'))

  <div class="alert alert-success mt-4 d-flex justify-content-between">
        {{session()->get('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

  </div>
  @endif
  @if(session()->has('error'))

  <div class="alert alert-danger mt-4 d-flex justify-content-between">
        {{session()->get('error')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

  </div>
  @endif


  <div class="d-flex justify-content-center" style="overflow-x:auto;">

{{-- Employee Details table --}}
<table class="table my-3 rounded shadow table-bordered" style="margin-left: 100px;">
    <thead>
      <tr>
        <th class="py-4" scope="col">#</th>
        <th class="py-4" scope="col">Amount</th>
        <th class="py-4" scope="col">Month</th>
        <th class="py-4" scope="col">Bonus</th>
        <th class="py-4" scope="col">Total</th>

      </tr>
    </thead>
    <tbody>
        {{-- @dd($salaries) --}}
         @foreach($salaries as $key=>$request)


        <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$request->amount}}</td>
            <td>{{$request->month}}</td>
            <td>{{$request->bonus}}</td>
            <td>{{$request->bonus + $request->amount}}</td>

        </tr>
        @endforeach
        </tbody>

  </table>
  </div>
@endsection

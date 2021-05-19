@extends('backend.partial.adminMaster')

@section('contents')

<h2 class="mt-5 text-center text-decoration-underline mb-5">Account Details</h2>



  @if(session()->has('success'))

  <div class="alert alert-success mt-4">
        {{session()->get('success')}}
  </div>
  @endif
  @if(session()->has('error'))

  <div class="alert alert-danger mt-4">
        {{session()->get('error')}}
  </div>
  @endif




{{-- Employee Details table --}}
<table class="table my-3 rounded shadow" style="margin-right: 200px;">
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
@endsection

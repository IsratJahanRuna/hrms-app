@extends('backend.partial.master')


@section('content')

<div class="d-flex justify-content-center mt-5 ">
    <a href={{route('logIn')}}  class="btn btn-primary me-3 fs-3 ">Admin</a>
    <a href={{route('logIn')}} class="btn btn-primary me-3 fs-3 ">Employee</a>
</div>

@endsection

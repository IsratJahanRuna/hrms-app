<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>Document</title> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>

@include('backend.partial.header')

@if(session()->has('error'))
<div class="alert alert-danger">
      {{session()->get('error')}}
</div>
@endif
@if(session()->has('success'))
<div class="alert alert-success">
      {{session()->get('success')}}
</div>
@endif


<div class="row d-flex align-items-center">
    <div class="col-md-5 ">
        <img src="https://www.collegehippo.com/blog/wp-content/uploads/2020/09/human-resource-management-transparent-png-download-for-free-human-resource-management-png-920_582.jpg" class="img-fluid w-100 mx-5" alt="">
    </div>
    <div class="col-md-7">
        <form action={{route('authenticate')}} method="POST" class="container w-50 p-5 border shadow p-3 mb-5 rounded-3" style="background: linear-gradient(to right, #619fdd 0%, #a1d8f1 100%); margin-top:100px">


            @csrf
            @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        @endif
            @if(session()->has('loginError'))
            <div class="alert alert-danger">
                  {{session()->get('loginError')}}
            </div>
            @endif

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label fs-5 text-light"><b>Email</b></label>
              <input name="email" type="email" class="form-control" style="height: 50px" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Email Address">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label fs-5 text-light"><b>Password</b></label>
              <input name="password" type="password" class="form-control" style="height: 50px" id="exampleInputPassword1" placeholder="Type Your Password Here">
            </div>
            {{-- <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> --}}
            <button class="btn btn-primary fs-5"><b>Login</b></button>
          </form>
    </div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>

{{-- @endsection --}}

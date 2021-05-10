<nav class="navbar navbar-light d-flex  shadow p-2 mb-5 rounded" style="background: linear-gradient(to right, #77b4f1 0%,  #a1d8f1 100%)">

    <h5 class="text-light"><b> Bit-Map</b></h5>
    {{-- <form class="form-inline"> --}}
        <ul class="navbar-nav px-3">
     {{-- <a href={{route('signIn')}} class="btn btn-primary">Sign In</a> --}}
     <li class="nav-item text-nowrap">
        {{-- @auth()
            <span style="color:rgb(24, 23, 23);" data-feather="user"></span>
            <span style="color:rgb(24, 24, 24); margin-right: 30px;">  {{ auth()->user()->name }}</span>

            <a class="btn btn-danger" href="{{ route('logout') }}"> Logout</a>

        @else
            <a class="btn btn-success"  href="{{ route('logIn') }}">Login</a>


        @endauth --}}

       <!-- Button trigger modal -->

    <button type="button" class="btn btn-danger fs-6" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        <b>Attendance</b>
      </button>
</li>
</ul>
    {{-- </form> --}}
  </nav>




  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Employee Attendance</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form method="post" action={{route('attendance')}}>

@csrf

        <div class="modal-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Your Email Address">

            </div>
            <div class="form-group">
                <label for="exampleInputPassword">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputDescription" placeholder="Enter Your Password">

            </div>
        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
          <button type="submit" class="btn btn-danger">Submit</button>
        </div>

    </form>

      </div>
    </div>
  </div>



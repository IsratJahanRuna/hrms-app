<nav class="navbar navbar-light d-flex  shadow p-2 mb-5 rounded" style="background-color:rgb(187, 228, 241)">

    <h5><img style="width: 50px; height:40px" src="logo.png" alt=""><b> Bit-Map</b></h5>
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

    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Attendance
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

        <form >



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



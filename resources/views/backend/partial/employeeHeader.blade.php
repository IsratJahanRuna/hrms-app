<nav class="navbar navbar-light \ d-flex flex-row-reverse " style="background: linear-gradient(to right, #0c3c74 0%, #3399ff 100%);">
    <form class="form-inline">
        <ul class="nav flex-row">


              @auth()
              {{-- <span style="color:white; margin-top:50px;" data-feather="user"></span> --}}
            <div class="d-flex align-items-center">
              <div>
                  <span style="color:white; margin-right: 30px;" class="fw-bold">  {{ auth()->user()->name }}</span>
                 </div>
                 <div>
                  <a class="btn btn-danger nav-link fw-bold text-white" href="{{ route('logout') }}"> Logout</a>
                 </div>
            </div>


          @else
              <a class="btn btn-success nav-link"  href="{{ route('logIn') }}">Login</a>


          @endauth


    </form>
</ul>
</nav>

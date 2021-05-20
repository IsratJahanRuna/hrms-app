<nav class="navbar navbar-light \ d-flex flex-row-reverse " style="background: linear-gradient(to right, #0c3c74 0%, #3399ff 100%);">
    <form class="form-inline">
        <ul class="nav flex-row">
            {{-- <li class="nav-item">
              <a class="nav-link active" aria-current="page" href={{route('personalDetails')}}>
                <span data-feather="home"></span>
                Personal Details
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span ></span>
                Attendance Record
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href={{route('application')}}>
                <span ></span>
               Application
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span ></span>
                Leave Details
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span ></span>
                Account Details
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                  <span ></span>
                  Notification
                </a>
              </li> --}}
              <li class="nav-item text-nowrap">
                @auth()
                <div class="d-flex align-items-center">
                    <span  style="color:white;" data-feather="user"></span>
                    <span  style="color:white; margin-right: 30px;"> <b> {{ auth()->user()->name }}</b></span>
              </li>
              <li>

                    <a class="btn btn-danger nav-link me-2" style="color:white;" href="{{ route('logout') }}"> <b>Logout</b></a>

                @else
                    <a class="btn btn-success nav-link"  href="{{ route('logIn') }}">Login</a>

                </div>
                @endauth
              </li>
    </form>
</ul>
</nav>

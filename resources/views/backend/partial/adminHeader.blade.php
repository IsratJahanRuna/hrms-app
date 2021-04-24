<nav class="navbar navbar-light bg-light d-flex flex-row-reverse me-3">
    <form class="form-inline">
        <ul class="nav flex-row">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">
                  Dashboard
                </a>
              </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href={{route('employeeManage')}}>
                <span data-feather="home"></span>
                Employee Manage
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href={{route('departmentManage')}}>
                  <span ></span>
                  Department Manage
                </a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href={{route('attendanceRecord')}}>
                <span ></span>
                Attendance Record
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span ></span>
                Leave Manage
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                  <span ></span>
                  Notification
                </a>
              </li>

              <li class="nav-item text-nowrap">
                @auth()
                    <span style="color:white;" data-feather="user"></span>
                    <span style="color:white; margin-right: 30px;">  {{ auth()->user()->name }}</span>

                    <a class="btn btn-danger nav-link" href="{{ route('logout') }}"> Logout</a>

                @else
                    <a class="btn btn-success nav-link"  href="{{ route('logIn') }}">Login</a>


                @endauth
              </li>
    </form>
</ul>
</nav>

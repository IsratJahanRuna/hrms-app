<nav class="navbar navbar-light d-flex flex-row-reverse pe-3" style="background-color: rgb(34, 34, 121)">
    <form class="form-inline">
        <ul class="nav flex-row fw-bold fs-6 align-items-center">
            {{-- <li class="nav-item">
                <a class="nav-link active text-light" aria-current="page" href="/">
                  Dashboard
                </a>
              </li> --}}
            <li class="nav-item ">
              <a class="nav-link active text-light" aria-current="page" href={{route('employeeManage')}}>
                <span data-feather="home"></span>
                Employee Manage
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href={{route('departmentManage')}}>
                  <span ></span>
                  Department Manage
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href={{route('designationManage')}}>
                  <span ></span>
                  Designation Manage
                </a>
              </li>
            <li class="nav-item">
              <a class="nav-link text-light" href={{route('attendanceRecord')}}>
                <span ></span>
                Attendance Record
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="#">
                <span ></span>
                Leave Manage
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="{{route('salaryManage')}}">
                  <span ></span>
                  Salary Manage
                </a>
              </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="#">
                  <span class="badge badge-light">{{$application_count}}</span>
                  Notification
                </a>
              </li>

              <li class="nav-item text-nowrap">
                @auth()
                    {{-- <span style="color:white; margin-top:50px;" data-feather="user"></span> --}}
                    <span style="color:white; margin-right: 30px;">  {{ auth()->user()->name }}</span>
                </li>
                <li>
                    <a class="btn btn-danger nav-link fw-bold" href="{{ route('logout') }}"> Logout</a>

                @else
                    <a class="btn btn-success nav-link"  href="{{ route('logIn') }}">Login</a>


                @endauth
              </li>
    </form>
</ul>
</nav>

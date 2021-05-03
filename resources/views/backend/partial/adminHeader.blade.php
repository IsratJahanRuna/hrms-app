<nav class="navbar navbar-light d-flex flex-row-reverse pe-3" style="background-color: rgb(34, 34, 121)">
    <form class="form-inline">
{{--
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
              <a class="nav-link text-light" href={{route('LeaveManage')}}>
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
                <a class="nav-link text-light" href={{route('notification')}}>
                  <span class="badge badge-light">{{$application_count}}</span>
                  Notification
                </a>
              </li> --}}


                @auth()
                    {{-- <span style="color:white; margin-top:50px;" data-feather="user"></span> --}}
                  <div class="d-flex ">
                    <div>
                        <span style="color:white; margin-right: 30px;">  {{ auth()->user()->name }}</span>
                       </div>
                       <div>
                        <a class="btn btn-danger nav-link fw-bold" href="{{ route('logout') }}"> Logout</a>
                       </div>
                  </div>


                @else
                    <a class="btn btn-success nav-link"  href="{{ route('logIn') }}">Login</a>


                @endauth

    </form>
</ul>
</nav>

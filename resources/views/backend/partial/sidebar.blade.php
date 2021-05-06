{{-- <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse" style="background-color: rgb(34, 34, 121)">



    @if (auth()->user()->role == 'employee')
  <ul >
    <li class="nav-item" style="list-style: none" >
        <a class="nav-link text-light" aria-current="page" href={{route('personalDetails')}}>
          <span data-feather="home"></span>
          Personal Details
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link text-light" href="#">
          <span ></span>
          Attendance Record
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href={{route('application')}}>
          <span ></span>
         Application
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="#">
          <span ></span>
          Leave Details
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="#">
          <span ></span>
          Account Details
        </a>
      </li>
      <li class="nav-item">
          <a class="nav-link text-light"  href="#">
            <span ></span>
            Notification
          </a>
        </li>
  </ul>
    @else

        <ul>
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
                </li>
          @endif
        </ul>



</nav> --}}


<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse " style="background-color:rgb(10, 69, 136); height:670px">



    <div class="position-sticky pt-3">
      <ul class="nav flex-column fs-6">
        @if (auth()->user()->role == 'employee')
        <li class="nav-item " >
            <a class="nav-link text-light" aria-current="page" href={{route('personalDetails')}}>
              <span data-feather="home"></span>
              <i class="fas fa-user-alt"></i>
              Personal Details
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-light" href={{route('employeeAttendance')}}>
              <span ></span>
              Attendance Record
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-light" href={{route('application')}}>
              <span ></span>
             Application
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-light" href={{route('leaveDetails')}}>
              <span ></span>
              Leave Details
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-light" href={{route('accountDetails')}}>
              <span ></span>
              Account Details
            </a>
          </li>

            @else
            <li class="nav-item mb-2">
                <a class="nav-link active text-light" aria-current="page" href={{route('employeeManage')}}>
                  <span data-feather="home"> <i class="fas fa-user-alt"></i></span>

                  Employee Manage
                </a>
              </li>
              <li class="nav-item mb-2">
                  <a class="nav-link text-light" href={{route('departmentManage')}}>
                    <span ></span>
                    Department Manage
                  </a>
                </li>
                <li class="nav-item mb-2">
                  <a class="nav-link text-light" href={{route('designationManage')}}>
                    <span ></span>
                    Designation Manage
                  </a>
                </li>
              <li class="nav-item mb-2">
                <a class="nav-link text-light" href={{route('attendanceRecord')}}>
                  <span ></span>
                  Attendance Record
                </a>
              </li>
              <li class="nav-item mb-2">
                <a class="nav-link text-light" href={{route('LeaveManage')}}>
                  <span ></span>
                  Leave Manage
                </a>
              </li>
              <li class="nav-item mb-2">
                  <a class="nav-link text-light" href="{{route('salaryManage')}}">
                    <span ></span>
                    Salary Manage
                  </a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link text-light" href={{route('report')}}>
                     Report Generation
                    </a>
                  </li>
                  <li class="nav-item mb-2">
                    <a class="nav-link text-light" href={{route('holidaySetup')}}>
                    Holiday Setup
                    </a>
                  </li>
              <li class="nav-item">
                  <a class="nav-link text-light" href={{route('notification')}}>
                    <span class="badge badge-light">{{$application_count}}</span>
                    Notification
                  </a>
                </li>

                @endif

      </ul>


    </div>
  </nav>

@extends('backend.partial.adminMaster')

@section('contents')



{{-- <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"> --}}
    <div class="container-fluid ">
        <div class="row">
            <div class="row">
                <div class="col-xl-4 col-sm-6 col-12 mt-5 me-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon text-primary border-primary">
                                    <i class="fe fe-users"></i>
                                </span>
                                <div class="dash-count">
                                    <h3>{{$totalEmployee}}</h3>
                                    {{-- {{$doctor_count}} --}}
                                </div>
                            </div>
                            <div class="dash-widget-info">
                                <h6 class="text-muted">Employees</h6>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-primary w-50"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon text-info">
                                    <i class="fe fe-credit-card"></i>
                                </span>
                                <div class="dash-count">
                                    <h3>{{$totalDepartment}}</h3>
                                    {{-- {{$patient_count}} --}}
                                </div>
                            </div>
                            <div class="dash-widget-info">

                                <h6 class="text-muted">Departments</h6>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-info w-50"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-12 mt-5 me-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon text-success">
                                    <i class="fe fe-credit-card"></i>
                                </span>
                                <div class="dash-count">
                                    <h3> {{$totalAttendance}}</h3>
                                    {{-- {{$patient_count}} --}}
                                </div>
                            </div>
                            <div class="dash-widget-info">

                                <h6 class="text-muted">Attend Employees</h6>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-success w-50"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-12 mt-5 me-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon text-danger">
                                    <i class="fe fe-credit-card"></i>
                                </span>
                                <div class="dash-count">
                                    <h3> {{$totalEmployee - $totalAttendance + $totalLeave}}</h3>
                                    {{-- {{$patient_count}} --}}
                                </div>
                            </div>
                            <div class="dash-widget-info">

                                <h6 class="text-muted">Absent Employees</h6>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-danger w-50"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="dash-widget-header">
                                <span class="dash-widget-icon text-warning">
                                    <i class="fe fe-credit-card"></i>
                                </span>
                                <div class="dash-count">
                                    <h3> {{$totalLeave}}</h3>
                                    {{-- {{$patient_count}} --}}
                                </div>
                            </div>
                            <div class="dash-widget-info">

                                <h6 class="text-muted">In Leave</h6>
                                <div class="progress progress-sm">
                                    <div class="progress-bar bg-warning w-50"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
     @endsection

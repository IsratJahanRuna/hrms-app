




{{-- Employee Details table --}}
{{-- <table class="table my-3 " style="margin-right: 200px;">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Picture</th>
        <th scope="col">Name</th>
        <th scope="col">Account No.</th>
        <th scope="col">Department</th>
        <th scope="col">Designation</th>
        <th scope="col">Email</th>
        <th scope="col">Contact No.</th>
        <th scope="col">Address</th>
      </tr>
    </thead>

    <tbody>

      <tr>
        <th scope="row">1</th>
        <td><img src="{{url('/files/photo/'.$employee->file)}}" style="width:70px; height:60px;" ></td>
        <td> {{$employee->employeeDetail->name}}</td>
        <td>dssf </td>
        <td> {{$employee->department->department}}</td>
        <td> {{$employee->designation->designation}}</td>
        <td> {{$employee->employeeDetail->email}}</td>
        <td> {{$employee->contact}}</td>
        <td> {{$employee->address}}</td>

      </tr>

    </tbody>
  </table> --}}
  @extends('backend.partial.adminMaster')

@section('contents')



  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->

              <div class="container">
                  <div class="jumbotron w-75">
                    <div class="row">
                        <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                            <img src="{{url('/files/photo/'.$employee->file)}}" style="width:200px; height:200px;margin-top:80px" >
                        </div>
                        <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8">
                            <div class="container" style="border-bottom:1px solid black">

                          <h2>Name:
                            {{$employee->employeeDetail->name}}

                          </h2>
                          </div>
                              <hr>
                            <ul class="container details">
                              <p><span class="glyphicon glyphicon-envelope one" style="width:50px;"></span>{{$employee->employeeDetail->email}}</p>
                              {{-- <li><p><span class="glyphicon glyphicon-map-marker one" style="width:50px;"></span>Hyderabad</p></li>
                              <li><p><span class="glyphicon glyphicon-new-window one" style="width:50px;"></span><a href="#">www.example.com</p></a> --}}
                            </ul>
                            <h3>Address:
                                {{$employee->address}}
                            </h3>
                              <h3>Contact:
                                {{$employee->contact}}
                            </h3>
                            <h3>Department:
                                {{$employee->department->department}}
                            </h3>
                            <h3>Designation:
                                {{$employee->designation->designation}}
                            </h3>


                        </div>

                    </div>

                  </div>
                </div>

        @endsection










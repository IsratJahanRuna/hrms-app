@extends('backend.partial.adminMaster')

@section('contents')

    <h2 class="mt-3 text-center text-decoration-underline">Designation Manage</h2>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mb-1 mt-3 mx-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Add Designation
    </button>

    @if(session()->has('success'))

  <div class="alert alert-success mt-4">
        {{session()->get('success')}}
  </div>
  @endif
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif

    <div style="overflow-x:auto;">
    {{-- Employee Details table --}}
    <table class="table my-4 rounded shadow" style="margin-right: 200px;">
        <thead>
            <tr>
                <th class="py-4" scope="col">#</th>
                <th class="py-4" scope="col">Designations</th>
                <th class="py-4" scope="col">Status</th>
                <th class="py-4" scope="col">Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($designations as $key => $request)

                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $request->designation }}</td>
                    <td>{{ $request->status }}</td>
                    <td>
                        <a class="btn btn-info text-light" href="{{ route('designationEdit', $request->id) }}"><i class="fas fa-edit"></i></a>


                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
    </div>


    {{$designations->links()}}







    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Department</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="post" action={{ route('designationCreate') }}>

                    @csrf

                    <div class="modal-body">

                        <div class="form-group">
                            <label for="exampleInputDesignation">Designation</label>
                            <input name="designation" type="text" class="form-control" id="exampleInputDesignation"
                                placeholder="Enter Designation" required>

                        </div>
                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                        <button type="submit" class="btn btn-primary" style="margin-right: 220px;">Add</button>
                    </div>

                </form>

            </div>
        </div>
    </div>



@endsection

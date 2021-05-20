@extends('backend.partial.adminMaster')

@section('contents')

    <h2 class="mt-3 text-center text-decoration-underline">Notification</h2>
    @if (session()->has('success'))

        <div class="alert alert-danger mt-4">
            {{ session()->get('success') }}
        </div>
    @endif
    @if (session()->has('message'))

    <div class="alert alert-success mt-4">
        {{ session()->get('message') }}
    </div>
@endif

    <table class="table my-4 rounded shadow " style="margin-right: 200px;">
        <thead>
            <tr>
                <th class="py-4" scope="col">#</th>
                <th class="py-4" scope="col">Name</th>
                <th class="py-4" scope="col">Email</th>
                <th class="py-4" scope="col">Department</th>

                <th class="py-4" scope="col">Leave_Type</th>
                <th class="py-4" scope="col">From_Date</th>
                <th class="py-4" scope="col">To_Date</th>
                <th class="py-4" scope="col">Description</th>
                <th class="py-4" scope="col">Status</th>
                <th class="py-4" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notifications as $key => $request)
                {{-- @dd($request) --}}
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>

                    <td>{{ $request->employeeDetail->name }}</td>
                    <td>{{ $request->employeeDetail->email }}</td>
                    <td>{{ $request->department->department }}</td>
                    <td>{{ $request->type }}</td>
                    <td>{{ $request->from }}</td>
                    <td>{{ $request->to }}</td>
                    <td>{{ $request->about }}</td>
                    <td>{{ $request->status }}</td>
                    <td>

                        @if ($request->status !== 'decline')
                            <a class="btn btn-success text-light"
                                href="{{ route('ApplicationAccept', $request->id) }}">Accept</a>
                            <a class="btn btn-danger text-light"
                                href="{{ route('declineApplication', $request->id) }}">Decline</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $notifications->links() }}

@endsection

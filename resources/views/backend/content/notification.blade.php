@extends('backend.partial.adminMaster')

@section('contents')

    <h2 class="mt-3 text-center text-decoration-underline">Notification</h2>
    @if (session()->has('success'))

        <div class="alert alert-danger mt-4 d-flex justify-content-between">
            {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

        </div>
    @endif
    @if (session()->has('message'))

    <div class="alert alert-success mt-4 d-flex justify-content-between">
        {{ session()->get('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

    </div>
@endif

<div style="overflow-x:auto;">
    <table class="table my-4 rounded shadow table-bordered" style="margin-right: 200px;">
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
                    <td>{{ $request->department }}</td>
                    <td>{{ $request->type }}</td>
                    <td>{{ $request->from }}</td>
                    <td>{{ $request->to }}</td>
                    <td>{{ $request->about }}</td>
                    <td>{{ $request->status }}</td>
                    <td>

                        @if ($request->status !== 'decline')
                            <a class="btn btn-success text-light"
                                href="{{ route('ApplicationAccept', $request->id) }} " onclick="return confirm('Are you sure you want to accept this application?')">Accept</a>
                            <a class="btn btn-danger text-light"
                                href="{{ route('declineApplication', $request->id) }}" onclick="return confirm('Are you sure you want to decline this application?')">Decline</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    {{ $notifications->links() }}

@endsection

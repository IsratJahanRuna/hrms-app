@extends('backend.partial.employeeMaster')


@section('contents')
    {{-- @dd($notice); --}}

    @if ($notice->count()>0)



    <div>



            <marquee class=" mt-1 fs-4" direction="left" height="50px" width="1245px"
                style="background-color:rgb(241, 233, 233); color:red;">
                @foreach ($notice as $request)

                    {{ $request->notice }}

                @endforeach
            </marquee>

        <img style="width: 1245px; height:605px;" src="https://ak.picdn.net/shutterstock/videos/20303122/thumb/7.jpg"
            alt="">



    </div>


    @else

<img  class=" mt-1 " style="width: 1250px;" src="https://ak.picdn.net/shutterstock/videos/20303122/thumb/7.jpg" alt="">


@endif


@endsection

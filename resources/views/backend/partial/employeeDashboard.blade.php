@extends('backend.partial.employeeMaster')


@section('contents')
    {{-- @dd($notice); --}}

    @if ($notice->count() > 0)


    <main class="col-md-10">
        <div >

           <div style="display: flex; margin:7.5px 0; width: 1245px;">
            <span class="fs-5 p-2" style="background: rgb(26, 71, 155);color:white;"  ><b>NOTICE</b> </span>

            <marquee class=" fs-5 p-2" direction="left" style="background-color: rgb(221, 225, 247); " >
                @foreach ($notice as $request)

                    {{ $request->notice }}


                @endforeach

                <span>*** Please maintain health instructions as stricktly as possible! *** <span class="glyphicon glyphicon-forward"></span> Maintain a minimum 6 feet distance from others! *** <span class="glyphicon glyphicon-forward"></span> Stay home, Stay safe ***</span>
            </marquee>
           </div>

            <img style="width: 1245px; height:605px;" src="https://ak.picdn.net/shutterstock/videos/20303122/thumb/7.jpg"
                alt="">



        </div>


    @else

        <img class=" mt-1 " style="width: 1250px;" src="https://ak.picdn.net/shutterstock/videos/20303122/thumb/7.jpg"
            alt="">


    @endif
    </main>

@endsection

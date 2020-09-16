@extends('layouts.app')

@section('content')
    <!-- <div class="flex flex-wrap"> -->
    <div id="header" class="w-full  h-64">
        <h1 class=" text-center font-title text-5xl pt-24">Activités</h1>
    </div>

    {{-- **  ERRORS  ** --}}
    @include('layouts.errors')

    <!-- carousel -->
    <section class="container mx-auto">

        <div class="w-full my-4">
            @auth()
                @if(auth()->user()->is_admin)
                    <div class="flex justify-center items-center ">

                        <a href="{{ route('activity.create') }}" class="btn-gardiant rounded pr-4 py-1">
                            <i class="fas fa-plus px-2"></i>
                            Add Activity
                        </a>


                    </div>
                @endif
            @endauth
        </div>
        <div class="pt-8">
            <h1 class="pb-3 text-2xl font-title border-b-2 border-bg-white">Videos</h1>
            <div class="flex flex-wrap justify-between  items-center " id="video_container">

                @foreach($activ as $item)
                    <div
                        class="bg-white flex flex-col justify-between activity-card w-64 shadow rounded hover:shadow-lg transition duration-200 transform text-black hover:-translate-y-2 overflow-hidden my-5 h-auto mx-auto md:mx-4"
                    >
                        <div class="flex">

                            <div
                                class="vid htmlvid"

                                vidSrc="{{ $item->video }}"
                            ></div>
                        </div>

                        <div>

                            <div class="w-full flex flex-col">
                                <h3 class="font-bold text-gray-700 w-full text-center mt-1 cursor-default text-lg">
                                    {{ $item->title }}
                                </h3>
                                <p class="p-3 pt-1 cursor-default">
                                    {{ $item->description }}
                                </p>
                                <a href=""
                                   class="btn-gardiant text-white text-center text-sm px-3 py-1 m-2 focus:outline-none rounded">Regarder</a>
                            </div>
                            @auth()
                                @if(auth()->user()->is_admin )
                                    <div class="w-full flex justify-around items-center pb-3">

                                        <a href="{{ route('activity.edit',$item->id) }}" type="button"
                                           class="bg-blue-600 text-white rounded font-bold px-4 py-1">
                                            Update
                                        </a>
                                        <form action="{{ route('activity.destroy', $item->id) }}" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button class="bg-red-600 rounded text-white font-bold px-4 py-1">
                                                Delete
                                            </button>
                                        </form>

                                    </div>
                                @endif
                            @endauth
                        </div>

                    </div>
                @endforeach
            </div>

        </div>
        {{--PAGINATION--}}
        <div class="">
            {{ $activ->links() }}
        </div>
        <div class="owl-carousel my-20">
            {{--            <div class="text-center">--}}
            {{--                @foreach ($activ as $item)--}}


            {{--                    <div class=" w-full lg:flex">--}}
            {{--                        <div class="">--}}
            {{--                            <video class="w-64" id=""--}}
            {{--                                   autoplay--}}
            {{--                                   loop--}}
            {{--                                   preload="auto"--}}
            {{--                                   muted--}}
            {{--                                   playsinline--}}
            {{--                            >--}}
            {{--                                <source src="{{ $item->video }}" type="video/mp4"/>--}}
            {{--                            </video>--}}
            {{--                        </div>--}}
            {{--                        --}}{{-- <div--}}
            {{--                            class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"--}}
            {{--                            style="background-image: url('https://tailwindcss.com/img/card-left.jpg')"--}}
            {{--                            title="Woman holding a mug">--}}
            {{--                        </div> --}}
            {{--                        <div--}}
            {{--                            class="border-r border-b border-l border-grey-light lg:border-l-0 lg:border-t lg:border-grey-light bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">--}}
            {{--                            <div class="mb-8 text-gray-900">--}}
            {{--                                <p class="text-sm text-grey-dark flex items-center">--}}
            {{--                                    Members only--}}
            {{--                                </p>--}}
            {{--                                <div class="text-black font-bold text-xl mb-2">{{ $item->title }}</div>--}}
            {{--                                <p class="text-grey-darker text-base">{{ $item->description }}</p>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                @endforeach--}}
            {{--            </div>--}}

        </div>
    </section>
    <section class="container mx-auto">


        <div class="pt-8">
            <h1 class="pb-3 text-2xl font-title border-b-2 border-bg-white">live stream</h1>
        </div>
        <div class="flex flex-row justify-center items-center p-2 ">
            <div class="">
                <video class="" id=""
                       autoplay
                       loop
                       preload="auto"
                       muted
                       playsinline
                >
                    <source src="img/vid1.mp4" type="video/mp4"/>
                </video>
            </div>
            <div class="w-11/12 grid grid-rows-2 grid-cols-2 gap-4 p-4">

                <video id=""
                       autoplay
                       loop
                       preload="auto"
                       muted
                       playsinline
                       class="col-start-1"
                >
                    <source src="img/vid1.mp4" type="video/mp4"/>
                </video>


                <video id=""
                       autoplay
                       loop
                       preload="auto"
                       muted
                       playsinline
                       class="col-start-2"

                >
                    <source src="img/vid1.mp4" type="video/mp4"/>
                </video>


                <video id=""
                       autoplay
                       loop
                       preload="auto"
                       muted
                       playsinline
                       class="col-start-1"

                >
                    <source src="img/vid1.mp4" type="video/mp4"/>
                </video>


                <video id=""
                       autoplay
                       loop
                       preload="auto"
                       muted
                       playsinline
                       class="col-start-2"

                >
                    <source src="img/vid1.mp4" type="video/mp4"/>
                </video>

            </div>

        </div>
    </section>


    <section class="w-full mt-16 w-40"></section>

    <section id="lastSecAct">
        <section class="container mx-auto">


            <div class="owl-carousel my-20">
                <div class="text-center">
                    <div class=" w-full lg:flex">
                        <div
                            class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
                            style="background-image: url('https://tailwindcss.com/img/card-left.jpg')"
                            title="Woman holding a mug">
                        </div>
                        <div
                            class="border-r border-b border-l border-grey-light lg:border-l-0 lg:border-t lg:border-grey-light bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                            <div class="mb-8 text-gray-900">
                                <p class="text-sm text-grey-dark flex items-center">
                                    Members only
                                </p>
                                <div class="text-black font-bold text-xl mb-2">Can coffee make you a better developer?
                                </div>
                                <p class="text-grey-darker text-base">Lorem ipsum dolor sit amet, consectetur
                                    adipisicing
                                    elit.
                                    Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium
                                    nihil.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <div class=" w-full lg:flex">
                        <div
                            class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
                            style="background-image: url('https://tailwindcss.com/img/card-left.jpg')"
                            title="Woman holding a mug">
                        </div>
                        <div
                            class="border-r border-b border-l border-grey-light lg:border-l-0 lg:border-t lg:border-grey-light bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                            <div class="mb-8 text-gray-900">
                                <p class="text-sm flex items-center">
                                    Members only
                                </p>
                                <div class="text-black font-bold text-xl mb-2">Can coffee make you a better developer?
                                </div>
                                <p class="text-base">Lorem ipsum dolor sit amet, consectetur adipisicing
                                    elit.
                                    Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium
                                    nihil.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <div class=" w-full lg:flex">
                        <div
                            class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
                            style="background-image: url('https://tailwindcss.com/img/card-left.jpg')"
                            title="Woman holding a mug">
                        </div>
                        <div
                            class="border-r border-b border-l border-grey-light lg:border-l-0 lg:border-t lg:border-grey-light bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                            <div class="mb-8 text-gray-900">
                                <p class="text-sm flex items-center">
                                    Members only
                                </p>
                                <div class="text-black font-bold text-xl mb-2">Can coffee make you a better developer?
                                </div>
                                <p class="text-grey-darker text-base">Lorem ipsum dolor sit amet, consectetur
                                    adipisicing
                                    elit.
                                    Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium
                                    nihil.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

@endsection

@section('scripts')

    <script>
        ;(function () {
// other stuff
            function setClickHandler(id, fn) {
                document.getElementById(id).onclick = fn
            }

            setClickHandler('video_container', function (e) {
                let className = e.target.className
                if (~className.indexOf('htmlvid')) {
                    BigPicture({
                        el: e.target,
                        vidSrc: e.target.getAttribute('vidSrc'),
                    })
                } else if (~className.indexOf('vimeo')) {
                    BigPicture({
                        el: e.target,
                        vimeoSrc: e.target.getAttribute('vimeoSrc'),
                    })
                } else if (~className.indexOf('twin-peaks')) {
                    BigPicture({
                        el: e.target,
                        ytSrc: e.target.getAttribute('ytSrc'),
                        dimensions: [1226, 900],
                    })
                } else if (~className.indexOf('youtube')) {
                    BigPicture({
                        el: e.target,
                        ytSrc: e.target.getAttribute('ytSrc'),
                    })
                }
            })
        })()
    </script>
@endsection

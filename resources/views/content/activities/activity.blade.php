@extends('layouts.app')

@section('content')
    <!-- <div class="flex flex-wrap"> -->
    <div id="header" class="w-full  h-64">
        <h1 class=" text-center font-title text-5xl pt-24">Activités</h1>
    </div>

    <div class="w-full error fixed top-0 z-50">
        @if ($message = Session::get('success'))

            <div class="alert-banner w-1/3 mx-auto my-1">
                <input type="checkbox" class="hidden" id="banneralert">
                <label
                    class="close cursor-pointer flex items-center justify-between w-full p-2 bg-green-500 shadow text-white"
                    title="close" for="banneralert">


                    <span>{{ $message }}</span>


                    <i class="fas fa-exclamation text-white mr-2"></i>
                </label>

            </div>


        @endif
    </div>
    <!-- carousel -->
    <section class="container mx-auto">

        <div>
            @auth()
                @if(auth()->user()->is_admin)
                    <div class="flex justify-center items-center">

                        <a href="{{ route('activity.create') }}" class="btn-gardiant px-4 py-1">
                            Add Activity
                        </a>


                    </div>
                @endif
            @endauth
        </div>
        <div class="pt-8">
            <h1 class="pb-3 text-2xl font-title border-b-2 border-bg-white">Videos</h1>
            <div class="flex flex-wrap justify-center items-center">
                @foreach($activ as $item)
                    <div
                        class="bg-white mx-2 w-64 shadow rounded hover:shadow-lg transition duration-200 transform text-black hover:-translate-y-2 overflow-hidden my-5">
                        <video
                            src="{{ $item->video }}"
                            class="h-48 w-full object-cover object-center"
                            loop
                            preload="auto"
                            muted
                            playsinline

                        ></video>
                        <div class="w-full flex flex-col">
                            <h3 class="font-bold text-gray-700 w-full text-center mt-1 cursor-default text-lg">
                                {{ $item->title }}
                            </h3>
                            <p class="p-3 pt-1 cursor-default">
                                {{ $item->description }}
                            </p>
                            <a href=""
                               class="bg-blue-500 hover:bg-blue-600 text-white text-center px-3 py-1 m-2 focus:outline-none rounded">Look</a>
                        </div>
                        <div class="w-full flex justify-around items-center">

                            <a href="{{ route('activity.edit',$item->id) }}" class="btn-gardiant px-4 py-1">
                                Update
                            </a>
                            <a href="{{ route('activity.destroy',$item->id) }}" class="btn-gardiant px-4 py-1">
                                Delete
                            </a>

                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        {{--PAGINATION--}}
        <div class="bg-gray-200">
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


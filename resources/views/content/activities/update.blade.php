@extends('layouts.app')

@section('content1')

    <div class="p-16"></div>


    <div class="w-full error fixed top-0 z-50">
        @if ($errors->any())
            @foreach ($errors->all() as $error)

                <div class="alert-banner w-1/3 mx-auto my-1">
                    <input type="checkbox" class="hidden" id="banneralert">
                    <label
                        class="close cursor-pointer flex items-center justify-between w-full p-2 bg-red-500 shadow text-white"
                        title="close" for="banneralert">


                        <span>{{ $error }}</span>


                        <i class="fas fa-exclamation text-white mr-2"></i>
                    </label>

                </div>
            @endforeach

        @endif
    </div>


    <section class="container mx-auto">

        <h1 class="font-title text-4xl text-write text-center ">Ajouter un activity</h1>


        @auth
            @if(Auth::user()->is_admin)


                <div class="flex justify-center flex-wrap items-center">
                    <form class="w-full max-w-lg p-6" method="post" action="{{ route('activity.update')  }}"
                          enctype="multipart/form-data">

                        @csrf
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                       for="title">
                                    Titre
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="title" type="text" name="title" placeholder="Title" value="{{$activ->title}}">
                                <input type="hidden" name="_token" value="{{Session::token()}}">
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                       for="description">
                                    description
                                </label>
                                <textarea
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    placeholder="description" name="description" id="description" cols="30"
                                    rows="10">{{ $activ->description }}</textarea>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                </div>
                            </div>
                        </div>
                        <div class="w-full px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                   for="video">
                                video
                            </label>
                            <input
                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                name="video" type="file" id="video" placeholder="">
                        </div>

                        <button type="submit" class="mr-12 px-4 py-1 rounded btn-gardiant ">Ajouter</button>


                    </form>
                </div>


            @endif

        @else
            <div class="text-center h-screen flex justify-center items-center">
                <a href="{{

                 route('activity.index')
              }}">
                    Go Back
                </a>
            </div>
        @endauth


    </section>

@endsection

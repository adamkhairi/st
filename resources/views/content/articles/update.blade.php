@extends('layouts.app')

@section('content')


    @auth()
        @if(Auth::user()->is_admin)


            <section class="container mx-auto">
                <div class="p-16"></div>

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


                {{--                ** ERROR **--}}
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


                <h1 class="font-title text-4xl text-write text-center ">Modifier un article</h1>
                <div class="flex justify-center flex-wrap items-center">
                    <form class="w-full max-w-lg p-6" method="post"
                          action="{{route('article.update',['id'=>$post->id])}}"
                          enctype="multipart/form-data">
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                       for="title">
                                    titre
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    value="{{$post->title}}" id="title" type="text" name="title" placeholder="titre">
                                <input type="hidden" name="_token" value="{{Session::token()}}">
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                       for="body">
                                    description
                                </label>
                                <textarea
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    placeholder="Message" name="body" id="body" cols="30"
                                    rows="10">{{$post->body}}</textarea>
                                <div class="flex flex-wrap -mx-3 mb-6">
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <img src="{{$post->img}}" alt="" class="src">
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                       for="file">
                                    photo
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    name="img" type="file" placeholder="">
                            </div>
                        </div>

                        <button type="submit" class="mr-12 px-4 py-1 rounded btn-gardiant ">Ajouter</button>


                    </form>
                </div>
            </section>

        @endif
    @endauth


@endsection

{{--@include('layouts.footer')--}}

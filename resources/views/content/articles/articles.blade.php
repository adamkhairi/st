@extends('layouts.app')


@section('content')

    {{-- **  ERRORS  ** --}}
    @include('layouts.errors')


    <div id="header" class="w-full  h-64">
        <h1 class=" text-center font-title text-5xl pt-24">Articles</h1>
    </div>

    @auth()
        @if(auth()->user()->is_admin)
            <div class="flex justify-center items-center p-3">

                <a href="{{ route('articles.create') }}" class="btn-gardiant rounded pr-4 py-1">
                    <i class="fas fa-plus px-2"></i>
                    Add Article
                </a>

                <a href="">

                </a>

                <a href="">

                </a>
            </div>
        @endif
    @endauth
@endsection


@section('content1')
    <div class="container mx-auto flex flex-wrap px-5 py-6">

        <!-- Posts Section -->
        <section class="w-full md:w-2/3 flex flex-col items-center px-3">
            <div class="block md:hidden w-full py-2 mb-4" >
                <div class="bg-white shadow p-4 flex rounded">
                    <span class="w-auto flex justify-end items-center text-gray-500 p-2">
                        <i class="fas fa-search"></i>
                     </span>

                    <input class="w-full rounded p-2" type="text" placeholder="...">
                    <button class="btn-gardiant font-bold rounded text-white p-2 pl-4 pr-4">
                        Search
                    </button>
                </div>
            </div>

            {{--                *******************--}}
            @foreach ($posts as $post)

                {{--                ARTICLES--}}
                <article class="flex flex-col shadow my-3">
                    <!-- Article Image -->
                    <a href="{{ route('articles.show',$post->id) }}" class="hover:opacity-75">
                        <img src="{{ $post->img }}" class="w-full overflow-hidden" alt="">
                    </a>

                        <div class="bg-gray-200 article-body flex flex-col justify-start p-6">
                        <a href="{{ route('articles.show',$post->id) }}"
                           class="text-blue-700 text-sm font-bold uppercase pb-4">
                            {{ $post->category->name }}
                        </a>
                       

                        <a href="{{ route('articles.show',$post->id) }}"
                           class="text-3xl font-bold text-gray-800 pb-4">
                            {{ $post->title }}
                        </a>
                        <a href="{{ route('articles.show',$post->id) }}" class="pb-6 overflow-hidden">
                            <p class="text-gray-600  ">
                                {{ $post->body }}

                            </p>
                        </a>

                        <a class="uppercase w-3/12 ml-auto text-center float-right btn-gardiant rounded px-4 py-2 m-2 "
                           href="{{ route('articles.show',$post->id) }}">
                          Lire plus
                            <i class="fas fa-long-arrow-alt-right pl-2"></i>
                        </a>

                        {{--                        ARTICLE MANAGE--}}
                        @auth()
                            @if(auth()->user()->is_admin)
                                <div class="flex justify-center items-center">
                                    <div>
                                        <a type="button" class="btn-gardiant rounded-full px-4 py-1"
                                           href="{{route('articles.edit',[$post->id])}}">
                                            UPDATE
                                        </a>
                                    </div>

                                    <div>
                                        <form action="{{ route('articles.destroy',$post->id) }}" method="POST"
                                              enctype="multipart/form-data"
                                              onsubmit="return confirm('etes vous sur?');"
                                              >
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn-gardiant rounded-full px-4 py-1"
                                            >
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        @endauth


                    </div>

                </article>
            @endforeach


            {{--PAGINATION--}}
            <div class="bg-gray-200">
                {{ $posts->links() }}
            </div>
        </section>
    {{--                ***************--}}





    <!-- Sidebar Section -->
        <aside class="w-full md:w-1/3 flex flex-col items-center px-3">
            <div class="hidden md:block w-full py-2 mb-4">
                <div class="bg-white shadow p-4 flex rounded">
                    <span class="w-auto flex justify-end items-center text-gray-500 p-2">
                        <i class="fas fa-search"></i>
                     </span>

                    <input class="w-full rounded p-2" type="text" placeholder="...">
                    <button class="btn-gardiant font-bold rounded text-white p-2 pl-4 pr-4">
                        Search
                    </button>
                </div>
            </div>
            <div class="w-full bg-white text-black shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">About Us</p>
                <p class="pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mattis est eu odio
                    sagittis tristique. Vestibulum ut finibus leo. In hac habitasse platea dictumst.</p>
                <a href="https://tailwind-blog-demo.dgrzyb.me/#"
                   class="w-full btn-gardiant text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                    Get to know us
                </a>
            </div>

            <div class="w-full bg-white shadow flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">Instagram</p>
                <div class="grid grid-cols-3 gap-3">
                    <img class="hover:opacity-75" src="./Tailwind Blog Template_files/150x150" alt="">
                    <img class="hover:opacity-75" src="./Tailwind Blog Template_files/150x150(1)">
                    <img class="hover:opacity-75" src="./Tailwind Blog Template_files/150x150(2)" alt="">
                    <img class="hover:opacity-75" src="./Tailwind Blog Template_files/150x150(3)">
                    <img class="hover:opacity-75" src="./Tailwind Blog Template_files/150x150(4)">
                    <img class="hover:opacity-75" src="./Tailwind Blog Template_files/150x150(5)">
                    <img class="hover:opacity-75" src="./Tailwind Blog Template_files/150x150(6)">
                    <img class="hover:opacity-75" src="./Tailwind Blog Template_files/150x150(7)">
                    <img class="hover:opacity-75" src="./Tailwind Blog Template_files/150x150(8)">
                </div>
                <a href="https://tailwind-blog-demo.dgrzyb.me/#"
                   class="w-full btn-gardiant text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-6">
                    <i class="fab fa-instagram mr-2"></i>
                    Follow @Adam

                </a>
            </div>

        </aside>

    </div>

@endsection

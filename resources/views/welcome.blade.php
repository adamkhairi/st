@extends('layouts.app')



@section('content1')
    <section
        class="flex md:flex-row justify-around items-center p-6 text-center flex-col-reverse container h-screen mx-auto">


        <div class="flex flex-col items-center ">
            <div class="my-4">
                <h1 class="text-4xl font-bold mb-6 font-title">Commencer</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, quis.</p>
            </div>
            <div class="my-4">
                <div class="my-6">
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" id="loginBtnHero"
                           class="btn-gardiant px-4 py-1  rounded whitespace-no-wrap">Se
                            connecter</a>


                    @endif
                </div>
                <div class="my-6">

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" id="registerBtn"
                           class="btn-gardiant px-4 py-1 mt-5 m-2 rounded whitespace-no-wrap">Inscrivez-vous</a>

                    @endif
                </div>
            </div>

        </div>
        <div>
            <img src="/img/banner_img.png" alt="">
        </div>

    </section>
@endsection

@section('content2')
    <section class="container mx-auto ">


        <h1 class="text-4xl text-center font-title">Activity</h1>

        <div class="owl-carousel my-20 flex">
            @foreach($activ as $item)
                <div
                    class="bg-white flex flex-col justify-between activity-card mx-2 w-64 shadow rounded hover:shadow-lg transition duration-200 transform text-black hover:-translate-y-2 overflow-hidden my-5 h-auto"
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
                                       class="bg-blue-600 text-white rounded font-bold md:mb-4 px-4 py-1">
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
    </section>

@endsection

@section('content3')
    <section class="w-full mt-16 ">

        <h1 class="text-4xl text-center font-title mb-16">Articles</h1>
        <div class="flex justify-center">
            <div class="flex flex-col md:w-3/6 w-100 px-6 h-full overflow-hidden">
                @foreach($topArt as $article)

                    <div class="pb-4 col-span-8">
                        <div class="lg:flex justify-start items-center">
                            <div class=" md:w-2/4 img-art">

                                <img class="pr-6 " src="{{ $article->img }}" alt="">
                            </div>

                            <div class="">
                                <a href="{{ route('articles.show',$article->id) }}" class="overflow-hidden">
                                    <h1 class="font-title text-2xl mb-2">
                                        {{ $article->title }}
                                    </h1>
                                </a>
                                <p class="pr-6">
                                    {{ $article->body }}

                                </p>
                                <a class="float-right btn-gardiant rounded px-4 py-1 m-2 relative bottom-0 right-0"
                                   href="{{ route('articles.show',$article->id) }}">voir plus...</a>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
            <div class="my-auto">
                <img class="hidden lg:block pl-10" src="img/580b57fcd9996e24bc43c297.png" alt=""
                     style="width: 25vw">
            </div>
        </div>

    </section>

@endsection

@section('content4')
    <section class="mt-20">
        <h1 class="text-4xl text-center font-title">Qui somme-nous ?</h1>
        <p class="text-center mt-2 mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, omnis
            sapiente. Illum pariatur ut
            vel!</p>
        <div class="flex justify-center items-center">
            <div class="text-center " id="header">
                <video id="exporevideo"
                       autoplay
                       loop
                       preload="auto"
                       muted
                       playsinline
                >
                    <source src="img/vid1.mp4" type="video/mp4"/>
                </video>

            </div>

        </div>
    </section>

@endsection

@section('content5')
    <section class="container mx-auto mt-20">
        <h1 class="font-title text-4xl text-center">Contactez nous</h1>
        <div class="flex justify-center flex-wrap items-center">
            <form class="w-full max-w-lg p-6">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="first-name">
                            Nom
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="first-name" type="text" placeholder="Nom">

                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                               for="last-name">
                            Prénom
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="last-name" type="text" placeholder="Doe">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                            Email
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            id="email" type="email" placeholder="Example@mail.com">
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="message">
                            Email
                        </label>
                        <textarea
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                            placeholder="Message" name="message" id="" cols="30" rows="10"></textarea>
                        <button type="submit" class="mr-12 px-4 py-1 rounded btn-gardiant "
                        >Envoyer !
                        </button>
                    </div>
                </div>
            </form>

            <img src="img/banner_img.png" class="hidden md:flex w-full md:w-1/2" alt="">

        </div>

    </section>
@endsection

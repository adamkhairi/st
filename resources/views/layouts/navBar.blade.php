<nav id="nav" class="flex justify-between fixed z-20  items-center text-white w-full p-4  px-6 md:px-16 ">
    <div class="flex w-2/12 justify-start">
        <a href="{{ route('home') }}" class="flex-shrink-0 mx-4">
            <img src="/img/favicon.png" alt="LOGO">
        </a>
    </div>
    <div class="flex  justify-center hidden lg:flex w-8/12">
        <div class="mx-3 hover:bg-gray-200 hover:text-gray-900 hover:shadow-lg hover:font-bold px-6 py-1 rounded">
            <a href="{{ route('home') }}">Acceuil</a>
        </div>
        <div class="mx-3 hover:bg-gray-200 hover:text-gray-900 hover:shadow-lg hover:font-bold px-6 py-1 rounded">

            <a href="{{ route('activity.index') }}">Activités</a>
        </div>
        <div class="mx-3 hover:bg-gray-200 hover:text-gray-900 hover:shadow-lg hover:font-bold px-6 py-1 rounded">
            <a href="{{ route('articles.index') }}
                ">Articles</a>
        </div>
        <div class="mx-3 hover:bg-gray-200 hover:text-gray-900 hover:shadow-lg hover:font-bold px-6 py-1 rounded">
            <a href="{{ route('send_email') }}">Contact</a>
        </div>
    </div>

    <div class="flex items-center">
        @auth()
            <a class="block lg:hidden " href="{{ url('/profile') }}">
                <div class="flex flex-row justify-center items-center">
                    <div class="rounded-full btn-gardiant">

                        <i class="fas fa-user-circle text-3xl md:text-4xl m-1"></i>
                    </div>

                </div>

            </a>
        @endauth
        <div id="menu-toggle" class="ml-3 block lg:hidden">
            <i class="fas fa-bars text-4xl hover:text-gray-600"></i>
        </div>
        <div id="menu" class="hidden absolute rounded-lg bg-gray-300 shadow w-64 m-2 right-0">
            <ul class="list-reset text-black">
                <li class="text-right">
                    <button id="closeMenu">
                        <i class="fas fa-times text-2xl m-2"></i>
                    </button>
                </li>

                <li>
                    <a href="{{ route('home') }}"
                       class="block p-4 font-bold border-b-2 border-white  hover:border-red-700 hover:bg-red-200 ">Accueil</a>
                </li>
                <li>
                    <a href="{{ route('activity.index') }}"
                       class="block p-4 font-bold border-b-2 border-white  hover:border-red-700 hover:bg-red-200 ">Activités</a>
                </li>
                <li>
                    <a href="{{ route('articles.index') }}"
                       class="block p-4 font-bold border-b-2 border-white  hover:border-red-700 hover:bg-red-200 ">Articles</a>
                </li>

                <li>
                    <a href="{{ route('send_email') }}"
                       class="block p-4 font-bold border-b-2 border-white  hover:border-red-700 hover:bg-red-200 ">Contact</a>
                </li>

                @guest()
                    <li>
                        <a href="{{ url('/login')}}"
                           class="block text-center text-white px-5 py-1 m-2 rounded-full btn-gardiant">Connexion</a>

                    </li>
                @endguest
            </ul>
        </div>
    </div>

    {{--                    <div class="flex-1 text-right">--}}
    <div class="flex items-center justify-around text-sm hidden lg:flex w-2/12">

        @guest
            <a href="{{ route('login') }}" id="loginBtnHero"
               class="btn-gardiant whitespace-no-wrap px-4 py-2 m-2 rounded shadow-lg">Se
                connecter</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}" id="registerBtn"
                   class="btn-gardiant whitespace-no-wrap px-4 py-2 m-2 rounded shadow-lg">Inscrivez-vous</a>

            @endif
        @else
            @if (auth()->check())
                <a class="" href="{{ url('/profile') }}">
                    <div class="flex flex-row justify-center items-center">
                        <div class="rounded-full btn-gardiant">

                            <i class="fas fa-user-circle text-5xl m-1"></i>
                        </div>

                    </div>

                </a>
                <a href="##" class="m-1 flex-shrink-0">
                    <img src="/img/stream.svg" class="rounded-lg" alt="">
                </a>
            @endif

            <a href="{{ route('logout') }}"
               class="no-underline btn-gardiant px-4 py-1 rounded hover:underline text-gray-300 text-sm p-3"
               onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                {{ csrf_field() }}
            </form>
        @endguest
    </div>


</nav>

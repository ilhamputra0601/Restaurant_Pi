<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="#" class="logo" style="max-width: 75px; margin-top: 10px;">
                        <img src="{{url('assets/images/klassy-logo.png') }}" width="75">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="@auth /redirects @else / @endauth" class="active">Home</a></li>
                        <li class="scroll-to-section"><a href="@auth /redirects/#about @else /#about @endauth">About</a></li>

                        <li class="scroll-to-section"><a href="@auth /redirects/#menu @else /#menu @endauth">Menu</a></li>
                        <li class="scroll-to-section"><a href="@auth /redirects/#chefs @else /#chefs @endauth">Chefs</a></li>

                        <li class="scroll-to-section"><a href="@auth /redirects/#reservation @else /#reservation @endauth">Contact Us</a></li>
                        <li>
                            <a href="@auth{{ url('/showcart', Auth::user()->id) }}@else{{ url('/login')}} @endauth">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                                    <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                  </svg>
                                  @auth
                                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-light bg-danger" style="right: 390px;">
                                    {{ $count }}
                                </span>
                            @else

                            @endauth
                            </a>
                        <li>
                        <li>
                            <a href="@auth{{ url('/showpay', Auth::user()->id) }}@else{{ url('/login')}} @endauth">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
                                    <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
                                  </svg>
                                  @auth
                                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-light bg-danger" style="right: 290px;">
                                    {{ $count_p }}
                                </span>
                            @else

                            @endauth
                            </a>
                        <li>
                            @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                @auth
                   <li>
                    <x-app-layout>

                    </x-app-layout>
                   </li>
                @else
                  <li><a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a></li>

                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a></li>
                    @endif
                @endauth
            </div>
        @endif
                        </li>
                    </ul>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>

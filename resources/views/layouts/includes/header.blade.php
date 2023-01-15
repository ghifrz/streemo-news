<div class="header-area">
    <div class="main-header">
        <div class="header-mid d-none d-md-block">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <!-- Logo -->
                    <div class="col-xl-3 col-lg-3 col-md-3">
                        <div class="logo">
                            <a href="/homepage"><img src="{{ asset('assets/img/logo/Logo-SN.png') }}" alt=""></a>
                        </div>
                    </div>
                    {{-- <div class="col-xl-9 col-lg-9 col-md-9">
                        <p>testtest</p>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="header-bottom header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-10 col-lg-10 col-md-12 header-flex">
                        <!-- sticky -->
                        <div class="sticky-logo">
                            <a href="/homepage"><img src="{{ asset('assets/img/logo/Logo-SN.png') }}" width="100"
                                    alt=""></a>
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu d-none d-md-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="/homepage" style="text-decoration: none">Home</a></li>
                                    {{-- <li><a href="#" style="text-decoration: none">Categories</a>
                                        <ul class="submenu">
                                            @foreach ($category as $cat)
                                                <li><a class="dropdown-item"
                                                        href="{{ $cat->slug }}">{{ $cat->category_name }}</a></li>
                                            @endforeach
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="#">See full categories</a></li>
                                        </ul>
                                    </li> --}}
                                    </li>
                                    @foreach ($category as $cat)
                                        <li class="nav-item">
                                            <a class="nav-link"
                                                href="{{ url('/view-category/'. $cat->slug) }}">{{ $cat->category_name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4">
                        <div class="header-right-btn f-right d-none d-lg-block">
                            <ul class="navbar-nav ms-auto">
                                <!-- Authentication Links -->
                                <ul class="nav">
                                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link link-dark px-2">{{ __('Login') }}</a></li>
                                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link link-dark px-2">{{ __('Register') }}</a></li>
                                  </ul>
                                {{-- @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                    @endif
        
                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @endguest --}}
                                    {{-- <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>
        
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
        
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest --}}
                            </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-md-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

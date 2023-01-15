<!-- Navbar Header -->
<nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark">

    <div class="container-fluid">
        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            <li class="nav-item dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                    <div class="avatar-sm">
                        <img src="{{ asset('assets/img/logo/Logo-SN.png') }}" alt="..."
                            class="avatar-img rounded-circle">
                    </div>
                </a>
                <ul class="dropdown-menu">
                    <div>
                        <li>
                        <a style="margin-left:55px" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </ul>
            </li>
        </ul>
    </div>
</nav>
</div>
<!-- End Navbar -->

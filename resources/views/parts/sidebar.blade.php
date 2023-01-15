<div class="sidebar sidebar-style-2" data-background-color="dark2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <br>
            <br>
            <ul class="nav nav-primary">
                <li class="nav-item active">
                    <a href="{{ url('/homepage') }}">
                        <i class="fas fa-home"></i>
                        <p>Homepage</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Components</h4>
                </li>
                <li class="nav-item">
                    <a href="{{ route('category.index') }}">
                        <i class="fas fa-tags"></i>
                        <p>Kategori</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('articles.index') }}">
                        <i class="far fa-newspaper"></i>
                        <p>Artikel</p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{ route('playlist.index') }}">
                        <i class="fas fa-video"></i>
                        <p>Playlist Video</p>
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="{{ route('materials.index') }}">
                        <i class="fas fa-film"></i>
                        <p>Video Materials</p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{ route('slides.index') }}">
                        <i class="fas fa-film"></i>
                        <p>Slide Banner</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('adsenses.index') }}">
                        <i class="fas fa-desktop"></i>
                        <p>Adsenses</p>
                    </a>
                </li>
                <li class="nav-item">
                    <hr>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fas fa-undo"></i>
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </li>
            </ul>
        </div>
    </div>
</div>

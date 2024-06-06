
<head>
    <style>
        .notification {
            content: "";
            position: absolute;
            top: 22px;
            right: 1px;
            width: 13px;
            height: 13px;
        }
        .rounded-circle {
            border-radius: 50% !important;
        }
        .bg-primary {
            --bs-bg-opacity: 1;
            background-color: rgba(var(--bs-danger-rgb), var(--bs-bg-opacity)) !important;
        }

        .navbar-area .navbar .navbar-nav .nav-item .dropdown-menu {
            width: auto;
        }
    </style>
</head>
<div class="navbar-area header-one mb-0" id="navbar">
    <div class="header-top">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4 d-none d-md-block">
                    <a href="{{route('user.berlangganan')}}" class="subscribe-btn"><span>Berlangganan</span><i class="flaticon-right-arrow"></i></a>
                </div>
                <div class="col-lg-4 col-md-3">
                    <a class="navbar-brand" href="/">
                        <img src="{{asset('assets/img/logo-get-media.png')}}" class="logo-mobile" alt="Image" />
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-7 d-none d-md-block">
                    <ul class="social-profile list-style">
                        <li>
                            <a href="https://www.fb.com/" target="_blank"><i class="ri-facebook-fill"></i></a>
                        </li>
                        <li>
                            <a href="https://www.twitter.com/" target="_blank"><i class="ri-twitter-fill"></i></a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/" target="_blank"><i class="ri-instagram-line"></i></a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/" target="_blank"><i class="ri-linkedin-fill"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-toggler" data-bs-toggle="offcanvas" href="#navbarOffcanvas" role="button" aria-controls="navbarOffcanvas">
                <span class="burger-menu">
                    <span class="top-bar" style="height: 2px; width: 22px;"></span>
                    <span class="middle-bar" style="height: 2px; width: 22px;"></span>
                    <span class="bottom-bar" style="height: 2px; width: 22px;"></span>
                </span>
            </a>
            <div class="sidebar-toggler md-none" data-bs-toggle="offcanvas" href="#navbarOffcanvas" role="button" style="width: 15%" aria-controls="navbarOffcanvas">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="#ffffff" fill-rule="evenodd" d="M20.75 7a.75.75 0 0 1-.75.75H4a.75.75 0 0 1 0-1.5h16a.75.75 0 0 1 .75.75m0 5a.75.75 0 0 1-.75.75H4a.75.75 0 0 1 0-1.5h16a.75.75 0 0 1 .75.75m0 5a.75.75 0 0 1-.75.75H4a.75.75 0 0 1 0-1.5h16a.75.75 0 0 1 .75.75" clip-rule="evenodd"/></svg>
            </div>

            <button type="button" class="bg-transparent border-0 text-white d-lg-none mt-2" id="search-btn"  data-bs-toggle="modal" data-bs-target="#searchModal">
                <i class="flaticon-loupe"></i>
            </button>

            <div class="modal fade searchModal" id="searchModal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="{{route('search')}}" method="GET">
                            <input type="search" name="q" id="search-input"  class="form-control" placeholder="Search here...." />
                            <p id="error-text-input"></p>
                            <button type="submit" id="save-btn"><i class="fi fi-rr-search"></i></button>
                        </form>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="ri-close-line"></i></button>
                    </div>
                </div>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a href="/"  class="nav-link" style="{{ request()->routeIs('home') ? 'color: #E93314;' : '' }}">
                            Beranda
                        </a>
                    </li>


                    @foreach ($categories as $category)
                        <li class="nav-item">
                            <a  href="{{ route('categories.show.user', ['category' => $category->slug]) }}" class="dropdown-toggle nav-link" style="{{ request()->routeIs('categories.show.user') && request()->route('category') == $category->slug || (request()->routeIs('subcategories.show.user') && request()->route('category') == $category->slug) ? 'color: #E93314;' : '' }}">{{ $category->name }}</a>
                            @if (count($subCategories->where('category_id', $category->id)) > 0)
                                <ul class="dropdown-menu">
                                    <div class="d-flex">
                                        <li class="nav-item">
                                            @forelse ($subCategories->where('category_id', $category->id) as $subCategory)
                                                <a href="{{ route('subcategories.show.user', ['category' => $subCategory->category->slug,'subCategory' => $subCategory->slug]) }}" class="nav-link" style="{{ request()->routeIs('subcategories.show.user') && request()->route('category') == $subCategory->category->slug && request()->route('subCategory') == $subCategory->slug  ? 'color: #E93314;' : '' }}">{{ $subCategory->name }}</a>

                                                @if(($loop->iteration % 5) == 0)
                                                </li>
                                                <li class="nav-item">
                                                @endif

                                                @empty
                                                <div class="nav-link">
                                                    Data Kosong
                                                </div>
                                            @endforelse
                                        </li>
                                    </div>
                                </ul>
                            @else
                                <ul class="dropdown-menu">
                                    <div class="d-flex">
                                        <div class="nav-item">
                                            <p class="nav-link">
                                               Data Kosong
                                            </p>
                                        </div>
                                    </div>
                                </ul>
                            @endif

                        </li>
                    @endforeach
                </ul>

                <div class="others-option d-flex mx-auto align-items-center" id="loginSection">

                    <div class="option-item">
                        <button type="button" class="search-btn" id="search-btn" data-bs-toggle="modal" data-bs-target="#searchModal">
                            <i class="flaticon-loupe"></i>
                        </button>
                    </div>

                    @auth
                        <div class="option-item">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="javascript:void(0)" class="nav-link">
                                        @if ((auth()->user()->roles->pluck('name')[0] == "admin") && $totalUnread > 0)
                                            <div id="notif-admin" class="notification bg-primary rounded-circle"></div>
                                        @elseif ((auth()->user()->roles->pluck('name')[0] == "user") && $countMessage > 0)
                                            <div id="notif-admin" class="notification bg-primary rounded-circle"></div>
                                        @elseif ((auth()->user()->roles->pluck('name')[0] == "author") && $totalAuthor > 0)
                                            <div id="notif-admin" class="notification bg-primary rounded-circle"></div>
                                        @endif
                                        <img src="{{ asset( Auth::user()->photo ? 'storage/'.Auth::user()->photo : "default.png")  }}" class="mb-2" alt="Image" width="40" height="40" style="min-width: 40px;border-radius: 50%;object-fit:cover;min-height: 40px;"/>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            @role('author')
                                            <div class="news-card-img">
                                                <a href="{{ route('profile.index') }}" class="nav-link">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M12 12q-1.65 0-2.825-1.175T8 8q0-1.65 1.175-2.825T12 4q1.65 0 2.825 1.175T16 8q0 1.65-1.175 2.825T12 12m-8 8v-2.8q0-.85.438-1.562T5.6 14.55q1.55-.775 3.15-1.162T12 13q1.65 0 3.25.388t3.15 1.162q.725.375 1.163 1.088T20 17.2V20z"/></svg>
                                                    Profile
                                                </a>
                                            </div>
                                            <a href="{{ route('logout') }}/login" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 512 512"><path d="M312 372c-7.7 0-14 6.3-14 14 0 9.9-8.1 18-18 18H94c-9.9 0-18-8.1-18-18V126c0-9.9 8.1-18 18-18h186c9.9 0 18 8.1 18 18 0 7.7 6.3 14 14 14s14-6.3 14-14c0-25.4-20.6-46-46-46H94c-25.4 0-46 20.6-46 46v260c0 25.4 20.6 46 46 46h186c25.4 0 46-20.6 46-46 0-7.7-6.3-14-14-14z" fill="currentColor"/><path d="M372.9 158.1c-2.6-2.6-6.1-4.1-9.9-4.1-3.7 0-7.3 1.4-9.9 4.1-5.5 5.5-5.5 14.3 0 19.8l65.2 64.2H162c-7.7 0-14 6.3-14 14s6.3 14 14 14h256.6L355 334.2c-5.4 5.4-5.4 14.3 0 19.8l.1.1c2.7 2.5 6.2 3.9 9.8 3.9 3.8 0 7.3-1.4 9.9-4.1l82.6-82.4c4.3-4.3 6.5-9.3 6.5-14.7 0-5.3-2.3-10.3-6.5-14.5l-84.5-84.2z" fill="currentColor"/></svg>
                                                Logout
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                            </form>
                                            @endrole
                                        </li>
                                        <li class="nav-item">
                                            @role('user')
                                            <a href="{{ route('profile.user') }}" class="nav-link">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M12 12q-1.65 0-2.825-1.175T8 8q0-1.65 1.175-2.825T12 4q1.65 0 2.825 1.175T16 8q0 1.65-1.175 2.825T12 12m-8 8v-2.8q0-.85.438-1.562T5.6 14.55q1.55-.775 3.15-1.162T12 13q1.65 0 3.25.388t3.15 1.162q.725.375 1.163 1.088T20 17.2V20z"/></svg>
                                                Profile
                                            </a>
                                            <a href="{{ route('logout') }}/login" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 512 512"><path d="M312 372c-7.7 0-14 6.3-14 14 0 9.9-8.1 18-18 18H94c-9.9 0-18-8.1-18-18V126c0-9.9 8.1-18 18-18h186c9.9 0 18 8.1 18 18 0 7.7 6.3 14 14 14s14-6.3 14-14c0-25.4-20.6-46-46-46H94c-25.4 0-46 20.6-46 46v260c0 25.4 20.6 46 46 46h186c25.4 0 46-20.6 46-46 0-7.7-6.3-14-14-14z" fill="currentColor"/><path d="M372.9 158.1c-2.6-2.6-6.1-4.1-9.9-4.1-3.7 0-7.3 1.4-9.9 4.1-5.5 5.5-5.5 14.3 0 19.8l65.2 64.2H162c-7.7 0-14 6.3-14 14s6.3 14 14 14h256.6L355 334.2c-5.4 5.4-5.4 14.3 0 19.8l.1.1c2.7 2.5 6.2 3.9 9.8 3.9 3.8 0 7.3-1.4 9.9-4.1l82.6-82.4c4.3-4.3 6.5-9.3 6.5-14.7 0-5.3-2.3-10.3-6.5-14.5l-84.5-84.2z" fill="currentColor"/></svg>
                                                Logout
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                            </form>
                                            @endrole
                                        </li>
                                        <li class="nav-item">
                                            @role('admin')
                                            <a href="/dashboard" class="nav-link">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M12 12q-1.65 0-2.825-1.175T8 8q0-1.65 1.175-2.825T12 4q1.65 0 2.825 1.175T16 8q0 1.65-1.175 2.825T12 12m-8 8v-2.8q0-.85.438-1.562T5.6 14.55q1.55-.775 3.15-1.162T12 13q1.65 0 3.25.388t3.15 1.162q.725.375 1.163 1.088T20 17.2V20z"/></svg>
                                                Dashboard
                                            </a>
                                            <a href="{{ route('logout') }}/login" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 512 512"><path d="M312 372c-7.7 0-14 6.3-14 14 0 9.9-8.1 18-18 18H94c-9.9 0-18-8.1-18-18V126c0-9.9 8.1-18 18-18h186c9.9 0 18 8.1 18 18 0 7.7 6.3 14 14 14s14-6.3 14-14c0-25.4-20.6-46-46-46H94c-25.4 0-46 20.6-46 46v260c0 25.4 20.6 46 46 46h186c25.4 0 46-20.6 46-46 0-7.7-6.3-14-14-14z" fill="currentColor"/><path d="M372.9 158.1c-2.6-2.6-6.1-4.1-9.9-4.1-3.7 0-7.3 1.4-9.9 4.1-5.5 5.5-5.5 14.3 0 19.8l65.2 64.2H162c-7.7 0-14 6.3-14 14s6.3 14 14 14h256.6L355 334.2c-5.4 5.4-5.4 14.3 0 19.8l.1.1c2.7 2.5 6.2 3.9 9.8 3.9 3.8 0 7.3-1.4 9.9-4.1l82.6-82.4c4.3-4.3 6.5-9.3 6.5-14.7 0-5.3-2.3-10.3-6.5-14.5l-84.5-84.2z" fill="currentColor"/></svg>
                                                Logout
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                            </form>
                                            @endrole
                                        </li>
                                    </ul>
                                </li>

                            </ul>
                        </div>
                        @if (Auth::check() && Auth::user()->roles() == "author")
                        @endif
                        @else

                        <div class="">
                            <div class="option-item">
                                <a href="/login" class="btn-two" id="signInBtn">Login</a>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </nav>
    </div>
</div>

<div class="modal fade searchModal" id="searchModal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('search')}}" method="GET">
                <input type="search" name="q" id="search-input"  class="form-control" placeholder="Search here...." />
                <button type="submit"><i class="fi fi-rr-search"></i></button>
            </form>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="ri-close-line"></i></button>
        </div>
    </div>
</div>

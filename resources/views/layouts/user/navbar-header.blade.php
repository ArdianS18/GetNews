<style>
    @media (max-width: 768px) {
        .logo-mobile {
            width: 150px;
        }

    }

    @media (max-width: 992px) {
        .sidebar-toggler{
            width: 1% !important ;
        }
    }


    body {
        overflow-x: hidden;
    }

</style>
<div class="navbar-area header-one mb-5" id="navbar">
    <div class="header-top">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-6 col-5 d-none d-md-block">
                    <a href="{{route('user.berlangganan')}}" class="subscribe-btn"><span>Berlangganan</span><i class="flaticon-right-arrow"></i></a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a class="navbar-brand" href="/">
                        <img src="{{asset('assets/img/logo-get-media.png')}}" class="logo-mobile" alt="Image" />
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-7 d-none d-md-block">
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
                    <span class="top-bar" style="height: 2px; width: 25px;"></span>
                    <span class="middle-bar" style="height: 2px; width: 25px;"></span>
                    <span class="bottom-bar" style="height: 2px; width: 25px;"></span>
                </span>
            </a>
            <div class="sidebar-toggler md-none" data-bs-toggle="offcanvas" href="#navbarOffcanvas" role="button" style="width: 15%" aria-controls="navbarOffcanvas">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="#ffffff" fill-rule="evenodd" d="M20.75 7a.75.75 0 0 1-.75.75H4a.75.75 0 0 1 0-1.5h16a.75.75 0 0 1 .75.75m0 5a.75.75 0 0 1-.75.75H4a.75.75 0 0 1 0-1.5h16a.75.75 0 0 1 .75.75m0 5a.75.75 0 0 1-.75.75H4a.75.75 0 0 1 0-1.5h16a.75.75 0 0 1 .75.75" clip-rule="evenodd"/></svg>
            </div>

            <button type="button" class="bg-transparent border-0 text-white d-lg-none mt-2"  data-bs-toggle="modal" data-bs-target="#searchModal">
                <i class="flaticon-loupe"></i>
            </button>
            {{-- @auth
                <div class="ms-2 mt-1 d-lg-none">
                    <ul class="navbar-nav mx-auto">
                        <div class="news-card-img mb-2 ms-4">
                            @role('author')
                            <a href="{{ route('profile.index') }}">
                                <img src="{{ asset( Auth::user()->photo ? 'storage/'.Auth::user()->photo : "default.png")  }}" alt="Image" width="32px" height="32px" style="border-radius: 50%; object-fit:cover;"/>
                            </a>
                            @endrole
                            @role('user')
                            <a href="{{ route('profile.user') }}">
                                <img src="{{ asset( Auth::user()->photo ? 'storage/'.Auth::user()->photo : "default.png")  }}" alt="Image" width="32px" height="32px" style="border-radius: 50%; object-fit:cover;"/>
                            </a>
                            @endrole
                            @role('admin')
                            <a href="/dashboard">
                                <img src="{{ asset( Auth::user()->photo ? 'storage/'.Auth::user()->photo : "default.png")  }}" alt="Image" width="32px" height="32px" style="border-radius: 50%; object-fit:cover;"/>
                            </a>
                            @endrole
                        </div>

                    </ul>
                </div>
                @if (Auth::check() && Auth::user()->roles() == "author")
                @endif
                @else

                <div class="d-md-none">
                    <div class="option-item">
                        <a href="/login" class="btn-two" id="signInBtn">Login</a>
                    </div>
                </div>

            @endauth --}}


            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a href="/"  class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="M6 19h3.692v-5.885h4.616V19H18v-9l-6-4.538L6 10zm-1 1V9.5l7-5.288L19 9.5V20h-5.692v-5.885h-2.616V20zm7-7.77"/></svg>
                        </a>
                    </li>
                    @foreach ($categories as $category)
                            <li class="nav-item">
                                <a  href="{{ route('categories.show.user', ['category' => $category->slug]) }}" class="dropdown-toggle nav-link">{{ $category->name }}</a>
                                <ul class="dropdown-menu">
                                    @forelse ($subCategories->where('category_id', $category->id) as $subCategory)
                                        <li class="nav-item">
                                            <a href="{{ route('subcategories.show.user', ['category' => $subCategory->category->slug,'subCategory' => $subCategory->slug]) }}" class="nav-link">{{ $subCategory->name }}</a>
                                        </li>

                                    @empty
                                        <li class="nav-item">
                                            <a href="{{ route('categories.show.user', ['category' => $category->slug]) }}" class="nav-link">{{ $category->name }}</a>
                                        </li>
                                    @endforelse
                                </ul>
                            </li>
                    @endforeach

                </ul>

                <div class="others-option d-flex mx-auto align-items-center" id="loginSection">

                    <div class="option-item">
                        <button type="button" class="search-btn mb-1" id="search-btn" data-bs-toggle="modal" data-bs-target="#searchModal">
                            <i class="flaticon-loupe"></i>
                        </button>
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
                    @auth
                        <div class="option-item">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="javascript:void(0)" class="nav-link">
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


<div class="navbar-area header-one mb-5" id="navbar">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg">
            <div class="sidebar-toggler md-none" style="padding-left: 50px;" data-bs-toggle="offcanvas" href="#navbarOffcanvas" role="button" aria-controls="navbarOffcanvas">
                <img src="{{asset('assets/img/logo-get-media.png')}}" width="150px" alt="Image" />
            </div>
            <a class="navbar-brand d-lg-none" href="index.html">
                <img class="logo-light" src="{{asset('assets/img/logo-white.webp')}}" alt="logo" />
                <img class="logo-dark" src="{{asset('assets/img/logo-white.webp')}}" alt="logo" />
            </a>
            <button type="button" class="search-btn d-lg-none" data-bs-toggle="modal" data-bs-target="#searchModal">
                <i class="flaticon-loupe"></i>
            </button>
            <a class="navbar-toggler" data-bs-toggle="offcanvas" href="#navbarOffcanvas" role="button" aria-controls="navbarOffcanvas">
                <span class="burger-menu">
                    <span class="top-bar"></span>
                    <span class="middle-bar"></span>
                    <span class="bottom-bar"></span>
                </span>
            </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a href="/" class="nav-link active"> Beranda </a>
                    </li>

                    @forelse ($categories as $category)
                    <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link">{{ $category->name }}</a>
                            <ul class="dropdown-menu">
                                {{-- @if ($subCategories === $category->id) --}}
                                    @foreach ($subCategories->where('category_id', $category->id) as $subCategory)
                                    <li class="nav-item">
                                        <a href="business.html" class="nav-link">{{ $subCategory->name }}</a>
                                    </li>
                                    @endforeach
                                {{-- @endif --}}
                            </ul>
                        </li>
                    @empty
                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link"> Tidak ada kategori yang ditampilkan </a>
                        </li>
                    @endforelse


                    {{-- <li class="nav-item">
                        <a href="javascript:void(0)" class="dropdown-toggle nav-link"> Pages </a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a href="about.html" class="nav-link"> About Us </a>
                            </li>
                            <li class="nav-item">
                                <a href="contact.html" class="nav-link"> Contact Us </a>
                            </li>
                            <li class="nav-item">
                                <a href="author.html" class="nav-link"> Author </a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link"> Privacy Policy </a>
                            </li>
                        </ul>
                    </li> --}}
                </ul>

                <div class="others-option d-flex align-items-center" id="loginSection">

                        @auth
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <div class="news-card-img" style="padding-right: 0px;">
                                    <a href="javascript:void(0)" class="nav-link">
                                        <img src="{{ asset( Auth::user()->photo ? 'storage/'.Auth::user()->photo : "default.png")  }}" alt="Image" width="35px" style="border-radius: 50%; object-fit:cover;"/>
                                    </a>
                                </div>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        @role('author')
                                        <div class="news-card-img" style="padding-right: 50px;">
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
                                        <a href="{{ route('profile.user', ['user' => auth()->user()]) }}" class="nav-link">
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
                                        <a href="{{ route('profile.user', ['user' => auth()->user()]) }}" class="nav-link">
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
                                </ul>
                            </li>
                        </ul>
                        @if (Auth::check() && Auth::user()->roles() == "author")
                        @endif
                        @else
                        <div class="">
                            <div class="option-item">
                                <a href="/login" class="btn-two" id="signInBtn">Sign In</a>

                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </nav>
    </div>
</div>


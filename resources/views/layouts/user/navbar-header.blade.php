<div class="navbar-area header-one mb-5" id="navbar">
    <div class="header-top">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-6 col-5">
                    <button class="subscribe-btn" data-bs-toggle="modal" data-bs-target="#newsletter-popup">Berlangganan<i class="flaticon-right-arrow"></i></button>
                </div>
                <div class="col-lg-4 col-md-6 md-none">
                    <a class="navbar-brand" href="index.html">
                        <img src="{{asset('assets/img/logo-get-media.png')}}" alt="Image" />
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 col-7">
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
            <div class="sidebar-toggler md-none" style="padding-left: 50px;" data-bs-toggle="offcanvas" href="#navbarOffcanvas" role="button" aria-controls="navbarOffcanvas">
                <img src="{{asset('assets/img/logo-get-media.png')}}" width="150px" alt="Image" />
            </div>
            <a class="navbar-brand d-lg-none" href="/">
                {{-- <img class="logo-light" src="{{asset('assets/img/logo-white.webp')}}" alt="logo" />
                <img class="logo-dark" src="{{asset('assets/img/logo-white.webp')}}" alt="logo" /> --}}
            </a>
            <button type="button" class="search-btn d-lg-none" data-bs-toggle="modal" data-bs-target="#searchModal">
                <i class="flaticon-loupe"></i>
            </button>
            <a class="navbar-toggler" data-bs-toggle="offcanvas" href="#navbarOffcanvas" role="button" aria-controls="navbarOffcanvas">
                <span class="burger-menu">
                    <span 4class="top-bar"></span>
                    <span class="middle-bar"></span>
                    <span class="bottom-bar"></span>
                </span>
            </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mx-auto">
                    @foreach ($categories as $category)
                        @if ($loop->iteration <= 6)
                            <li class="nav-item">
                                <a href="javascript:void(0)" class="dropdown-toggle nav-link">{{ $category->name }}</a>
                                <ul class="dropdown-menu">
                                    @foreach ($subCategories->where('category_id', $category->id) as $subCategory)
                                        <li class="nav-item">
                                            <a href="{{ route('subcategories.show.user', ['subCategory' => $subCategory->slug]) }}" class="nav-link">{{ $subCategory->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                        <li class="nav-item">
                            <a href="javascript:void(0)" class="  nav-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="#ffffff" fill-rule="evenodd" d="M20.75 7a.75.75 0 0 1-.75.75H4a.75.75 0 0 1 0-1.5h16a.75.75 0 0 1 .75.75m0 5a.75.75 0 0 1-.75.75H4a.75.75 0 0 1 0-1.5h16a.75.75 0 0 1 .75.75m0 5a.75.75 0 0 1-.75.75H4a.75.75 0 0 1 0-1.5h16a.75.75 0 0 1 .75.75" clip-rule="evenodd"/></svg>
                            </a>
                            <ul class="dropdown-menu">
                                {{-- <a href="javascript:void(0)" class="nav-link">{{ $category->name }}</a> --}}
                                @if($categories->count() > 6)
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    @for ($i = 6; $i < $categories->count(); $i++)
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-heading{{$i}}">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$i}}" aria-expanded="false" aria-controls="flush-collapse{{$i}}">
                                                    {{$categories[$i]->name}}
                                                </button>
                                            </h2>
                                            <div id="flush-collapse{{$i}}" class="accordion-collapse collapse" aria-labelledby="flush-heading{{$i}}" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body">
                                                    @foreach ($categories[$i]->subCategories as $subCategory)
                                                        <li class="nav-item">
                                                            <a href="{{ route('subcategories.show.user', ['subCategory' => $subCategory->name]) }}" class="nav-link">{{ $subCategory->name }}</a>
                                                        </li>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            
                                @endif
                            </ul>
                        </li>
                     
                            @break
                        @endif
                    @endforeach

                    @empty($categories)
                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link">Tidak ada kategori yang ditampilkan</a>
                        </li>
                    @endempty
                </ul>

                <div class="others-option d-flex mx-auto align-items-center" id="loginSection">

                    <div class="option-item">
                        <button type="button" class="search-btn" data-bs-toggle="modal" data-bs-target="#searchModal">
                            <i class="flaticon-loupe"></i>
                        </button>
                    </div>
                    <div class="">
                        <div class="option-item">
                            <a href="/" class="btn-two px-4" id="signInBtn">Subcribe</a>
                        </div>
                    </div>


                    <div class="modal fade searchModal" id="searchModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form>
                                    <input type="text" class="form-control" placeholder="Search here...." />
                                    <button type="submit"><i class="fi fi-rr-search"></i></button>
                                </form>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="ri-close-line"></i></button>
                            </div>
                        </div>
                    </div>

                        @auth
                        <ul class="navbar-nav mx-auto">
                            {{-- <li></li> --}}
                            <li class="nav-item">
                                <div class="news-card-img mb-2 ms-2" style="padding-right: 0px;">
                                    <a href="javascript:void(0)" class="nav-link">
                                        <img src="{{ asset( Auth::user()->photo ? 'storage/'.Auth::user()->photo : "default.png")  }}" class="img-fluid" alt="Image" width="40px" height="40px" style="border-radius: 50%; object-fit:cover;"/>
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
                                        <a href="#" class="nav-link">
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


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
                        <a href="javascript:void(0)" class="nav-link active"> Home </a>
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


                    <li class="nav-item">
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
                    </li>
                </ul>
                <div class="others-option d-flex align-items-center" id="loginSection">

                    @auth
                        @if (Auth::check() && Auth::user()->roles() === "author")
                            <div class="news-card-img" style="padding-right: 50px;">
                                <a href="{{ route('profile.index') }}">
                                    <img src="{{ asset('assets/img/news/trending-3.webp') }}" alt="Image" width="45px" style="border-radius: 50%;"/>
                                </a>
                            </div>
                        @endif
                        <a href="{{ route('profile.user', ['user' => auth()->user()]) }}">
                            <div class="news-card-img" style="padding-right: 50px;">
                                <img src="{{ asset('assets/img/news/trending-3.webp') }}" alt="Image" width="45px" style="border-radius: 50%;"/>
                            </div>
                        </a>
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


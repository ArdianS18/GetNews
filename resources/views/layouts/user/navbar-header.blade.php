<style>
    @media (max-width: 768px) {
        .logo-mobile {
            width: 150px;
        }
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
            <div class="sidebar-toggler md-none" data-bs-toggle="offcanvas" href="#navbarOffcanvas" role="button" aria-controls="navbarOffcanvas">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="#ffffff" fill-rule="evenodd" d="M20.75 7a.75.75 0 0 1-.75.75H4a.75.75 0 0 1 0-1.5h16a.75.75 0 0 1 .75.75m0 5a.75.75 0 0 1-.75.75H4a.75.75 0 0 1 0-1.5h16a.75.75 0 0 1 .75.75m0 5a.75.75 0 0 1-.75.75H4a.75.75 0 0 1 0-1.5h16a.75.75 0 0 1 .75.75" clip-rule="evenodd"/></svg>
            </div>

            <button type="button" class="search-btn d-lg-none mt-2" data-bs-toggle="modal" data-bs-target="#searchModal">
                <i class="flaticon-loupe"></i>
            </button>
            @auth
                <div class="ms-2 mt-1 d-md-none">
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

            @endauth

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mx-auto">
                    @foreach ($categories as $category)
                        {{-- @if ($loop->iteration <= 7) --}}
                            <li class="nav-item">
                                <a href="javascript:void(0)" class="dropdown-toggle nav-link">{{ $category->name }}</a>
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
                        {{-- @else
                            @break --}}
                        {{-- @endif --}}
                    @endforeach

                </ul>

                <div class="others-option d-flex mx-auto align-items-center" id="loginSection">

                    <div class="option-item">
                        <button type="button" class="search-btn" data-bs-toggle="modal" data-bs-target="#searchModal">
                            <i class="flaticon-loupe"></i>
                        </button>
                    </div>

                    <div class="modal fade searchModal" id="searchModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{route('news.post')}}" method="GET">
                                    <input type="search" name="search"  class="form-control" placeholder="Search here...." />
                                    <button type="submit"><i class="fi fi-rr-search"></i></button>
                                </form>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="ri-close-line"></i></button>
                            </div>
                        </div>
                    </div>
                    @auth
                        <div class="ms-2">
                            <ul class="navbar-nav mx-auto">
                                <div class="news-card-img mb-2 ms-2" style="padding-right: 0px;">
                                    @role('author')
                                    <a href="{{ route('profile.index') }}">
                                        <img src="{{ asset( Auth::user()->photo ? 'storage/'.Auth::user()->photo : "default.png")  }}" alt="Image" width="40px" height="40px" style="border-radius: 50%; object-fit:cover;"/>
                                    </a>
                                    @endrole
                                    @role('user')
                                    <a href="{{ route('profile.user') }}">
                                        <img src="{{ asset( Auth::user()->photo ? 'storage/'.Auth::user()->photo : "default.png")  }}" alt="Image" width="40px" height="40px" style="border-radius: 50%; object-fit:cover;"/>
                                    </a>
                                    @endrole
                                    @role('admin')
                                    <a href="/dashboard">
                                        <img src="{{ asset( Auth::user()->photo ? 'storage/'.Auth::user()->photo : "default.png")  }}" alt="Image" width="40px" height="40px" style="border-radius: 50%; object-fit:cover;"/>
                                    </a>
                                    @endrole
                                </div>

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


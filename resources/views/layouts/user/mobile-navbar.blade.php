<div class="responsive-navbar offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="navbarOffcanvas">
    <div class="offcanvas-header">
        <a href="/" class="logo d-inline-block">
            <img class="logo-light" src="{{asset('assets/img/logo-getmedia.png')}}" alt="logo" />
            <img class="logo-dark" src="{{asset('assets/img/logo-get-media.png')}}" alt="logo" />
        </a>

        <button type="button" class="close-btn" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="ri-close-line"></i>
        </button>
    </div>
    <div class="offcanvas-body">
        <div class="accordion" id="navbarAccordion">
            @foreach ($categories as $category)
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{$loop->index}}" aria-expanded="false" aria-controls="collapse{{$loop->index}}">{{$categories[$loop->index]->name}}</button>
                        <div id="collapse{{$loop->index}}" class="accordion-collapse collapse" data-bs-parent="#navbarAccordion{{$loop->index}}">
                            <div class="accordion-body">
                                <div class="accordion" id="navbarAccordion{{$loop->index}}">
                                    @forelse ($categories[$loop->index]->subCategories as $subCategory)
                                        <div class="accordion-item">
                                            <a href="{{ route('subcategories.show.user', ['category' => $subCategory->category->slug,'subCategory' => $subCategory->slug]) }}" class="accordion-link">
                                                {{ $subCategory->name }}</a>
                                        </div>
                                    @empty
                                        <div class="accordion-item">
                                            <a href="{{ route('categories.show.user', ['category' => $category->slug]) }}" class="accordion-link">{{ $category->name }}</a>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>

        <div class="offcanvas-contact-info">
            <div class="accordion">
                <div class="accordion-item">
                    <a href="/aboutus" class="accordion-link">
                        <p><b>Tentang Kami</b></p>
                    </a>
                </div>
                <div class="accordion-item">
                    <a href="/contact-us" class="accordion-link">
                        <p><b>Hubungi Kami</b></p>
                    </a>
                </div>
                <div class="accordion-item">
                    <a href="/author" class="accordion-link">
                        <p><b>Penulis</b></p>
                    </a>
                </div>
            </div>
        </div>

        <div class="offcanvas-contact-info">

            @auth
                <div class="row">
                    <div class="col-lg-3 col-md-12">
                        <div class="">
                            <ul class="navbar-nav mx-auto">
                                <div class="news-card-img mb-2 ms-2" style="padding-right: 0px;">
                                    @role('author')
                                    <a href="{{ route('profile.index') }}">
                                        <img src="{{ asset( Auth::user()->photo ? 'storage/'.Auth::user()->photo : "default.png")  }}" alt="Image" width="55px" height="55px" style="border-radius: 50%; object-fit:cover;"/>
                                    </a>
                                    @endrole
                                    @role('user')
                                    <a href="{{ route('profile.user') }}">
                                        <img src="{{ asset( Auth::user()->photo ? 'storage/'.Auth::user()->photo : "default.png")  }}" alt="Image" width="55px" height="55px" style="border-radius: 50%; object-fit:cover;"/>
                                    </a>
                                    @endrole
                                    @role('admin')
                                    <a href="/dashboard">
                                        <img src="{{ asset( Auth::user()->photo ? 'storage/'.Auth::user()->photo : "default.png")  }}" alt="Image" width="55px" height="55px" style="border-radius: 50%; object-fit:cover;"/>
                                    </a>
                                    @endrole
                                </div>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <div class=""><p style="line-height: 0px;" class="mt-3"><b>{{ auth()->user()->name }}</b></p></div>
                        <div class=""><p class="d-inline-block text-truncate" style="font-size: 14px;max-width: 150px;">{{ auth()->user()->email }}</p></div>
                    </div>
                    <div class="col-lg-1 col-md-12">
                        <div class="d-flex justify-content-end">
                            @role('author')
                                    <a href="{{ route('profile.index') }}" class="btn btn-sm" style="background-color: #175A95">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="23"
                                            viewBox="0 0 512 512">
                                            <path fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="32"
                                                d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 0 0-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 0 0 0-17.47C428.89 172.28 347.8 112 255.66 112" />
                                            <circle cx="256" cy="256" r="80" fill="none" stroke="#ffffff"
                                                stroke-miterlimit="10" stroke-width="32" />
                                        </svg>
                                    </a>
                                    @endrole
                                    @role('user')
                                    <a href="{{ route('profile.user') }}" class="btn btn-sm" style="background-color: #175A95">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="23"
                                            viewBox="0 0 512 512">
                                            <path fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="32"
                                                d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 0 0-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 0 0 0-17.47C428.89 172.28 347.8 112 255.66 112" />
                                            <circle cx="256" cy="256" r="80" fill="none" stroke="#ffffff"
                                                stroke-miterlimit="10" stroke-width="32" />
                                        </svg>
                                    </a>
                                    @endrole
                                    @role('admin')
                                    <a href="/dashboard" class="btn btn-sm" style="background-color: #175A95">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="23"
                                            viewBox="0 0 512 512">
                                            <path fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="32"
                                                d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 0 0-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 0 0 0-17.47C428.89 172.28 347.8 112 255.66 112" />
                                            <circle cx="256" cy="256" r="80" fill="none" stroke="#ffffff"
                                                stroke-miterlimit="10" stroke-width="32" />
                                        </svg>
                                    </a>
                            @endrole
                        </div>
                    </div>
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
</div>

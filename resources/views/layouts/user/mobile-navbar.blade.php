<div class="responsive-navbar offcanvas offcanvas-end" data-bs-backdrop="static" tabindex="-1" id="navbarOffcanvas">
    <div class="offcanvas-header">
        <a href="index.html" class="logo d-inline-block">
            <img class="logo-light" src="{{asset('assets/img/logo-getmedia-dark.svg')}}" alt="logo" />
            {{-- <img class="logo-dark" src="assets/img/logo-get-media.png" alt="logo" /> --}}
        </a>
        <button type="button" class="close-btn" data-bs-dismiss="offcanvas" aria-label="Close">
            <i class="ri-close-line"></i>
        </button>
    </div>
    <div class="offcanvas-body">
        <div class="accordion" id="navbarAccordion">
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

            <div class="accordion-item">
                <button class="accordion-button collapsed active" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Home</button>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#navbarAccordion">
                    <div class="accordion-body">
                        <div class="accordion" id="navbarAccordion2">
                            <div class="accordion-item">
                                <a class="accordion-link active" href="index.html"> Home Demo One </a>
                            </div>
                            <div class="accordion-item">
                                <a class="accordion-link" href="index-2.html"> Home Demo Two </a>
                            </div>
                            <div class="accordion-item">
                                <a class="accordion-link" href="index-3.html"> Home Demo Three </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapbaxour" aria-expanded="false" aria-controls="collapbaxour">Pages</button>
                <div id="collapbaxour" class="accordion-collapse collapse" data-bs-parent="#navbarAccordion">
                    <div class="accordion-body">
                        <div class="accordion" id="navbarAccordion45">
                            <div class="accordion-item">
                                <a class="accordion-link" href="about.html"> About Us </a>
                            </div>
                            <div class="accordion-item">
                                <a class="accordion-link" href="contact.html"> Contact Us </a>
                            </div>
                            <div class="accordion-item">
                                <a href="team.html" class="accordion-link"> Team </a>
                            </div>
                            <div class="accordion-item">
                                <a href="author.html" class="accordion-link"> Author </a>
                            </div>
                            <div class="accordion-item">
                                <a href="privacy-policy.html" class="accordion-link"> Privacy Policy </a>
                            </div>
                            <div class="accordion-item">
                                <a href="terms-conditions.html" class="accordion-link"> Terms & Conditions </a>
                            </div>
                            <div class="accordion-item">
                                <a href="error-404.html" class="accordion-link"> 404 Error Page </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Business</button>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#navbarAccordion">
                    <div class="accordion-body">
                        <div class="accordion" id="navbarAccordion7">
                            <div class="accordion-item">
                                <a href="business.html" class="accordion-link"> Business News </a>
                            </div>
                            <div class="accordion-item">
                                <a href="business-details.html" class="accordion-link"> Business News Details </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseThree" aria-expanded="false"
                    aria-controls="collapseThree">Politics</button>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#navbarAccordion">
                    <div class="accordion-body">
                        <div class="accordion" id="navbarAccordion30">
                            <div class="accordion-item">
                                <a href="politics.html" class="accordion-link"> Political News </a>
                            </div>
                            <div class="accordion-item">
                                <a href="politics-details.html" class="accordion-link"> Political News Details </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Video</button>
                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#navbarAccordion">
                    <div class="accordion-body">
                        <div class="accordion" id="navbarAccordion11">
                            <div class="accordion-item">
                                <a href="featured-video.html" class="accordion-link"> Featured Video </a>
                            </div>
                            <div class="accordion-item">
                                <a href="featured-video-details.html" class="accordion-link"> Featured Video Details
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseFourth" aria-expanded="false"
                    aria-controls="collapseFourth">Sports</button>
                <div id="collapseFourth" class="accordion-collapse collapse" data-bs-parent="#navbarAccordion">
                    <div class="accordion-body">
                        <div class="accordion" id="navbarAccordion111">
                            <div class="accordion-item">
                                <a href="sports.html" class="accordion-link"> Sports News </a>
                            </div>
                            <div class="accordion-item">
                                <a href="sports-details.html" class="accordion-link"> Sports News Details </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">Shop</button>
                <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#navbarAccordion">
                    <div class="accordion-body">
                        <div class="accordion" id="navbarAccordion70">
                            <div class="accordion-item">
                                <a href="shop-grid.html" class="accordion-link"> Shop Grid </a>
                            </div>
                            <div class="accordion-item">
                                <a href="shop-left-sidebar.html" class="accordion-link"> Shop Left Sidebar </a>
                            </div>
                            <div class="accordion-item">
                                <a href="shop-right-sidebar.html" class="accordion-link"> Shop Right Sidebar </a>
                            </div>
                            <div class="accordion-item">
                                <a href="shop-details.html" class="accordion-link"> Shop Details </a>
                            </div>
                            <div class="accordion-item">
                                <a href="cart.html" class="accordion-link"> Cart </a>
                            </div>
                            <div class="accordion-item">
                                <a href="wishlist.html" class="accordion-link"> Wishlist </a>
                            </div>
                            <div class="accordion-item">
                                <a href="checkout.html" class="accordion-link"> Checkout </a>
                            </div>
                            <div class="accordion-item">
                                <a href="login.html" class="accordion-link"> Login </a>
                            </div>
                            <div class="accordion-item">
                                <a href="signup.html" class="accordion-link"> Sign Up </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="offcanvas-contact-info">
            <h4>Contact Info</h4>
            <ul class="contact-info list-style">
                <li>
                    <i class="ri-map-pin-fill"></i>
                    <p>28/A Street, New York, USA</p>
                </li>
                <li>
                    <i class="ri-mail-fill"></i>
                    <a
                        href="https://templates.hibootstrap.com/cdn-cgi/l/email-protection#9df5f8f1f1f2ddfffce5f2b3fef2f0"><span
                            class="__cf_email__"
                            data-cfemail="fa929f969695ba989b8295d4999597">[email&#160;protected]</span></a>
                </li>
                <li>
                    <i class="ri-phone-fill"></i>
                    <a href="tel:1800123456789">+1 800 123 456 789</a>
                </li>
            </ul>
            <ul class="social-profile list-style">
                <li>
                    <a href="https://www.fb.com/" target="_blank"><i class="ri-facebook-fill"></i></a>
                </li>
                <li>
                    <a href="https://www.instagram.com/" target="_blank"><i class="ri-instagram-line"></i></a>
                </li>
                <li>
                    <a href="https://www.linkedin.com/" target="_blank"><i class="ri-linkedin-fill"></i></a>
                </li>
                <li>
                    <a href="https://www.twitter.com/" target="_blank"><i class="ri-twitter-fill"></i></a>
                </li>
            </ul>
        </div> --}}
        <div class="others-option d-flex d-lg-none align-items-center">
            <div class="option-item">
                <a href="login.html" class="btn-two">Sign In</a>
            </div>
        </div>
    </div>
</div>

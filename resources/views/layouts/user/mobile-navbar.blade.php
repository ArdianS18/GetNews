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
            @foreach ($categories as $category)
                    @for ($i = 7; $i < $categories->count(); $i++)
                    <div class="accordion-item">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapse{{$i}}" aria-expanded="false" aria-controls="collapse{{$i}}">{{$categories[$i]->name}}</button>
                        <div id="collapse{{$i}}" class="accordion-collapse collapse" data-bs-parent="#navbarAccordion{{$i}}">
                            <div class="accordion-body">
                                <div class="accordion" id="navbarAccordion{{$i}}">
                                    @foreach ($categories[$i]->subCategories as $subCategory)
                                        <div class="accordion-item">
                                            <a class="accordion-link" href="{{ route('subcategories.show.user', ['category'=>$subCategory->category->slug,'subCategory' => $subCategory->name]) }}">{{ $subCategory->name }}</a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    @endfor
                    @break
            @endforeach
        </div>
        <div class="offcanvas-contact-info">
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
        </div>
        <div class="others-option d-flex d-lg-none align-items-center">
            <div class="option-item">
                <a href="login.html" class="btn-two">Sign In</a>
            </div>
        </div>
    </div>
</div>

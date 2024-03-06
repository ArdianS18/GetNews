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
                                <a href="team.html" class="nav-link"> Team </a>
                            </li>
                            <li class="nav-item">
                                <a href="author.html" class="nav-link"> Author </a>
                            </li>
                            <li class="nav-item">
                                <a href="privacy-policy.html" class="nav-link"> Privacy Policy </a>
                            </li>
                            <li class="nav-item">
                                <a href="terms-conditions.html" class="nav-link"> Terms & Conditions </a>
                            </li>
                            <li class="nav-item">
                                <a href="error-404.html" class="nav-link"> 404 Error Page </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link"> About Us </a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a href="business.html" class="nav-link"> Business News </a>
                            </li>
                            <li class="nav-item">
                                <a href="business-details.html" class="nav-link"> Business News Details </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link"> Contact Us </a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a href="politics.html" class="nav-link"> Political News </a>
                            </li>
                            <li class="nav-item">
                                <a href="politics-details.html" class="nav-link"> Political News Details </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0)" class="nav-link"> Author </a>
                        <ul class="dropdown-menu">
                            <li class="nav-item">
                                <a href="featured-video.html" class="nav-link"> Featured Video </a>
                            </li>
                            <li class="nav-item">
                                <a href="featured-video-details.html" class="nav-link"> Featured Video Details </a>
                            </li>
                        </ul>
                    </li>
                   
                </ul>
                <div class="others-option d-flex align-items-center" id="loginSection">
                    <div class="news-card-img" style="padding-right: 50px;">
                        <img src="{{ asset('assets/img/news/trending-3.webp') }}" alt="Image" width="45px" style="border-radius: 50%;"/>
                    </div>
                
                    <div class="">
                        <div class="option-item">
                            <a href="login.html" class="btn-two" id="signInBtn">Sign In</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>


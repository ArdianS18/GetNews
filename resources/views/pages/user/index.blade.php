@extends('layouts.user.app')

@section('content')
    
<div class="">
        <div class="container-fluid">
        <div class="trending-news-box">
            <div class="row gx-5">
                <div class="col-xxl-12 col-xl-3 col-lg-3 col-md-4 d-flex justify-content-center">
                    <div class="trending-prev" style="margin-right: 2%;"><i class="flaticon-left-arrow"></i></div>                 
                    <h4>Trending Now</h4>
                    <div class="trending-next" style="margin-left: 2%;"><i class="flaticon-right-arrow"></i></div>
                </div>
                <div class="col-xxl-12 col-xl-9 col-lg-9 col-md-8">
                    <div class="trending-news-slider swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide news-card-one">
                                <div class="news-card-img-dashboard">
                                    <img src="assets/img/news/trending-1.webp" alt="Image" />
                                </div>
                                <div class="news-card-info">
                                    <h3><a href="business-details.html">Climate Change & Your Future Health</a></h3>
                                    <ul class="news-metainfo list-style">
                                        <li><i class="fi fi-rr-clock-three"></i>15 Min Read</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="swiper-slide news-card-one">
                                <div class="news-card-img-dashboard">
                                    <img src="assets/img/news/trending-2.webp" alt="Image" />
                                </div>
                                <div class="news-card-info">
                                    <h3><a href="business-details.html">Female Hawks Win $10,000 Funding Boost</a></h3>
                                    <ul class="news-metainfo list-style">
                                        <li><i class="fi fi-rr-clock-three"></i>10 Min Read</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="swiper-slide news-card-one">
                                <div class="news-card-img-dashboard">
                                    <img src="assets/img/news/trending-3.webp" alt="Image" />
                                </div>
                                <div class="news-card-info">
                                    <h3><a href="business-details.html">Goodwin Must Break Clarkson Hold</a></h3>
                                    <ul class="news-metainfo list-style">
                                        <li><i class="fi fi-rr-clock-three"></i>8 Min Read</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="swiper-slide news-card-one">
                                <div class="news-card-img-dashboard">
                                    <img src="assets/img/news/trending-4.webp" alt="Image" />
                                </div>
                                <div class="news-card-info">
                                    <h3><a href="business-details.html">Major GWC Collection Is Coming To QVC</a></h3>
                                    <ul class="news-metainfo list-style">
                                        <li><i class="fi fi-rr-clock-three"></i>12 Min Read</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid pb-75">
        <div class="news-col-wrap">
            <div class="news-col-one">
                <div class="news-card-two">
                    <div class="news-card-img">
                        <img src="assets/img/news/news-1.webp" alt="Image" />
                        <a href="business.html" class="news-cat">Politics</a>
                    </div>
                    <div class="news-card-info">
                        <h3><a href="business-details.html">What The Federal Infrastructure Package Means For Minnesota</a></h3>
                        <ul class="news-metainfo list-style">
                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 25, 2023</a></li>
                            <li><i class="fi fi-rr-clock-three"></i>10 Min Read</li>
                        </ul>
                    </div>
                </div>
                <div class="news-card-three">
                    <div class="news-card-img">
                        <img src="assets/img/news/news-3.webp" alt="Image" />
                    </div>
                    <div class="news-card-info">
                        <a href="business.html" class="news-cat">Fashion</a>
                        <h3><a href="business-details.html">How To Recreate The High Pony-tail That Celebrities Love</a></h3>
                        <ul class="news-metainfo list-style">
                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 15, 2023</a></li>
                            <li><i class="fi fi-rr-clock-three"></i>11 Min Read</li>
                        </ul>
                    </div>
                </div>
                <div class="news-card-three">
                    <div class="news-card-img">
                        <img src="assets/img/news/news-4.webp" alt="Image" />
                    </div>
                    <div class="news-card-info">
                        <a href="business.html" class="news-cat">Fashion</a>
                        <h3><a href="business-details.html">Tempores Imperdiet Rhoncus Ipsam Lobortis Kolats.</a></h3>
                        <ul class="news-metainfo list-style">
                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 14, 2023</a></li>
                            <li><i class="fi fi-rr-clock-three"></i>10 Min Read</li>
                        </ul>
                    </div>
                </div>
                <div class="news-card-three">
                    <div class="news-card-img">
                        <img src="assets/img/news/news-5.webp" alt="Image" />
                    </div>
                    <div class="news-card-info">
                        <a href="business.html" class="news-cat">Fashion</a>
                        <h3><a href="business-details.html">Beauty Queens Need Beauty Material & Products</a></h3>
                        <ul class="news-metainfo list-style">
                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 10, 2023</a></li>
                            <li><i class="fi fi-rr-clock-three"></i>8 Min Read</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="news-col-two">
                <div class="news-card-four">
                    <img src="assets/img/news/news-58.webp" alt="Image" />
                    <div class="news-card-info">
                        <h3><a href="business-details.html">Best VR Headsets For PC And Gaming This Year</a></h3>
                        <ul class="news-metainfo list-style">
                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 08, 2023</a></li>
                            <li><i class="fi fi-rr-clock-three"></i>14 Min Read</li>
                        </ul>
                    </div>
                </div>
                <div class="news-card-five">
                    <div class="news-card-img">
                        <img src="assets/img/news/news-59.webp" alt="Image" />
                        <a href="business.html" class="news-cat">Fashion</a>
                    </div>
                    <div class="news-card-info">
                        <h3><a href="business-details.html">Man Wearing Black Pullover Hoodie To Smoke Light In</a></h3>
                        <p>Lorem ipsum or lipsum as it is sometmes known is dum text used in laying print, graphic or web desi…</p>
                        <ul class="news-metainfo list-style">
                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 08, 2023</a></li>
                            <li><i class="fi fi-rr-clock-three"></i>10 Min Read</li>
                        </ul>
                    </div>
                </div>
                <div class="news-card-five">
                    <div class="news-card-img">
                        <img src="assets/img/news/news-60.webp" alt="Image" />
                        <a href="business.html" class="news-cat">Travel</a>
                    </div>
                    <div class="news-card-info">
                        <h3><a href="business-details.html">Selective Focus Photography Of Orange Fox Life</a></h3>
                        <p>Lorem ipsum or lipsum as it is sometmes known is dum text used in laying print, graphic or web desi…</p>
                        <ul class="news-metainfo list-style">
                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 03, 2023</a></li>
                            <li><i class="fi fi-rr-clock-three"></i>11 Min Read</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="news-col-three">
                <div class="news-card-two">
                    <div class="news-card-img">
                        <img src="assets/img/news/news-2.webp" alt="Image" />
                        <a href="business.html" class="news-cat">Politics</a>
                    </div>
                    <div class="news-card-info">
                        <h3><a href="business-details.html">Elijah James: The Nashville Photographer Shares Her Unique Journey</a></h3>
                        <ul class="news-metainfo list-style">
                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Apr 03, 2023</a></li>
                            <li><i class="fi fi-rr-clock-three"></i>12 Min Read</li>
                        </ul>
                    </div>
                </div>
                <div class="news-card-three">
                    <div class="news-card-img">
                        <img src="assets/img/news/news-7.webp" alt="Image" />
                    </div>
                    <div class="news-card-info">
                        <a href="business.html" class="news-cat">Travel</a>
                        <h3><a href="business-details.html">A Complimentary Day At Mandarin The Oriental</a></h3>
                        <ul class="news-metainfo list-style">
                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Mar 15, 2023</a></li>
                            <li><i class="fi fi-rr-clock-three"></i>10 Min Read</li>
                        </ul>
                    </div>
                </div>
                <div class="news-card-three">
                    <div class="news-card-img">
                        <img src="assets/img/news/news-6.webp" alt="Image" />
                    </div>
                    <div class="news-card-info">
                        <a href="business.html" class="news-cat">Business</a>
                        <h3><a href="business-details.html">First Prototype Flight Using Kinetic Launch System</a></h3>
                        <ul class="news-metainfo list-style">
                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 22, 2023</a></li>
                            <li><i class="fi fi-rr-clock-three"></i>8 Min Read</li>
                        </ul>
                    </div>
                </div>
                <div class="news-card-three">
                    <div class="news-card-img">
                        <img src="assets/img/news/news-8.webp" alt="Image" />
                    </div>
                    <div class="news-card-info">
                        <a href="business.html" class="news-cat">Health</a>
                        <h3><a href="business-details.html">Life Health Continues To Spread Rapidly, Are Many People</a></h3>
                        <ul class="news-metainfo list-style">
                            <li><i class="fi fi-rr-calendar-minus"></i><a href="news-by-date.html">Feb 15, 2023</a></li>
                            <li><i class="fi fi-rr-clock-three"></i>10 Min Read</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@extends('layouts.user.app')

@section('style')
<style>
    .card-detail{
        box-shadow: 0  5px 2px rgba(0, 0, 0, 0.1);
        border: 1px solid #f4f4f4; 
        padding: 2%;
        border-radius: 10px;
        /* width: 400px;
        height: 130px; */
    }
    .card-category{
        box-shadow: 0  5px 2px rgba(0, 0, 0, 0.1);
        border: 1px solid #f4f4f4; 
        padding: 4%;
        border-radius: 10px;   
    }
</style>
@endsection

@section('content')
    <div class="ps-5 pe-5">
        <div class="">
            <div class="card shadow-sm p-5 mt-5">
                <div class="row">
                    <div class="col-md-12 col-lg-1">
                        <img src="assets/img/news/trending-3.webp" alt="Image" width="130px" style="border-radius: 50%;"/>
                    </div>
                    <div class="col-md-12 col-lg-11">
                        <div class="">
                            <div class="d-flex">
                                <h3>Daffa Prasetya</h3>
                                <div class="" style="">
                                    <button class="btn btn-sm ms-3 text-white px-5" style="background-color: #0F4D8A;">Ikuti</button>
                                </div>
                            </div>
                            
                            <div class="col-10">
                                <p class="fs-6">lorem oancone o nicygiu  IVisu ub oiiuhcc oajicomec uhceb  lorem oancone o nicygiu  IVisu ub oii IVisu ub oiiuhcc oajicomec uhceb  lorem oancone o nicygiu  IVisu ub oiiuhcc oajicomec uhceb  aiuhec...</p>
                            </div>
                            <div class="d-flex justify-content-between">

                                <div class="d-flex">
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 512 512"><path d="M288 192v-38.1c0-17.2 3.8-25.9 30.5-25.9H352V64h-55.9c-68.5 0-91.1 31.4-91.1 85.3V192h-45v64h45v192h83V256h56.4l7.6-64h-64z" fill="currentColor"/></svg>
                                    </a>
                                    <a href="#" class="ms-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" style="margin-left: 10px;" width="23" height="23" viewBox="0 0 512 512"><path fill="currentColor" d="M349.33 69.33a93.62 93.62 0 0 1 93.34 93.34v186.66a93.62 93.62 0 0 1-93.34 93.34H162.67a93.62 93.62 0 0 1-93.34-93.34V162.67a93.62 93.62 0 0 1 93.34-93.34zm0-37.33H162.67C90.8 32 32 90.8 32 162.67v186.66C32 421.2 90.8 480 162.67 480h186.66C421.2 480 480 421.2 480 349.33V162.67C480 90.8 421.2 32 349.33 32"/><path fill="currentColor" d="M377.33 162.67a28 28 0 1 1 28-28a27.94 27.94 0 0 1-28 28M256 181.33A74.67 74.67 0 1 1 181.33 256A74.75 74.75 0 0 1 256 181.33m0-37.33a112 112 0 1 0 112 112a112 112 0 0 0-112-112"/></svg>
                                    </a>
                                    <a href="#" class="ms-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" style="margin-left: 10px;" width="23" height="23" viewBox="0 0 512 512"><path fill="currentColor" d="M496 109.5a201.8 201.8 0 0 1-56.55 15.3a97.51 97.51 0 0 0 43.33-53.6a197.74 197.74 0 0 1-62.56 23.5A99.14 99.14 0 0 0 348.31 64c-54.42 0-98.46 43.4-98.46 96.9a93.21 93.21 0 0 0 2.54 22.1a280.7 280.7 0 0 1-203-101.3A95.69 95.69 0 0 0 36 130.4c0 33.6 17.53 63.3 44 80.7A97.5 97.5 0 0 1 35.22 199v1.2c0 47 34 86.1 79 95a100.76 100.76 0 0 1-25.94 3.4a94.38 94.38 0 0 1-18.51-1.8c12.51 38.5 48.92 66.5 92.05 67.3A199.59 199.59 0 0 1 39.5 405.6a203 203 0 0 1-23.5-1.4A278.68 278.68 0 0 0 166.74 448c181.36 0 280.44-147.7 280.44-275.8c0-4.2-.11-8.4-.31-12.5A198.48 198.48 0 0 0 496 109.5"/></svg>
                                    </a>
                                    <a href="#" class="ms-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" style="margin-left: 10px;" width="25" height="25" viewBox="0 0 512 512"><path d="M182.8 384V212.9h-54.9V384h54.9zm-25.4-197c18.3 0 29.7-13.1 29.7-29.5-.3-16.7-11.4-29.5-29.4-29.5S128 140.8 128 157.5c0 16.4 11.4 29.5 29 29.5h.4z" fill-rule="evenodd" clip-rule="evenodd" fill="currentColor"/><path d="M320.6 209c-29.1 0-41.6 16.4-49.6 27.8V213h-55v171h55v-97.4c0-5 .4-10 1.9-13.5 4-10 13-20.3 28.2-20.3 19.9 0 27.9 15.3 27.9 37.7V384h55v-99.9c0-51.3-27.2-75.1-63.4-75.1z" fill-rule="evenodd" clip-rule="evenodd" fill="currentColor"/><path d="M417.2 64H96.8C79.3 64 64 76.6 64 93.9V415c0 17.4 15.3 32.9 32.8 32.9h320.3c17.6 0 30.8-15.6 30.8-32.9V93.9C448 76.6 434.7 64 417.2 64zM414 416H99.1c-1.8 0-3.1-1.4-3.1-3.1V98c0-1.1 1-2 2-2h316c1 0 2 1 2 2v316c0 .9-.9 2-2 2z" fill="currentColor"/></svg>
                                    </a>
                                </div>
        
                                <div class="d-flex">
                                    <button class="btn btn-sm text-black px-5" style="background-color: #D9D9D9;">40 Berita</button>
                                    <button class="btn btn-sm ms-3 text-black px-5" style="background-color: #D9D9D9;">50 Coments</button>
                                </div>
        
                            </div>

                        </div>

                    </div>
                </div>

                    
                

                
            </div>
        </div>

        <div class="card shadow-sm p-4 ps-5 pe-5 mt-5 mb-5">
            <div class="row">
                <div class="col-md-12 col-lg-8" style="padding: 2%;">
                    <div class="sidebar-widget">
                        <h3 class="sidebar-widget-title">Berita Penulis</h3>
                            <div class="pp-post-wrap">
                                {{-- <div class="row">
                                    <div class="col-2">
                                        <img src="assets/img/news/news-thumb-5.webp" class="" width="200px" height="100px" style="object-fit: cover" alt="Image">
                                    </div>
                                    <div class="col-10">
                                        <b><a href="business-details.html">How Youth Viral Diseases May The Year 2023</a></b>
                                        <ul class="news-metainfo list-style">
                                        <li>
                                            <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512"><path d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z" fill="#0F4D8A"/>
                                            </svg></i><a href="news-by-date.html">Mar 03, 2023</a></li>
                
                                            <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512"><path d="M198 448h172c15.7 0 28.6-9.6 34.2-23.4l57.1-135.4c1.7-4.4 2.6-9 2.6-14v-38.6c0-21.1-17-44.6-37.8-44.6H306.9l18-81.5.6-6c0-7.9-3.2-15.1-8.3-20.3L297 64 171 191.3c-6.8 6.9-11 16.5-11 27.1v192c0 21.1 17.2 37.6 38 37.6z" fill="#0F4D8A"/><path d="M48 224h64v224H48z" fill="#0F4D8A"/></svg>
                                            </i><a href="news-by-date.html">1.203</a></li>
                
                                        </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-2">
                                        <img src="assets/img/news/news-thumb-5.webp" class="" width="200px" height="100px" style="object-fit: cover" alt="Image">
                                    </div>
                                    <div class="col-10">
                                        <b><a href="business-details.html">How Youth Viral Diseases May The Year 2023</a></b>
                                        <ul class="news-metainfo list-style">
                                        <li>
                                            <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512"><path d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z" fill="#0F4D8A"/>
                                            </svg></i><a href="news-by-date.html">Mar 03, 2023</a></li>
                
                                            <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512"><path d="M198 448h172c15.7 0 28.6-9.6 34.2-23.4l57.1-135.4c1.7-4.4 2.6-9 2.6-14v-38.6c0-21.1-17-44.6-37.8-44.6H306.9l18-81.5.6-6c0-7.9-3.2-15.1-8.3-20.3L297 64 171 191.3c-6.8 6.9-11 16.5-11 27.1v192c0 21.1 17.2 37.6 38 37.6z" fill="#0F4D8A"/><path d="M48 224h64v224H48z" fill="#0F4D8A"/></svg>
                                            </i><a href="news-by-date.html">1.203</a></li>
                
                                        </li>
                                        </ul>
                                    </div>
                                </div> --}}
                                <div class="row mt-3">
                                    <div class="col-3">
                                        <img src="assets/img/news/news-thumb-5.webp" class="w-100" width="230px" height="160px" style="object-fit: cover" alt="Image">
                                    </div>
                                    <div class="col-9">
                                        <h5>How Youth Viral Diseases May The Year 2023</h5>

                                        <div class="col-9">
                                            <p>Lorem ipsum or lipsum as it is sometmes known is dum text used in laying print, graphic or web desi…</p>
                                        </div>
                                        <ul class="news-metainfo list-style">
                                        <li>
                                            <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512"><path d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z" fill="#0F4D8A"/>
                                            </svg></i><a href="news-by-date.html">Mar 03, 2023</a></li>
                
                                            <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512"><path d="M198 448h172c15.7 0 28.6-9.6 34.2-23.4l57.1-135.4c1.7-4.4 2.6-9 2.6-14v-38.6c0-21.1-17-44.6-37.8-44.6H306.9l18-81.5.6-6c0-7.9-3.2-15.1-8.3-20.3L297 64 171 191.3c-6.8 6.9-11 16.5-11 27.1v192c0 21.1 17.2 37.6 38 37.6z" fill="#0F4D8A"/><path d="M48 224h64v224H48z" fill="#0F4D8A"/></svg>
                                            </i><a href="news-by-date.html">1.203</a></li>
                
                                        </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-3">
                                        <img src="assets/img/news/news-thumb-5.webp" class="w-100" width="230px" height="160px" style="object-fit: cover" alt="Image">
                                    </div>
                                    <div class="col-9">
                                        <h5>How Youth Viral Diseases May The Year 2023</h5>

                                        <div class="col-9">
                                            <p>Lorem ipsum or lipsum as it is sometmes known is dum text used in laying print, graphic or web desi…</p>
                                        </div>
                                        <ul class="news-metainfo list-style">
                                        <li>
                                            <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512"><path d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z" fill="#0F4D8A"/>
                                            </svg></i><a href="news-by-date.html">Mar 03, 2023</a></li>
                
                                            <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512"><path d="M198 448h172c15.7 0 28.6-9.6 34.2-23.4l57.1-135.4c1.7-4.4 2.6-9 2.6-14v-38.6c0-21.1-17-44.6-37.8-44.6H306.9l18-81.5.6-6c0-7.9-3.2-15.1-8.3-20.3L297 64 171 191.3c-6.8 6.9-11 16.5-11 27.1v192c0 21.1 17.2 37.6 38 37.6z" fill="#0F4D8A"/><path d="M48 224h64v224H48z" fill="#0F4D8A"/></svg>
                                            </i><a href="news-by-date.html">1.203</a></li>
                
                                        </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-3">
                                        <img src="assets/img/news/news-thumb-5.webp" class="w-100" width="230px" height="160px" style="object-fit: cover" alt="Image">
                                    </div>
                                    <div class="col-9">
                                        <h5>How Youth Viral Diseases May The Year 2023</h5>

                                        <div class="col-9">
                                            <p>Lorem ipsum or lipsum as it is sometmes known is dum text used in laying print, graphic or web desi…</p>
                                        </div>
                                        <ul class="news-metainfo list-style">
                                        <li>
                                            <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512"><path d="M368.005 272h-96v96h96v-96zm-32-208v32h-160V64h-48v32h-24.01c-22.002 0-40 17.998-40 40v272c0 22.002 17.998 40 40 40h304.01c22.002 0 40-17.998 40-40V136c0-22.002-17.998-40-40-40h-24V64h-48zm72 344h-304.01V196h304.01v212z" fill="#0F4D8A"/>
                                            </svg></i><a href="news-by-date.html">Mar 03, 2023</a></li>
                
                                            <i><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512"><path d="M198 448h172c15.7 0 28.6-9.6 34.2-23.4l57.1-135.4c1.7-4.4 2.6-9 2.6-14v-38.6c0-21.1-17-44.6-37.8-44.6H306.9l18-81.5.6-6c0-7.9-3.2-15.1-8.3-20.3L297 64 171 191.3c-6.8 6.9-11 16.5-11 27.1v192c0 21.1 17.2 37.6 38 37.6z" fill="#0F4D8A"/><path d="M48 224h64v224H48z" fill="#0F4D8A"/></svg>
                                            </i><a href="news-by-date.html">1.203</a></li>
                
                                        </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                
                
                
                
                    </div>
                </div>
        
                <div class="col-md-12 col-lg-4">
                    <div class="" style="padding: 2%;">
                        <div class="card-category">
                            <h3 class="sidebar-widget-title">Kategori</h3>
                            <ul class="category-widget list-style">
                            {{-- <li><a href="business.html"><img src="assets/img/icons/arrow-right.svg" alt="Image"><span>(6)</span></a></li> --}}
                            <li><a href="business.html"><img src="assets/img/icons/arrow-right.svg" alt="Image">Culture<span>(3)</span></a></li>
                            <li><a href="business.html"><img src="assets/img/icons/arrow-right.svg" alt="Image">Fashion<span>(2)</span></a></li>
                            <li><a href="business.html"><img src="assets/img/icons/arrow-right.svg" alt="Image">Inspiration<span>(8)</span></a></li>
                            <li><a href="business.html"><img src="assets/img/icons/arrow-right.svg" alt="Image">Lifestyle<span>(6)</span></a></li>
                            <li><a href="business.html"><img src="assets/img/icons/arrow-right.svg" alt="Image">Politics<span>(2)</span></a></li>
                            <li><a href="business.html"><img src="assets/img/icons/arrow-right.svg" alt="Image">Trending<span>(4)</span></a></li>
                            </ul>
                        </div>
                        
                        <div class="sidebar mt-5">
                            <div class="sidebar-widget" style="height: 200px">
                                <h3 class="sidebar-widget-title">iklan</h3>
                            </div>
                        </div>
                 
                    </div>

                    
                </div>



            </div>
        </div>
        
    </div>
@endsection
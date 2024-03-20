@extends('layouts.user.app')

@section('style')
    <style>
        .news-card-post{
            box-shadow: 0  5px 2px rgba(0, 0, 0, 0.1);
            border: 1px solid #f4f4f4;
            padding: 2%;
            border-radius: 10px;
        }
    </style>
@endsection

@section('content')
    <div class="mb-3 row">
        <div class="col-3">
            <form>
                <div class="input-group">
                    <input type="text" name="query" class="form-control search-chat py-2 px-5 ps-5" placeholder="Search">
                    <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                    <button type="submit" style="background-color: #C7C7C7;" class="btn btn-sm text-black px-4">Cari</button>
                </div>
            </form>     
        </div>    
    </div>

    <div class="">
        <div class="row news-card-post">
            <div class="col-md-12 col-lg-4 mb-4">
                <div class="">
                    <div class="news-card-five">
                        <div class="news-card-img">
                            <img src="assets/img/news/news-9.webp" alt="Image">
                            <a href="business.html" class="news-cat">Lifestyle</a>
                        </div>
                        <div class="news-card-info">
                            <h3><a href="business-details.html">Good Day To Take A Photo</a></h3>
                            <p>Lorem ipsum or lipsum as it is sometmes known is </p>
                            <div class="d-flex">
                                <div class="d-flex">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="mt-2" width="20" height="20" viewBox="0 0 24 24"><path fill="#0F4D8A" d="M5 22q-.825 0-1.412-.587T3 20V6q0-.825.588-1.412T5 4h1V2h2v2h8V2h2v2h1q.825 0 1.413.588T21 6v14q0 .825-.587 1.413T19 22zm0-2h14V10H5zM5 8h14V6H5zm0 0V6z"/></svg>
                                  <p class="ms-2">Apr 22,2023</p>
                                </div>
                                <div class="d-flex ms-4">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="mt-2" width="20" height="20" viewBox="0 0 24 24"><path fill="#434343" d="M21 8q.8 0 1.4.6T23 10v2q0 .175-.038.375t-.112.375l-3 7.05q-.225.5-.75.85T18 21h-8q-.825 0-1.412-.587T8 19V8.825q0-.4.163-.762t.437-.638l5.425-5.4q.375-.35.888-.425t.987.175q.475.25.688.7t.087.925L15.55 8zM4 21q-.825 0-1.412-.587T2 19v-9q0-.825.588-1.412T4 8q.825 0 1.413.588T6 10v9q0 .825-.587 1.413T4 21"/></svg>
                                  <p class="ms-2">1.203 </p>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4 mb-4">
                <div class="">
                    <div class="news-card-five">
                        <div class="news-card-img">
                            <img src="assets/img/news/news-9.webp" alt="Image">
                            <a href="business.html" class="news-cat">Lifestyle</a>
                        </div>
                        <div class="news-card-info">
                            <h3><a href="business-details.html">Good Day To Take A Photo</a></h3>
                            <p>Lorem ipsum or lipsum as it is sometmes known is </p>
                            <div class="d-flex">
                                <div class="d-flex">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="mt-2" width="20" height="20" viewBox="0 0 24 24"><path fill="#0F4D8A" d="M5 22q-.825 0-1.412-.587T3 20V6q0-.825.588-1.412T5 4h1V2h2v2h8V2h2v2h1q.825 0 1.413.588T21 6v14q0 .825-.587 1.413T19 22zm0-2h14V10H5zM5 8h14V6H5zm0 0V6z"/></svg>
                                  <p class="ms-2">Apr 22,2023</p>
                                </div>
                                <div class="d-flex ms-4">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="mt-2" width="20" height="20" viewBox="0 0 24 24"><path fill="#434343" d="M21 8q.8 0 1.4.6T23 10v2q0 .175-.038.375t-.112.375l-3 7.05q-.225.5-.75.85T18 21h-8q-.825 0-1.412-.587T8 19V8.825q0-.4.163-.762t.437-.638l5.425-5.4q.375-.35.888-.425t.987.175q.475.25.688.7t.087.925L15.55 8zM4 21q-.825 0-1.412-.587T2 19v-9q0-.825.588-1.412T4 8q.825 0 1.413.588T6 10v9q0 .825-.587 1.413T4 21"/></svg>
                                  <p class="ms-2">1.203 </p>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4 mb-4">
                <div class="">
                    <div class="news-card-five">
                        <div class="news-card-img">
                            <img src="assets/img/news/news-9.webp" alt="Image">
                            <a href="business.html" class="news-cat">Lifestyle</a>
                        </div>
                        <div class="news-card-info">
                            <h3><a href="business-details.html">Good Day To Take A Photo</a></h3>
                            <p>Lorem ipsum or lipsum as it is sometmes known is </p>
                            <div class="d-flex">
                                <div class="d-flex">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="mt-2" width="20" height="20" viewBox="0 0 24 24"><path fill="#0F4D8A" d="M5 22q-.825 0-1.412-.587T3 20V6q0-.825.588-1.412T5 4h1V2h2v2h8V2h2v2h1q.825 0 1.413.588T21 6v14q0 .825-.587 1.413T19 22zm0-2h14V10H5zM5 8h14V6H5zm0 0V6z"/></svg>
                                  <p class="ms-2">Apr 22,2023</p>
                                </div>
                                <div class="d-flex ms-4">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="mt-2" width="20" height="20" viewBox="0 0 24 24"><path fill="#434343" d="M21 8q.8 0 1.4.6T23 10v2q0 .175-.038.375t-.112.375l-3 7.05q-.225.5-.75.85T18 21h-8q-.825 0-1.412-.587T8 19V8.825q0-.4.163-.762t.437-.638l5.425-5.4q.375-.35.888-.425t.987.175q.475.25.688.7t.087.925L15.55 8zM4 21q-.825 0-1.412-.587T2 19v-9q0-.825.588-1.412T4 8q.825 0 1.413.588T6 10v9q0 .825-.587 1.413T4 21"/></svg>
                                  <p class="ms-2">1.203 </p>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4 mb-4">
                <div class="">
                    <div class="news-card-five">
                        <div class="news-card-img">
                            <img src="assets/img/news/news-9.webp" alt="Image">
                            <a href="business.html" class="news-cat">Lifestyle</a>
                        </div>
                        <div class="news-card-info">
                            <h3><a href="business-details.html">Good Day To Take A Photo</a></h3>
                            <p>Lorem ipsum or lipsum as it is sometmes known is </p>
                            <div class="d-flex">
                                <div class="d-flex">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="mt-2" width="20" height="20" viewBox="0 0 24 24"><path fill="#0F4D8A" d="M5 22q-.825 0-1.412-.587T3 20V6q0-.825.588-1.412T5 4h1V2h2v2h8V2h2v2h1q.825 0 1.413.588T21 6v14q0 .825-.587 1.413T19 22zm0-2h14V10H5zM5 8h14V6H5zm0 0V6z"/></svg>
                                  <p class="ms-2">Apr 22,2023</p>
                                </div>
                                <div class="d-flex ms-4">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="mt-2" width="20" height="20" viewBox="0 0 24 24"><path fill="#434343" d="M21 8q.8 0 1.4.6T23 10v2q0 .175-.038.375t-.112.375l-3 7.05q-.225.5-.75.85T18 21h-8q-.825 0-1.412-.587T8 19V8.825q0-.4.163-.762t.437-.638l5.425-5.4q.375-.35.888-.425t.987.175q.475.25.688.7t.087.925L15.55 8zM4 21q-.825 0-1.412-.587T2 19v-9q0-.825.588-1.412T4 8q.825 0 1.413.588T6 10v9q0 .825-.587 1.413T4 21"/></svg>
                                  <p class="ms-2">1.203 </p>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4 mb-4">
                <div class="">
                    <div class="news-card-five">
                        <div class="news-card-img">
                            <img src="assets/img/news/news-9.webp" alt="Image">
                            <a href="business.html" class="news-cat">Lifestyle</a>
                        </div>
                        <div class="news-card-info">
                            <h3><a href="business-details.html">Good Day To Take A Photo</a></h3>
                            <p>Lorem ipsum or lipsum as it is sometmes known is </p>
                            <div class="d-flex">
                                <div class="d-flex">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="mt-2" width="20" height="20" viewBox="0 0 24 24"><path fill="#0F4D8A" d="M5 22q-.825 0-1.412-.587T3 20V6q0-.825.588-1.412T5 4h1V2h2v2h8V2h2v2h1q.825 0 1.413.588T21 6v14q0 .825-.587 1.413T19 22zm0-2h14V10H5zM5 8h14V6H5zm0 0V6z"/></svg>
                                  <p class="ms-2">Apr 22,2023</p>
                                </div>
                                <div class="d-flex ms-4">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="mt-2" width="20" height="20" viewBox="0 0 24 24"><path fill="#434343" d="M21 8q.8 0 1.4.6T23 10v2q0 .175-.038.375t-.112.375l-3 7.05q-.225.5-.75.85T18 21h-8q-.825 0-1.412-.587T8 19V8.825q0-.4.163-.762t.437-.638l5.425-5.4q.375-.35.888-.425t.987.175q.475.25.688.7t.087.925L15.55 8zM4 21q-.825 0-1.412-.587T2 19v-9q0-.825.588-1.412T4 8q.825 0 1.413.588T6 10v9q0 .825-.587 1.413T4 21"/></svg>
                                  <p class="ms-2">1.203 </p>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4 mb-4">
                <div class="">
                    <div class="news-card-five">
                        <div class="news-card-img">
                            <img src="assets/img/news/news-9.webp" alt="Image">
                            <a href="business.html" class="news-cat">Lifestyle</a>
                        </div>
                        <div class="news-card-info">
                            <h3><a href="business-details.html">Good Day To Take A Photo</a></h3>
                            <p>Lorem ipsum or lipsum as it is sometmes known is </p>
                            <div class="d-flex">
                                <div class="d-flex">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="mt-2" width="20" height="20" viewBox="0 0 24 24"><path fill="#0F4D8A" d="M5 22q-.825 0-1.412-.587T3 20V6q0-.825.588-1.412T5 4h1V2h2v2h8V2h2v2h1q.825 0 1.413.588T21 6v14q0 .825-.587 1.413T19 22zm0-2h14V10H5zM5 8h14V6H5zm0 0V6z"/></svg>
                                  <p class="ms-2">Apr 22,2023</p>
                                </div>
                                <div class="d-flex ms-4">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="mt-2" width="20" height="20" viewBox="0 0 24 24"><path fill="#434343" d="M21 8q.8 0 1.4.6T23 10v2q0 .175-.038.375t-.112.375l-3 7.05q-.225.5-.75.85T18 21h-8q-.825 0-1.412-.587T8 19V8.825q0-.4.163-.762t.437-.638l5.425-5.4q.375-.35.888-.425t.987.175q.475.25.688.7t.087.925L15.55 8zM4 21q-.825 0-1.412-.587T2 19v-9q0-.825.588-1.412T4 8q.825 0 1.413.588T6 10v9q0 .825-.587 1.413T4 21"/></svg>
                                  <p class="ms-2">1.203 </p>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4 mb-4">
                <div class="">
                    <div class="news-card-five">
                        <div class="news-card-img">
                            <img src="assets/img/news/news-9.webp" alt="Image">
                            <a href="business.html" class="news-cat">Lifestyle</a>
                        </div>
                        <div class="news-card-info">
                            <h3><a href="business-details.html">Good Day To Take A Photo</a></h3>
                            <p>Lorem ipsum or lipsum as it is sometmes known is </p>
                            <div class="d-flex">
                                <div class="d-flex">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="mt-2" width="20" height="20" viewBox="0 0 24 24"><path fill="#0F4D8A" d="M5 22q-.825 0-1.412-.587T3 20V6q0-.825.588-1.412T5 4h1V2h2v2h8V2h2v2h1q.825 0 1.413.588T21 6v14q0 .825-.587 1.413T19 22zm0-2h14V10H5zM5 8h14V6H5zm0 0V6z"/></svg>
                                  <p class="ms-2">Apr 22,2023</p>
                                </div>
                                <div class="d-flex ms-4">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="mt-2" width="20" height="20" viewBox="0 0 24 24"><path fill="#434343" d="M21 8q.8 0 1.4.6T23 10v2q0 .175-.038.375t-.112.375l-3 7.05q-.225.5-.75.85T18 21h-8q-.825 0-1.412-.587T8 19V8.825q0-.4.163-.762t.437-.638l5.425-5.4q.375-.35.888-.425t.987.175q.475.25.688.7t.087.925L15.55 8zM4 21q-.825 0-1.412-.587T2 19v-9q0-.825.588-1.412T4 8q.825 0 1.413.588T6 10v9q0 .825-.587 1.413T4 21"/></svg>
                                  <p class="ms-2">1.203 </p>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4 mb-4">
                <div class="">
                    <div class="news-card-five">
                        <div class="news-card-img">
                            <img src="assets/img/news/news-9.webp" alt="Image">
                            <a href="business.html" class="news-cat">Lifestyle</a>
                        </div>
                        <div class="news-card-info">
                            <h3><a href="business-details.html">Good Day To Take A Photo</a></h3>
                            <p>Lorem ipsum or lipsum as it is sometmes known is </p>
                            <div class="d-flex">
                                <div class="d-flex">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="mt-2" width="20" height="20" viewBox="0 0 24 24"><path fill="#0F4D8A" d="M5 22q-.825 0-1.412-.587T3 20V6q0-.825.588-1.412T5 4h1V2h2v2h8V2h2v2h1q.825 0 1.413.588T21 6v14q0 .825-.587 1.413T19 22zm0-2h14V10H5zM5 8h14V6H5zm0 0V6z"/></svg>
                                  <p class="ms-2">Apr 22,2023</p>
                                </div>
                                <div class="d-flex ms-4">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="mt-2" width="20" height="20" viewBox="0 0 24 24"><path fill="#434343" d="M21 8q.8 0 1.4.6T23 10v2q0 .175-.038.375t-.112.375l-3 7.05q-.225.5-.75.85T18 21h-8q-.825 0-1.412-.587T8 19V8.825q0-.4.163-.762t.437-.638l5.425-5.4q.375-.35.888-.425t.987.175q.475.25.688.7t.087.925L15.55 8zM4 21q-.825 0-1.412-.587T2 19v-9q0-.825.588-1.412T4 8q.825 0 1.413.588T6 10v9q0 .825-.587 1.413T4 21"/></svg>
                                  <p class="ms-2">1.203 </p>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-4 mb-4">
                <div class="">
                    <div class="news-card-five">
                        <div class="news-card-img">
                            <img src="assets/img/news/news-9.webp" alt="Image">
                            <a href="business.html" class="news-cat">Lifestyle</a>
                        </div>
                        <div class="news-card-info">
                            <h3><a href="business-details.html">Good Day To Take A Photo</a></h3>
                            <p>Lorem ipsum or lipsum as it is sometmes known is </p>
                            <div class="d-flex">
                                <div class="d-flex">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="mt-2" width="20" height="20" viewBox="0 0 24 24"><path fill="#0F4D8A" d="M5 22q-.825 0-1.412-.587T3 20V6q0-.825.588-1.412T5 4h1V2h2v2h8V2h2v2h1q.825 0 1.413.588T21 6v14q0 .825-.587 1.413T19 22zm0-2h14V10H5zM5 8h14V6H5zm0 0V6z"/></svg>
                                  <p class="ms-2">Apr 22,2023</p>
                                </div>
                                <div class="d-flex ms-4">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="mt-2" width="20" height="20" viewBox="0 0 24 24"><path fill="#434343" d="M21 8q.8 0 1.4.6T23 10v2q0 .175-.038.375t-.112.375l-3 7.05q-.225.5-.75.85T18 21h-8q-.825 0-1.412-.587T8 19V8.825q0-.4.163-.762t.437-.638l5.425-5.4q.375-.35.888-.425t.987.175q.475.25.688.7t.087.925L15.55 8zM4 21q-.825 0-1.412-.587T2 19v-9q0-.825.588-1.412T4 8q.825 0 1.413.588T6 10v9q0 .825-.587 1.413T4 21"/></svg>
                                  <p class="ms-2">1.203 </p>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
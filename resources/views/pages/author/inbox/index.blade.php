@extends('layouts.author.sidebar')

@section('style')
    <style>
        .card-author{
            box-shadow: 0  5px 2px rgba(0, 0, 0, 0.1);
            border: 1px solid #f4f4f4; 
            padding: 2%;
        }
        .card-profile{
            box-shadow: 0  5px 2px rgba(0, 0, 0, 0.1);
            border: 1px solid #f4f4f4; 
            padding: 7%;
            border-radius: 10px;
            /* width: 400px;
            height: 130px; */
        }
    </style>
@endsection

@section('content')
    
<div class="container">

    <div class="card-author container">
        <div class="row justify-content-center card-profile-author mt-5 mb-2">

            {{-- <div class="col-md-12 col-lg-6 mb-5">
                <div class="d-flex card-profile">
                    <div>
                        <img src="assets/img/news/trending-3.webp" alt="Image" width="70px" style="border-radius: 50%;"/>
                    </div>
                    <div style="margin-left: 20px;">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex justify-content-start">
                                <h5>Daffa Prasetya</h5>
                            </div>
            
                            <div class="d-flex justify-content-end">
                                Apr 25, 2023 
                            </div>
                        </div>
            
                        <div class="d-flex justify-content-between">
                            <div class="d-flex justify-content-start">
                                <p>kokeninxnian okookq okxpoapj jjjhjjjjjjjjjjjjjjjjjjj....</p>
                            </div>
            
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-sm text-black m-2 justify-content-end" style="padding-left: 1rem; padding-right: 1rem; background-color: #C9C9C9;">
                                    Lihat
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             --}}

                <div class="col-md-12 col-lg-6 mb-5">
                    <div class="d-flex card-profile">
                        <div class="col-md-12 col-lg-2">
                            <img src="assets/img/news/trending-3.webp" alt="Image" width="70px" style="border-radius: 50%;"/>
                    
                        </div>
                        <div class="col-md-12 col-lg-8" style="margin-left:20px;">
                            <h5>Daffa Prasetya</h5>
                            <p>kokeninxnian okookq okxpoapjsaaaa cfdfr ....</p>
                        </div>

                        <div class="col-md-12 col-lg-2">
                            <div class="row justify-content-end">
                                <p>
                                    Apr 25, 2023
                                </p>
                                <button type="submit" class="btn btn-sm text-white m-2 justify-content-end" style=" background-color: #0F4D8A;">
                                    Lihat
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-6 mb-5">
                    <div class="d-flex card-profile">
                        <div class="col-md-12 col-lg-2">
                            <img src="assets/img/news/trending-3.webp" alt="Image" width="70px" style="border-radius: 50%;"/>
                    
                        </div>
                        <div class="col-md-12 col-lg-8" style="margin-left:20px;">
                            <h5>Daffa Prasetya</h5>
                            <p>kokeninxnian okookq okxpoapjsaaaa cfdfr ....</p>
                        </div>

                        <div class="col-md-12 col-lg-2">
                            <div class="row justify-content-end">
                                <p>
                                    Apr 25, 2023
                                </p>
                                <button type="submit" class="btn btn-sm text-white m-2 justify-content-end" style=" background-color: #0F4D8A;">
                                    Lihat
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-6 mb-5">
                    <div class="d-flex card-profile">
                        <div class="col-md-12 col-lg-2">
                            <img src="assets/img/news/trending-3.webp" alt="Image" width="70px" style="border-radius: 50%;"/>
                    
                        </div>
                        <div class="col-md-12 col-lg-8" style="margin-left:20px;">
                            <h5>Daffa Prasetya</h5>
                            <p>kokeninxnian okookq okxpoapjsaaaa cfdfr ....</p>
                        </div>

                        <div class="col-md-12 col-lg-2">
                            <div class="row justify-content-end">
                                <p>
                                    Apr 25, 2023
                                </p>
                                <button type="submit" class="btn btn-sm text-white m-2 justify-content-end" style=" background-color: #0F4D8A;">
                                    Lihat
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-6 mb-5">
                    <div class="d-flex card-profile">
                        <div class="col-md-12 col-lg-2">
                            <img src="assets/img/news/trending-3.webp" alt="Image" width="70px" style="border-radius: 50%;"/>
                    
                        </div>
                        <div class="col-md-12 col-lg-8" style="margin-left:20px;">
                            <h5>Daffa Prasetya</h5>
                            <p>kokeninxnian okookq okxpoapjsaaaa cfdfr ....</p>
                        </div>

                        <div class="col-md-12 col-lg-2">
                            <div class="row justify-content-end">
                                <p>
                                    Apr 25, 2023
                                </p>
                                <button type="submit" class="btn btn-sm text-white m-2 justify-content-end" style=" background-color: #0F4D8A;">
                                    Lihat
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-6 mb-5">
                    <div class="d-flex card-profile">
                        <div class="col-md-12 col-lg-2">
                            <img src="assets/img/news/trending-3.webp" alt="Image" width="70px" style="border-radius: 50%;"/>
                    
                        </div>
                        <div class="col-md-12 col-lg-8" style="margin-left:20px;">
                            <h5>Daffa Prasetya</h5>
                            <p>kokeninxnian okookq okxpoapjsaaaa cfdfr ....</p>
                        </div>

                        <div class="col-md-12 col-lg-2">
                            <div class="row justify-content-end">
                                <p>
                                    Apr 25, 2023
                                </p>
                                <button type="submit" class="btn btn-sm text-white m-2 justify-content-end" style=" background-color: #0F4D8A;">
                                    Lihat
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-6 mb-5">
                    <div class="d-flex card-profile">
                        <div class="col-md-12 col-lg-2">
                            <img src="assets/img/news/trending-3.webp" alt="Image" width="70px" style="border-radius: 50%;"/>
                    
                        </div>
                        <div class="col-md-12 col-lg-8" style="margin-left:20px;">
                            <h5>Daffa Prasetya</h5>
                            <p>kokeninxnian okookq okxpoapjsaaaa cfdfr ....</p>
                        </div>

                        <div class="col-md-12 col-lg-2">
                            <div class="row justify-content-end">
                                <p>
                                    Apr 25, 2023
                                </p>
                                <button type="submit" class="btn btn-sm text-white m-2 justify-content-end" style=" background-color: #0F4D8A;">
                                    Lihat
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

         
        </div>
    </div>
</div>
@endsection
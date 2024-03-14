@extends('layouts.admin.app')

<<<<<<< Updated upstream

@section('style')
    <style>
        .card-profile{
            box-shadow: 0  5px 2px rgba(0, 0, 0, 0.1);
            border: 1px solid #f4f4f4; 
            padding: 30px;
            border-radius: 10px;
            /* width: 400px;
            height: 130px; */
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @forelse ($contactUs as $contact)
            <div class="col-md-12 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="d-flex justify-content-start col-md-12 col-lg-8">
                                <div class="rounded-circle bg-secondary mx-4 mb-3" style="width: 100px; height: 100px;"></div>
                                <div>
                                    <p style="font-size: 20px; font-weight: bold" class="mb-0">{{ $contact->user->name }}</p>
                                    <div>
                                        {{-- <p>Tayo@gmail.com</p> --}}
                                        <div>
                                            <p>{{ $contact->message }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4">
                                <div class="d-flex flex-column align-items-end">
                                    <p>
                                        {{ $contact->created_at->format('M d, Y') }}
                                    </p>
                                    <form action="{{ route('contact.destroy', $contact->id) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger mt-5 py-1 px-1"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.286 8.571L7.429 20h9.142l1.143-11.429M13.5 15.5v-5m-3 5v-5M4.571 6.286h4.572m0 0l.382-1.529a1 1 0 0 1 .97-.757h3.01a1 1 0 0 1 .97.757l.382 1.529m-5.714 0h5.714m0 0h4.572"/></svg></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-12 col-lg-6 mb-2">
            <div class="mb-4">
                <div class="card-body">
                    <div class="d-flex card-profile">
                        <div class="">
                            <img src="assets/img/news/trending-3.webp" alt="Image" width="70px" style="border-radius: 50%;" />
                        </div>
                        <div class="ms-3 mt-1">
                            <h5>Daffa Prasetya</h5>
                            <p class="mt-3">kokeninxnian okookq okxpoapjsaaaa cfdfr ....</p>
                        </div>
                        <div class="ms-auto">
                            <p class="ms-auto">Apr 25, 2023</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-6 mb-2">
            <div class="mb-4">
                <div class="card-body">
                    <div class="d-flex card-profile">
                        <div class="">
                            <img src="assets/img/news/trending-3.webp" alt="Image" width="70px" style="border-radius: 50%;" />
                        </div>
                        <div class="ms-3 mt-1">
                            <h5>Daffa Prasetya</h5>
                            <p class="mt-3">kokeninxnian okookq okxpoapjsaaaa cfdfr ....</p>
                        </div>
                        <div class="ms-auto">
                            <p class="ms-auto">Apr 25, 2023</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-6 mb-2">
            <div class="mb-4">
                <div class="card-body">
                    <div class="d-flex card-profile">
                        <div class="">
                            <img src="assets/img/news/trending-3.webp" alt="Image" width="70px" style="border-radius: 50%;" />
                        </div>
                        <div class="ms-3 mt-1">
                            <h5>Daffa Prasetya</h5>
                            <p class="mt-3">kokeninxnian okookq okxpoapjsaaaa cfdfr ....</p>
                        </div>
                        <div class="ms-auto">
                            <p class="ms-auto">Apr 25, 2023</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-6 mb-2">
            <div class="mb-4">
                <div class="card-body">
                    <div class="d-flex card-profile">
                        <div class="">
                            <img src="assets/img/news/trending-3.webp" alt="Image" width="70px" style="border-radius: 50%;" />
                        </div>
                        <div class="ms-3 mt-1">
                            <h5>Daffa Prasetya</h5>
                            <p class="mt-3">kokeninxnian okookq okxpoapjsaaaa cfdfr ....</p>
                        </div>
                        <div class="ms-auto">
                            <p class="ms-auto">Apr 25, 2023</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-lg-6 mb-2">
            <div class="mb-4">
                <div class="card-body">
                    <div class="d-flex card-profile">
                        <div class="">
                            <img src="assets/img/news/trending-3.webp" alt="Image" width="70px" style="border-radius: 50%;" />
                        </div>
                        <div class="ms-3 mt-1">
                            <h5>Daffa Prasetya</h5>
                            <p class="mt-3">kokeninxnian okookq okxpoapjsaaaa cfdfr ....</p>
                        </div>
                        <div class="ms-auto">
                            <p class="ms-auto">Apr 25, 2023</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>


</div>
@endsection
=======
>>>>>>> Stashed changes
            @empty
            <div class="d-flex justify-content-center py-4 mt-4">
                <div>
                    <img src="{{ asset('no-data.svg') }}" alt="">
                </div>
            </div>
            <div class="text-center">
                <h4>Ups... Ada kesalahan!!!</h4>
            </div>
            @endforelse
        </div>
    </div>
@endsection
<<<<<<< Updated upstream
=======
>>>>>>> 3b092b27cbe29313b0fcebf4319e8a2b1aada666
>>>>>>> Stashed changes

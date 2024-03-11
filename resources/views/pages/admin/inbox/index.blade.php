@extends('layouts.admin.app')


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

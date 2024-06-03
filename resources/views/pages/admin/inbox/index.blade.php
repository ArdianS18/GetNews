@extends('layouts.admin.app')

@section('style')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <style>
        .card-profile {
            box-shadow: 0 5px 2px rgba(0, 0, 0, 0.1);
            border: 1px solid #f4f4f4;
            padding: 30px;
            border-radius: 10px;
            /* width: 400px;
                height: 130px; */
        }

        .badge {
            width: fit-content;
            height: fit-content;
            padding: 0.25em 0.5em;
            font-size: inherit;
        }
    </style>
@endsection

<head>
    <title>Admin | Inbox</title>
</head>

@section('content')
    <div class="">
        <div class="container-fluid">
            <div class="card bg-light-info shadow-sm position-relative overflow-hidden">
                <div class="card-body px-4 py-4">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fw-semibold mb-8">Inbox Application</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-muted text-decoration-none"
                                            href="index-2.html">Dashboard</a></li>
                                    <li class="breadcrumb-item" aria-current="page">Inbox</li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-3">
                            <div class="text-center mb-n5">
                                <img src="{{ asset('assets/img/em.png') }}" alt="" class="img-fluid mb-n4">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card overflow-hidden chat-application">
                <div class="d-flex align-items-center justify-content-between gap-3 m-3 d-lg-none">
                    <button class="btn btn-primary d-flex" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#chat-sidebar" aria-controls="chat-sidebar">
                        <i class="ti ti-menu-2 fs-5"></i>
                    </button>
                    <form class="position-relative w-100">
                        <input type="text" class="form-control search-chat py-2 px-5 ps-5" id="text-srh"
                            placeholder="Search Contact">
                        <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                    </form>
                </div>
                <div class="d-flex w-100">
                    <div class="left-part border-end w-20 flex-shrink-0 d-none d-lg-block">
                        <div class="px-9 pt-4 pb-3">
                            <h4>Kotak Surat</h4>
                        </div>
                        <ul class="list-group" style="height: calc(100vh - 400px)" data-simplebar>

                            <li class="list-group-item border-0 d-flex p-0 mx-9">
                                    <a id="contactButton" class="d-flex align-items-center gap-2 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1 buttonContact"
                                    href="javascript:void(0)"><i class="ti ti-inbox fs-5"></i>Pesan</a>
                                    <span id="messageCountBadge" class="badge ms-auto bg-danger"></span>
                            </li>

                            <li class="list-group-item border-0 d-flex p-0 mx-9">
                                <a id="reportButton" class="d-flex align-items-center gap-2 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1 buttonReport"
                                    href="javascript:void(0)"><i class="ti ti-flag fs-5"></i>Laporan</a>
                                    <span id="messageRejectBadge" class="badge ms-auto bg-danger"></span>
                            </li>
                            <li class="list-group-item border-0 p-0 mx-9">
                                <a id="trashButton" class="d-flex align-items-center gap-2 list-group-item-action text-dark px-3 py-8 mb-1 rounded-1 buttonDelete"
                                    href="javascript:void(0)"><i class="ti ti-trash fs-5"></i>Sampah</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Reply Modal -->
                    <div class="modal fade" id="replyModal" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="replyModalLabel">Balas Pesan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form id="replyForm" action="{{ route('send.message') }}" method="POST">
                                    @method('post')
                                    @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="replyEmail" class="col-form-label">Email:</label>
                                                <input type="email" class="form-control" name="email" id="replyEmail" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="replyMessage" class="col-form-label">Pesan:</label>
                                                <textarea class="form-control" name="message" id="replyMessage" style="resize: none; height: 100px"></textarea>
                                            </div>
                                        </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Kirim Balasan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex w-100">
                        <div class="min-width-340">
                            <div class="border-end user-chat-box h-100">
                                <div class="px-4 pt-9 pb-6 d-none d-lg-block">
                                    <form class="position-relative">
                                        <input type="text" class="form-control search-chat py-2 px-5 ps-5" id="text-srh" placeholder="Cari" />
                                        <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                                    </form>
                                </div>
                                <div class="app-chat">
                                    <ul class="chat-users" style="height: calc(100vh - 400px)" data-simplebar>
                                        @forelse ($contactUs as $contact)
                                            <li class="contact">
                                                <a href="javascript:void(0)" onclick="loadRouteContent(event, '{{ route('contact.read', ['contact' => $contact->id]) }}')"
                                                    class="px-4 py-3 bg-hover-light-black d-flex align-items-start chat-user bg-light show-contact"
                                                    id="chat_user_{{ $contact->id }}" data-user-id="{{ $contact->user_id }}" data-chat-id="{{ $contact->id }}">
                                                    {{-- <div class="form-check mb-0">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckDefault">
                                                    </div> --}}
                                                    <div class="position-relative w-100 ms-2">
                                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                                            <h6 class="mb-0 fw-semibold">{{ $contact->user->name }}</h6>
                                                            @if ($contact->status == "unread")
                                                                <span class="badge ms-auto bg-danger">!</span>
                                                            @endif
                                                        </div>
                                                        <h6 class="text-dark">{{ $contact->message }}</h6>
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <p class="mb-0 fs-2 text-muted">{{ $contact->created_at }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        @empty
                                            {{-- <tr class="contact">
                                                <td colspan="5">
                                                    <div class="d-flex justify-content-center">
                                                        <div>
                                                            <img src="{{ asset('assets/img/no-data.svg') }}" width="200" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <h5>Tidak ada data</h5>
                                                    </div>
                                                </td>
                                            </tr> --}}
                                        @endforelse

                                        @forelse ($sendMessage as $send)
                                        <li class="contact">
                                            <a href="javascript:void(0)" onclick="loadRouteContent(event, '{{ route('send.message.read', ['send' => $send->id]) }}')"
                                                class="px-4 py-3 bg-hover-light-black d-flex align-items-start chat-user bg-light show-contact"
                                                id="chat_user_{{ $send->id }}" data-user-id="{{ $send->user_id }}" data-chat-id="{{ $send->id }}">
                                                {{-- <div class="form-check mb-0">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="flexCheckDefault">
                                                </div> --}}
                                                <div class="position-relative w-100 ms-2">
                                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                                        <h6 class="mb-0 fw-semibold">{{ $send->user->name }}</h6>
                                                        @if ($send->status == "unread")
                                                            <span class="badge ms-auto bg-danger">!</span>
                                                        @endif
                                                    </div>
                                                    <h6 class="text-dark">{{ $send->message }}</h6>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="d-flex align-items-center">
                                                            <p class="mb-0 fs-2 text-muted">{{ $send->created_at }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    @empty
                                    @endforelse

                                    @forelse ($reports as $report)
                                    <li class="report">
                                        <a href="javascript:void(0)" onclick="loadRouteContent(event, '{{ route('read.report', ['report' => $report->id]) }}')"
                                            class="px-4 py-3 bg-hover-light-black d-flex align-items-start chat-user bg-light show-report"
                                            id="chat_user_{{ $report->id }}" data-user-id="{{ $report->user_id }}" data-chat-id="{{ $report->id }}">
                                            {{-- <div class="form-check mb-0">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            </div> --}}
                                            <div class="position-relative w-100 ms-2">
                                                <div
                                                    class="d-flex align-items-center justify-content-between mb-2">
                                                    <h6 class="mb-0 fw-semibold">{{ $report->user->name }}</h6>
                                                    @if ($report->status == "unread")
                                                        <span class="badge ms-auto bg-danger">!</span>
                                                    @endif
                                                </div>
                                                <h6 class="text-dark">{{ $report->message }}</h6>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <p class="mb-0 fs-2 text-muted">{{ $report->created_at }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @empty
                                @endforelse

                                    @forelse ($sendDelete as $sendDelete)
                                    <li class="trash">
                                        <a href="javascript:void(0)"
                                            class="px-4 py-3 bg-hover-light-black d-flex align-items-start chat-user bg-light show-delete-contact"
                                            id="chat_user_{{ $sendDelete->id }}" data-user-id="{{ $sendDelete->user_id }}" data-chat-id="{{ $sendDelete->id }}">
                                            <div class="position-relative w-100 ms-2">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <h6 class="mb-0 fw-semibold">{{ $sendDelete->user->name }}
                                                    </h6>
                                                    <span class="badge fs-2 rounded-4 py-1 px-4"
                                                        style="background-color: #175A95;">Sampah</span>
                                                </div>
                                                <h6 class="text-dark">{{ $sendDelete->message }}</h6>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <p class="mb-0 fs-2 text-muted">
                                                            {{ $sendDelete->created_at }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    @empty
                                    @endforelse

                                        @forelse ($contactDelete as $contactDelete)
                                            <li class="trash">
                                                <a href="javascript:void(0)"
                                                    class="px-4 py-3 bg-hover-light-black d-flex align-items-start chat-user bg-light show-delete-contact"
                                                    id="chat_user_{{ $contactDelete->id }}" data-user-id="{{ $contactDelete->user_id }}" data-chat-id="{{ $contactDelete->id }}">
                                                    {{-- <div class="form-check mb-0">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckDefault">
                                                    </div> --}}
                                                    <div class="position-relative w-100 ms-2">
                                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                                            <h6 class="mb-0 fw-semibold">{{ $contactDelete->user->name }}
                                                            </h6>
                                                            <span class="badge fs-2 rounded-4 py-1 px-4"
                                                                style="background-color: #175A95;">Sampah</span>
                                                        </div>
                                                        <h6 class="text-dark">{{ $contactDelete->message }}</h6>
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <p class="mb-0 fs-2 text-muted">
                                                                    {{ $contactDelete->created_at }}</p>
                                                            </div>
                                                            {{-- <p class="mb-0 fs-2 text-muted">04:00pm</p> --}}
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        @empty
                                            {{-- <tr class="trash">
                                                <td colspan="5">
                                                    <div class="d-flex justify-content-center">
                                                        <div>
                                                            <img src="{{ asset('assets/img/no-data.svg') }}" width="200" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <h5>Tidak ada data</h5>
                                                    </div>
                                                </td>
                                            </tr> --}}
                                        @endforelse

                                        @forelse ($reportsDelete as $reportDelete)
                                            <li class="trash">
                                                <a href="javascript:void(0)"
                                                    class="px-4 py-3 bg-hover-light-black d-flex align-items-start justify-content-between chat-user show-delete-report"
                                                    id="chat_user_{{ $reportDelete->id }}" data-user-id="{{ $reportDelete->user_id }}" data-chat-id="{{ $reportDelete->id }}">
                                                    <div class="form-check mb-0">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="flexCheckDefault">
                                                    </div>
                                                    <div class="position-relative w-100 ms-2">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between mb-2">
                                                            <h6 class="mb-0 fw-semibold">{{ $reportDelete->user->name }}
                                                            </h6>
                                                            <span class="badge fs-2 rounded-4 py-1 px-3"
                                                                style="background-color: #FA896B;">Sampah</span>
                                                        </div>
                                                        <h6 class="text-dark">{{ $reportDelete->message }}</h6>
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <p class="mb-0 fs-2 text-muted">
                                                                    {{ $reportDelete->created_at }}</p>
                                                            </div>
                                                            <p class="mb-0 fs-2 text-muted">04:00pm</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        @empty
                                            {{-- <tr class="trash">
                                                <td colspan="5">
                                                    <div class="d-flex justify-content-center">
                                                        <div>
                                                            <img src="{{ asset('assets/img/no-data.svg') }}" width="200" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <h5>Tidak ada data</h5>
                                                    </div>
                                                </td>
                                            </tr> --}}
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="w-100">
                            <div class="chat-container h-100 w-100">
                                <div class="chat-box-inner-part h-100">
                                    <div class="chatting-box app-email-chatting-box">
                                        @forelse ($contactUs2 as $contactUs)
                                        <div class="chat-content" id="chat_content_{{ $contactUs->id }}" style="display: none;">
                                            <div class="p-9 py-3 border-bottom chat-meta-user">
                                                <h5>Detail Pesan</h5>
                                            </div>
                                            <div class="position-relative overflow-hidden">
                                                <div class="position-relative">
                                                    <div class="p-9" style="height: calc(100vh - 428px)" data-simplebar>
                                                        <div class="chat active-chat" data-user-id="{{ $contactUs->id }}">
                                                            <div
                                                                class="hstack align-items-start mb-7 pb-1 align-items-center justify-content-between">
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <img src="{{asset( $contactUs->user->photo ? 'storage/'.$contactUs->user->photo : "usr1.svg")}}"
                                                                        alt="user8" width="48" height="48"
                                                                        class="rounded-circle" />
                                                                    <div>
                                                                        <h6 class="fw-semibold mb-0">
                                                                            {{ $contactUs->user->name }}</h6>
                                                                        <p class="mb-0">{{ $contactUs->user->email }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <span class="badge fs-2 rounded-4 py-1 px-4"
                                                                    style="background-color: #175A95;">Pesan</span>
                                                            </div>
                                                            <div class="border-bottom pb-7 mb-7">
                                                                <h4 class="fw-semibold text-dark mb-3">Silakan periksa
                                                                    pembaruan terbaru ini</h4>
                                                                <p class="mb-3 text-dark">Hello {{ Auth::user()->name }},
                                                                </p>
                                                                <p class="mb-3 text-dark">
                                                                    {{ $contactUs->message }}
                                                                </p>
                                                                <p class="mb-0 text-dark">Salam dari,..</p>
                                                                <h6 class="fw-semibold mb-0 text-dark pb-1">
                                                                    {{ $contactUs->user->name }}</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="px-9 py-3 border-top chat-send-message-footer">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <ul
                                                                class="list-unstyledn mb-0 d-flex align-items-center gap-7">
                                                                <li>
                                                                    <a class="text-dark bg-hover-primary d-flex align-items-center gap-1 btn-reply"
                                                                        href="javascript:void(0)" data-email="{{ $contactUs->user->email }}">
                                                                        <i class="ti ti-arrow-back-up fs-5"></i>
                                                                        Balas
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="text-dark bg-hover-primary d-flex align-items-center gap-1 btn-delete-contactus"
                                                                        data-id="{{ $contactUs->id }}"
                                                                        href="javascript:void(0)">
                                                                        <i class="ti ti-trash fs-5"></i>
                                                                        Hapus
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                            {{-- <tr class="chat-content">
                                                <td colspan="5">
                                                    <div class="d-flex justify-content-center">
                                                        <div>
                                                            <img src="{{ asset('assets/img/no-chat.svg') }}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <h5>Tidak ada pesan</h5>
                                                    </div>
                                                </td>
                                            </tr> --}}
                                        @endforelse

                                        @forelse ($sendMessage2 as $send2)
                                        <div class="chat-content" id="chat_content_{{ $send2->id }}" style="display: none;">
                                            <div class="p-9 py-3 border-bottom chat-meta-user">
                                                <h5>Detail Pesan</h5>
                                            </div>
                                            <div class="position-relative overflow-hidden">
                                                <div class="position-relative">
                                                    <div class="p-9" style="height: calc(100vh - 428px)" data-simplebar>
                                                        <div class="chat active-chat" data-user-id="{{ $send2->id }}">
                                                            <div
                                                                class="hstack align-items-start mb-7 pb-1 align-items-center justify-content-between">
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <img src="{{asset( $send2->user->photo ? 'storage/'.$send2->user->photo : "usr1.svg")}}"
                                                                        alt="user8" width="48" height="48"
                                                                        class="rounded-circle" />
                                                                    <div>
                                                                        <h6 class="fw-semibold mb-0">
                                                                            {{ $send2->user->name }}</h6>
                                                                        <p class="mb-0">{{ $send2->user->email }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <span class="badge fs-2 rounded-4 py-1 px-4"
                                                                    style="background-color: #175A95;">Pesan</span>
                                                            </div>
                                                            <div class="border-bottom pb-7 mb-7">
                                                                <h4 class="fw-semibold text-dark mb-3">Silakan periksa
                                                                    pembaruan terbaru ini</h4>
                                                                <p class="mb-3 text-dark">Hello {{ Auth::user()->name }},
                                                                </p>
                                                                <p class="mb-3 text-dark">
                                                                    {{ $send2->message }}
                                                                </p>
                                                                <p class="mb-0 text-dark">Salam dari,..</p>
                                                                <h6 class="fw-semibold mb-0 text-dark pb-1">
                                                                    {{ $send2->user->name }}</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="px-9 py-3 border-top chat-send-message-footer">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <ul
                                                                class="list-unstyledn mb-0 d-flex align-items-center gap-7">
                                                                <li>
                                                                    <a class="text-dark bg-hover-primary d-flex align-items-center gap-1 btn-reply"
                                                                        href="javascript:void(0)" data-email="{{ $send2->user->email }}">
                                                                        <i class="ti ti-arrow-back-up fs-5"></i>
                                                                        Balas
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="text-dark bg-hover-primary d-flex align-items-center gap-1 btn-delete-send"
                                                                        data-id="{{ $send2->id }}"
                                                                        href="javascript:void(0)">
                                                                        <i class="ti ti-trash fs-5"></i>
                                                                        Hapus
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                            {{-- <tr class="chat-content">
                                                <td colspan="5">
                                                    <div class="d-flex justify-content-center">
                                                        <div>
                                                            <img src="{{ asset('assets/img/no-chat.svg') }}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <h5>Tidak ada pesan</h5>
                                                    </div>
                                                </td>
                                            </tr> --}}
                                        @endforelse

                                        @forelse ($contactDelete2 as $contactDelete2)
                                            <div class="chat-contactDel" id="chat_contactDel_{{ $contactDelete2->id }}" style="display: none;">
                                                <div class="p-9 py-3 border-bottom chat-meta-user">
                                                    <h5>Detail Sampah Pesan</h5>
                                                </div>
                                                <div class="position-relative overflow-hidden">
                                                    <div class="position-relative">
                                                        <div class="p-9" style="height: calc(100vh - 428px)" data-simplebar>
                                                            <div class="chat-list chat active-chat" data-user-id="{{ $contactDelete2->id }}">
                                                                <div
                                                                    class="hstack align-items-start mb-7 pb-1 align-items-center justify-content-between">
                                                                    <div class="d-flex align-items-center gap-2">
                                                                        <img src="{{asset( $contactDelete2->user->photo ? 'storage/'.$contactDelete2->user->photo : "usr1.svg")}}"
                                                                            alt="user8" width="48" height="48"
                                                                            class="rounded-circle" />
                                                                        <div>
                                                                            <h6 class="fw-semibold mb-0">
                                                                                {{ $contactDelete2->user->name }}</h6>
                                                                            <p class="mb-0">
                                                                                {{ $contactDelete2->user->email }}</p>
                                                                        </div>
                                                                    </div>
                                                                    <span class="badge fs-2 rounded-4 py-1 px-4"
                                                                        style="background-color: #175A95;">Sampah</span>
                                                                </div>
                                                                <div class="border-bottom pb-7 mb-7">
                                                                    <h4 class="fw-semibold text-dark mb-3">Silakan periksa
                                                                        pembaruan terbaru ini</h4>
                                                                    <p class="mb-3 text-dark">Hello {{ Auth::user()->name }},
                                                                    </p>
                                                                    <p class="mb-3 text-dark">
                                                                        {{ $contactDelete2->message }}
                                                                    </p>
                                                                    {{-- <p class="mb-3 text-dark">Ut id ornare metus, sed auctor enim. Pellentesque nisi magna, laoreet a augue eget, tempor volutpat diam.</p> --}}
                                                                    <p class="mb-0 text-dark">Regards,</p>
                                                                    <h6 class="fw-semibold mb-0 text-dark pb-1">
                                                                        {{ $contactDelete2->user->name }}</h6>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="px-9 py-3 border-top chat-send-message-footer">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <ul
                                                                    class="list-unstyledn mb-0 d-flex align-items-center gap-7">
                                                                    <li>
                                                                        <a class="text-dark bg-hover-primary d-flex align-items-center gap-1 btn-recovery-contactus"
                                                                            data-id="{{ $contactDelete2->id }}"
                                                                            href="javascript:void(0)">
                                                                            <i class="ti ti-trash fs-5"></i>
                                                                            Pulihkan
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="text-dark bg-hover-primary d-flex align-items-center gap-1 btn-release-contactus"
                                                                            data-id="{{ $contactDelete2->id }}"
                                                                            href="javascript:void(0)">
                                                                            <i class="ti ti-trash fs-5"></i>
                                                                            Hapus
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            {{-- <tr class="chat-contactDel">
                                                <td colspan="5">
                                                    <div class="d-flex justify-content-center">
                                                        <div>
                                                            <img src="{{ asset('assets/img/no-chat.svg') }}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <h5>Tidak ada pesan</h5>
                                                    </div>
                                                </td>
                                            </tr> --}}
                                        @endforelse



                                        @forelse ($reports2 as $report2)
                                        <div class="chat-report" id="chat_report_{{ $report2->id }}" style="display: none;">
                                            <div class="p-9 py-3 border-bottom chat-meta-user">
                                                <h5>Detail Laporan</h5>
                                            </div>
                                            <div class="position-relative overflow-hidden">
                                                <div class="position-relative">
                                                    <div class="p-9" style="height: calc(100vh - 428px)" data-simplebar>
                                                        <div class="chat active-chat" data-user-id="{{ $report2->id }}">
                                                            <div class="hstack align-items-start mb-7 pb-1 align-items-center justify-content-between">
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <img src="{{asset( $report2->user->photo ? 'storage/'.$report2->user->photo : "usr1.svg")}}"
                                                                        alt="user8" width="48" height="48"
                                                                        class="rounded-circle" />
                                                                    <div>
                                                                        <h6 class="fw-semibold mb-0">
                                                                            {{ $report2->user->name }}</h6>
                                                                        <p class="mb-0">{{ $report2->user->email }}</p>
                                                                    </div>
                                                                </div>
                                                                <span class="badge fs-2 rounded-4 py-1 px-3"
                                                                    style="background-color: #FA896B;">Laporan</span>
                                                            </div>
                                                            <div class="border-bottom pb-7 mb-7">
                                                                <div class="d-flex">
                                                                    <div class="col-3">
                                                                        <p class="text-dark">Judul Berita</p>
                                                                        <b
                                                                            style="fw-semibold mb-0">{{ $report2->news->name }}</b>
                                                                    </div>
                                                                    <div class="col-3">
                                                                        <p class="text-dark">Penulis</p>
                                                                        <b
                                                                            style="fw-semibold mb-0">{{ $report->user->name }}</b>
                                                                    </div>
                                                                </div>

                                                                <div class="mt-5">
                                                                    <p class="text-dark">Isi Laporan</p>
                                                                    <b style="fw-semibold mb-0">{{ $report2->message }}</b>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="px-9 py-3 border-top chat-send-message-footer">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <ul
                                                                class="list-unstyledn mb-0 d-flex align-items-center gap-7">
                                                                <li>
                                                                    <a class="text-dark bg-hover-primary d-flex align-items-center gap-1 btn-reply"
                                                                        href="javascript:void(0)" data-email="{{ $report2->user->email }}">
                                                                        <i class="ti ti-arrow-back-up fs-5"></i>
                                                                        Balas
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="text-dark bg-hover-primary d-flex align-items-center gap-1 btn-delete-report"
                                                                        data-id="{{ $report2->id }}"
                                                                        href="javascript:void(0)">
                                                                        <i class="ti ti-trash fs-5"></i>
                                                                        Hapus
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                            {{-- <tr class="chat-report">
                                                <td colspan="5">
                                                    <div class="d-flex justify-content-center">
                                                        <div>
                                                            <img src="{{ asset('assets/img/no-chat.svg') }}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <h5>Tidak ada pesan</h5>
                                                    </div>
                                                </td>
                                            </tr> --}}
                                        @endforelse


                                        @forelse ($reportsDelete2 as $reportDelete2)
                                            <div class="chat-reportDel" id="chat_reportDel_{{ $reportDelete2->id }}" style="display: none;">
                                                <div class="p-9 py-3 border-bottom chat-meta-user">
                                                    <h5>Detail Sampah Laporan</h5>
                                                </div>
                                                <div class="position-relative overflow-hidden">
                                                    <div class="position-relative">
                                                        <div class="p-9" style="height: calc(100vh - 428px)" data-simplebar>
                                                            <div class="chat-list chat" data-user-id="{{ $reportDelete2->id }}">
                                                                <div
                                                                    class="hstack align-items-start mb-7 pb-1 align-items-center justify-content-between">
                                                                    <div class="d-flex align-items-center gap-2">
                                                                        <img src="{{asset( $reportDelete2->user->photo ? 'storage/'.$reportDelete2->user->photo : "usr1.svg")}}"
                                                                            alt="user8" width="48" height="48"
                                                                            class="rounded-circle" />
                                                                        <div>
                                                                            <h6 class="fw-semibold mb-0">
                                                                                {{ $reportDelete2->user->name }}</h6>
                                                                            <p class="mb-0">{{ $reportDelete2->user->email }}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <span class="badge fs-2 rounded-4 py-1 px-3"
                                                                        style="background-color: #FA896B;">Sampah</span>
                                                                </div>
                                                                <div class="border-bottom pb-7 mb-7">
                                                                    <div class="d-flex">
                                                                        <div class="col-3">
                                                                            <p class="text-dark">Judul Berita</p>
                                                                            <b
                                                                                style="fw-semibold mb-0">{{ $reportDelete2->news->name }}</b>
                                                                        </div>
                                                                        <div class="col-3">
                                                                            <p class="text-dark">Penulis</p>
                                                                            <b
                                                                                style="fw-semibold mb-0">{{ $reportDelete2->user->name }}</b>
                                                                        </div>
                                                                    </div>

                                                                    <div class="mt-5">
                                                                        <p class="text-dark">Isi Laporan</p>
                                                                        <b
                                                                            style="fw-semibold mb-0">{{ $reportDelete2->message }}</b>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="px-9 py-3 border-top chat-send-message-footer">
                                                            <div class="d-flex align-items-center justify-content-between">
                                                                <ul
                                                                    class="list-unstyledn mb-0 d-flex align-items-center gap-7">
                                                                    <li>
                                                                        <a class="text-dark bg-hover-primary d-flex align-items-center gap-1 btn-recovery-report"
                                                                            data-id="{{ $reportDelete2->id }}"
                                                                            href="javascript:void(0)">
                                                                            <i class="ti ti-trash fs-5"></i>
                                                                            Pulihkan
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="text-dark bg-hover-primary d-flex align-items-center gap-1 btn-release-report"
                                                                            data-id="{{ $reportDelete2->id }}"
                                                                            href="javascript:void(0)">
                                                                            <i class="ti ti-trash fs-5"></i>
                                                                            Hapus
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            {{-- <tr class="chat-reportDel">
                                                <td colspan="5">
                                                    <div class="d-flex justify-content-center">
                                                        <div>
                                                            <img src="{{ asset('assets/img/no-chat.svg') }}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <h5>Tidak ada pesan</h5>
                                                    </div>
                                                </td>
                                            </tr> --}}
                                        @endforelse


                                        @forelse ($sendDelete2 as $sendDel)
                                        <div class="chat-contactDel" id="chat_contactDel_{{ $sendDel->id }}" style="display: none;">
                                            <div class="p-9 py-3 border-bottom chat-meta-user">
                                                <h5>Detail Sampah Pesan</h5>
                                            </div>
                                            <div class="position-relative overflow-hidden">
                                                <div class="position-relative">
                                                    <div class="p-9" style="height: calc(100vh - 428px)" data-simplebar>
                                                        <div class="chat-list chat active-chat" data-user-id="{{ $sendDel->id }}">
                                                            <div
                                                                class="hstack align-items-start mb-7 pb-1 align-items-center justify-content-between">
                                                                <div class="d-flex align-items-center gap-2">
                                                                    <img src="{{asset( $sendDel->user->photo ? 'storage/'.$sendDel->user->photo : "usr1.svg")}}"
                                                                        alt="user8" width="48" height="48"
                                                                        class="rounded-circle" />
                                                                    <div>
                                                                        <h6 class="fw-semibold mb-0">
                                                                            {{ $sendDel->user->name }}</h6>
                                                                        <p class="mb-0">
                                                                            {{ $sendDel->user->email }}</p>
                                                                    </div>
                                                                </div>
                                                                <span class="badge fs-2 rounded-4 py-1 px-4"
                                                                    style="background-color: #175A95;">Sampah</span>
                                                            </div>
                                                            <div class="border-bottom pb-7 mb-7">
                                                                <h4 class="fw-semibold text-dark mb-3">Silakan periksa
                                                                    pembaruan terbaru ini</h4>
                                                                <p class="mb-3 text-dark">Hello {{ Auth::user()->name }},
                                                                </p>
                                                                <p class="mb-3 text-dark">
                                                                    {{ $sendDel->message }}
                                                                </p>
                                                                <p class="mb-3 text-dark">Ut id ornare metus, sed auctor enim. Pellentesque nisi magna, laoreet a augue eget, tempor volutpat diam.</p>
                                                                <p class="mb-0 text-dark">Regards,</p>
                                                                <h6 class="fw-semibold mb-0 text-dark pb-1">
                                                                    {{ $sendDel->user->name }}</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="px-9 py-3 border-top chat-send-message-footer">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <ul
                                                                class="list-unstyledn mb-0 d-flex align-items-center gap-7">
                                                                <li>
                                                                    <a class="text-dark bg-hover-primary d-flex align-items-center gap-1 btn-recovery-send"
                                                                        data-id="{{ $sendDel->id }}"
                                                                        href="javascript:void(0)">
                                                                        <i class="ti ti-trash fs-5"></i>
                                                                        Pulihkan
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="text-dark bg-hover-primary d-flex align-items-center gap-1 btn-release-send"
                                                                        data-id="{{ $sendDel->id }}"
                                                                        href="javascript:void(0)">
                                                                        <i class="ti ti-trash fs-5"></i>
                                                                        Hapus
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        {{-- <tr class="chat-contactDel">
                                            <td colspan="5">
                                                <div class="d-flex justify-content-center">
                                                    <div>
                                                        <img src="{{ asset('assets/img/no-chat.svg') }}" alt="">
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <h5>Tidak ada pesan</h5>
                                                </div>
                                            </td>
                                        </tr> --}}
                                    @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-delete-user-component />
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const replyButtons = document.querySelectorAll('.btn-reply');

            replyButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const email = this.getAttribute('data-email');
                    const modal = $('#replyModal');
                    modal.find('#replyEmail').val(email);
                    modal.modal('show');
                });
            });

            const contactButton = document.getElementById("contactButton");
            const reportButton = document.getElementById("reportButton");
            const trashButton = document.getElementById("trashButton");

            contactButton.addEventListener("click", function() {
                toggleItems("contact");
            });

            reportButton.addEventListener("click", function() {
                toggleItems("report");
            });

            trashButton.addEventListener("click", function() {
                toggleItems("trash");
            });

            function toggleItems(category) {
                const allItems = document.querySelectorAll(".chat-users li");
                allItems.forEach(function(item) {
                    if (item.classList.contains(category)) {
                        item.style.display = "block";
                    } else {
                        item.style.display = "none";
                    }
                });
            }

        });
    </script>

    <script>
        function loadRouteContent(event, route) {
            event.preventDefault();
            $.ajax({
                url: route,
                type: 'GET',
                success: function (response) {
                    $('#someContainer').html(response);
                    $(event.target).closest('.contact').find('.badge.bg-danger').remove();
                    $(event.target).closest('.report').find('.badge.bg-danger').remove();
                    // $('#content-container').html(response);
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                }
            });
        }
    </script>

    <script src="{{ asset('admin/dist/js/apps/chat.js') }}"></script>

    <script>
        $('.btn-delete-contactus').click(function() {
            id = $(this).data('id')
            var actionUrl = `/contact/${id}`;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })
    </script>

    <script>
        $('.btn-delete-send').click(function() {
            id = $(this).data('id')
            var actionUrl = `/send/${id}`;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })
    </script>

    <script>
        $('.btn-recovery-send').click(function() {
            id = $(this).data('id')
            var actionUrl = `/send-recovery/${id}`;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })
    </script>

    <script>
        $('.btn-recovery-contactus').click(function() {
            id = $(this).data('id')
            var actionUrl = `/contact-recovery/${id}`;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })
    </script>

    <script>
        $('.btn-release-contactus').click(function() {
            id = $(this).data('id')
            var actionUrl = `/contact-delete/${id}`;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })
    </script>

    <script>
        $('.btn-release-send').click(function() {
            id = $(this).data('id')
            var actionUrl = `/send-delete/${id}`;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })
    </script>

    <script>
        $('.btn-delete-report').click(function() {
            id = $(this).data('id')
            var actionUrl = `/report/${id}`;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })
    </script>

    <script>
        $('.btn-recovery-report').click(function() {
            id = $(this).data('id')
            var actionUrl = `/report-recovery/${id}`;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })
    </script>

    <script>
        $('.btn-release-report').click(function() {
            id = $(this).data('id')
            var actionUrl = `/report-delete/${id}`;
            $('#form-delete').attr('action', actionUrl);
            $('#modal-delete').modal('show')
        })
    </script>

    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
        });
    </script> --}}


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.report').hide();
            $('.trash').hide();

            $('.chat-report').hide();
            $('.chat-contactDel').hide();
            $('.chat-reportDel').hide();
            $('.chat-content').hide();

            $('.buttonContact').click(function() {
                var chatId = $(this).data('chat-id');
                $('.chat-report').hide();
                $('.chat-contactDel').hide();
                $('.chat-reportDel').hide();
                $('.chat-content').hide();
                $('#chat_content_' + chatId).show();
            });

            $('.buttonReport').click(function() {
                var chatId = $(this).data('chat-id');
                $('.chat-contactDel').hide();
                $('.chat-reportDel').hide();
                $('.chat-content').hide();
                $('.chat-report').hide();
                $('#chat_report_' + chatId).show();
            });

            $('.buttonDelete').click(function() {
                $('.chat-contactDel').hide();
                $('.chat-reportDel').hide();
                $('.chat-content').hide();
                $('.chat-report').hide();
            });

            $('.show-contact').click(function() {
                var chatId = $(this).data('chat-id');
                $('.chat-report').hide();
                $('.chat-contactDel').hide();
                $('.chat-reportDel').hide();
                $('.chat-content').hide();
                $('#chat_content_' + chatId).show();
            });

            $('.show-report').click(function() {
                var chatId = $(this).data('chat-id');
                $('.chat-content').hide();
                $('.chat-contactDel').hide();
                $('.chat-reportDel').hide();
                $('.chat-report').hide();
                $('#chat_report_' + chatId).show();
            });

            $('.show-delete-contact').click(function() {
                var chatId = $(this).data('chat-id');
                $('.chat-content').hide();
                $('.chat-contactDel').hide();
                $('.chat-reportDel').hide();
                $('.chat-report').hide();
                $('#chat_contactDel_' + chatId).show();
            });

            $('.show-delete-report').click(function() {
                var chatId = $(this).data('chat-id');
                $('.chat-content').hide();
                $('.chat-contactDel').hide();
                $('.chat-reportDel').hide();
                $('.chat-report').hide();
                $('#chat_reportDel_' + chatId).show();
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            function updateMessageCount() {
                $.ajax({
                    url: '/countInbox',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        if (data.count == 0) {
                            $('#messageCountBadge').hide();
                        } else {
                            $('#messageCountBadge').text(data.count).show();
                        }
                    },
                    error: function() {
                        console.error('Failed to fetch message count.');
                    }
                });
            }

            setInterval(updateMessageCount, 5000);
            updateMessageCount();
        });

        $(document).ready(function() {
            function updateRejectCount() {
                $.ajax({
                    url: '/countInboxReport',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        if (data.countReport == 0) {
                            $('#messageRejectBadge').hide();
                        } else {
                            $('#messageRejectBadge').text(data.countReport).show();
                        }
                    },
                    error: function() {
                        console.error('Failed to fetch message count.');
                    }
                });
            }

            setInterval(updateRejectCount, 5000);
            updateRejectCount();
        });

        $(document).ready(function() {
            function updateTotalCount() {
                $.ajax({
                    url: '/countInboxTotal',
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        if (data.countTotal == 0) {
                            $('#total').hide();
                        } else {
                            $('#total').text(data.countTotal).show();
                        }
                    },
                    error: function() {
                        console.error('Failed to fetch message count.');
                    }
                });
            }

            setInterval(updateTotalCount, 5000);
            updateTotalCount();
        });
    </script>
@endsection

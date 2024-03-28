<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="Javascript:void(0)" class="text-nowrap logo-img">
                <img src="{{ asset('assets/img/logo.png') }}" class="dark-logo" width="180" alt="" />
            </a>
            <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8 text-muted"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar>
            <ul id="sidebarnav">
                <!-- ============================= -->
                <!-- Home -->
                <!-- ============================= -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <!-- =================== -->
                <!-- Dashboard -->
                <!-- =================== -->
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('dashboard.admin' ? 'active' : '') }}"
                        href="{{ route('dashboard.admin') }}" aria-expanded="false">
                    {{-- <a class="sidebar-link {{ request()->routeIs('home' ? 'active' : '') }}"
                        href="javascript:void(0)" aria-expanded="false"> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2">
                                <path d="M4 10a6 6 0 1 0 12 0a6 6 0 1 0-12 0" />
                                <path
                                    d="M13.5 15h.5a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-1a2 2 0 0 1 2-2h.5m9.5 2a5.698 5.698 0 0 0 4.467-7.932L20 8m-10 2v.01" />
                                <path d="M19 8a1 1 0 1 0 2 0a1 1 0 1 0-2 0" />
                            </g>
                        </svg>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('faq.admin' ? 'active' : '') }}"
                        href="{{ route('faq.admin') }}" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 14 14"><circle cx="7" cy="7" r="6.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M5.5 5.5A1.5 1.5 0 1 1 7 7v1"/><path fill="currentColor" d="M7 9.5a.75.75 0 1 0 .75.75A.76.76 0 0 0 7 9.5Z"/></svg>
                        <span class="hide-menu">Faq</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('tag.detail.list' ? 'active' : '') }}"
                        href="{{ route('tag.detail.list') }}" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M3 23V7q0-.825.588-1.412T5 5h10q.825 0 1.413.588T17 7v16l-7-3zm2-3.05l5-2.15l5 2.15V7H5zM19 20V3H6V1h13q.825 0 1.413.588T21 3v17zM5 7h10z"/></svg>
                        <span class="hide-menu">Tag</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('report.index' ? 'active' : '') }}"
                        href="{{ route('report.index') }}" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9l3.75 3a2 2 0 0 0 2.5 0L17 9m4 8V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2"/></svg>
                        <span class="hide-menu">Inbox</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('user.index' ? 'active' : '') }}"
                        href="{{ route('author.admin') }}" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 16 16"><path fill="currentColor" d="M4 4.5a1.5 1.5 0 1 1 3 0a1.5 1.5 0 0 1-3 0M5.5 2a2.5 2.5 0 1 0 0 5a2.5 2.5 0 0 0 0-5m5 3a1 1 0 1 1 2 0a1 1 0 0 1-2 0m-.578 1.23A5.5 5.5 0 0 1 11.5 6a5.5 5.5 0 0 1 1.578.23a2 2 0 1 0-3.155 0M3 8h4.257A5.508 5.508 0 0 0 6.6 9H3a.5.5 0 0 0-.5.5v.097l.004.048a1.853 1.853 0 0 0 .338.857c.326.449 1.036.998 2.658.998c.177 0 .344-.007.5-.019v.019c0 .334.03.66.087.977a7.291 7.291 0 0 1-.587.023c-1.878 0-2.918-.654-3.467-1.409a2.853 2.853 0 0 1-.523-1.342a1.908 1.908 0 0 1-.01-.137V9.5A1.5 1.5 0 0 1 3 8m13 3.5a4.5 4.5 0 1 1-9 0a4.5 4.5 0 0 1 9 0m-4-2a.5.5 0 0 0-1 0V11H9.5a.5.5 0 0 0 0 1H11v1.5a.5.5 0 0 0 1 0V12h1.5a.5.5 0 0 0 0-1H12z"/></svg>
                        <span class="hide-menu">Permintaan Penulis</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('user.index' ? 'active' : '') }}"
                        href="{{ route('list.author.admin') }}" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 28 28"><path fill="currentColor" d="M8.5 3.5a2.25 2.25 0 1 0 0 4.5a2.25 2.25 0 0 0 0-4.5M4.75 5.75a3.75 3.75 0 1 1 7.5 0a3.75 3.75 0 0 1-7.5 0M2 12.982C2 11.887 2.887 11 3.982 11h5.6a4.728 4.728 0 0 0-.326 1.5H3.982a.482.482 0 0 0-.482.482v.393c0 .172.002 1.213.607 2.197c.52.844 1.554 1.759 3.753 1.907a2.993 2.993 0 0 0-1.136 1.368c-2.005-.371-3.207-1.372-3.894-2.49C2 15.01 2 13.618 2 13.378zM18.417 11c.186.468.3.973.326 1.5h5.275c.266 0 .482.216.482.482v.393c0 .172-.002 1.213-.608 2.197c-.519.844-1.552 1.759-3.752 1.907c.505.328.904.805 1.136 1.368c2.005-.371 3.207-1.372 3.894-2.49c.83-1.348.83-2.74.83-2.98v-.395A1.982 1.982 0 0 0 24.018 11zM19.5 3.5a2.25 2.25 0 1 0 0 4.5a2.25 2.25 0 0 0 0-4.5m-3.75 2.25a3.75 3.75 0 1 1 7.5 0a3.75 3.75 0 0 1-7.5 0M7.5 19.982C7.5 18.887 8.387 18 9.482 18h9.036c1.095 0 1.982.887 1.982 1.982v.395c0 .24 0 1.632-.83 2.98C18.8 24.773 17.106 26 14 26s-4.8-1.228-5.67-2.642c-.83-1.349-.83-2.74-.83-2.981zm1.982-.482a.482.482 0 0 0-.482.482v.393c0 .172.002 1.213.607 2.197c.568.922 1.749 1.928 4.393 1.928c2.644 0 3.825-1.006 4.392-1.928c.606-.983.608-2.025.608-2.197v-.393a.482.482 0 0 0-.482-.482zm2.268-6.75a2.25 2.25 0 1 1 4.5 0a2.25 2.25 0 0 1-4.5 0M14 9a3.75 3.75 0 1 0 0 7.5A3.75 3.75 0 0 0 14 9"/></svg>
                        <span class="hide-menu">Daftar Penulis</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('categories.index' ? 'active' : '') }}"
                        href="{{ route('categories.index') }}" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 8h5m0 4h-5m5 4h-5m-5 4h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2m2-4"/></svg>
                        <span class="hide-menu">Kategori</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('approved-news.index' ? 'active' : '') }}"
                        href="{{ route('approved-news.index') }}" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M17.5 18.5v2q0 .2.15.35T18 21q.2 0 .35-.15t.15-.35v-2h2q.2 0 .35-.15T21 18q0-.2-.15-.35t-.35-.15h-2v-2q0-.2-.15-.35T18 15q-.2 0-.35.15t-.15.35v2h-2q-.2 0-.35.15T15 18q0 .2.15.35t.35.15zM5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h14q.825 0 1.413.588T21 5v5q0 .425-.288.713T20 11q-.425 0-.712-.288T19 10V5H5v14h5q.425 0 .713.288T11 20q0 .425-.288.713T10 21zm0-3v1V5v6.075V11zm2-2q0 .425.288.713T8 17h2.075q.425 0 .713-.288t.287-.712q0-.425-.287-.712T10.075 15H8q-.425 0-.712.288T7 16m0-4q0 .425.288.713T8 13h5q.425 0 .713-.288T14 12q0-.425-.288-.712T13 11H8q-.425 0-.712.288T7 12m0-4q0 .425.288.713T8 9h8q.425 0 .713-.288T17 8q0-.425-.288-.712T16 7H8q-.425 0-.712.288T7 8m11 15q-2.075 0-3.537-1.463T13 18q0-2.075 1.463-3.537T18 13q2.075 0 3.538 1.463T23 18q0 2.075-1.463 3.538T18 23"/></svg>
                        <span class="hide-menu">Konfirmasi Berita</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('list.approved' ? 'active' : '') }}"
                        href="{{ route('list.approved') }}" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><g fill="currentColor"><path d="M2 6a3 3 0 0 1 3-3h14a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V6zm3-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H5z"/><path d="M6 8a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V8zm2 1v2h2V9H8zm6-1a1 1 0 0 1 1-1h2a1 1 0 1 1 0 2h-2a1 1 0 0 1-1-1zm0 4a1 1 0 0 1 1-1h2a1 1 0 1 1 0 2h-2a1 1 0 0 1-1-1zm-8 4a1 1 0 0 1 1-1h10a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1z"/></g></svg>
                        <span class="hide-menu">Berita</span>
                    </a>
                </li>
                {{-- <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('admin.report' ? 'active' : '') }}"
                        href="{{ route('admin.report') }}" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a5 5 0 0 1 7 0a5 5 0 0 0 7 0v9a5 5 0 0 1-7 0a5 5 0 0 0-7 0zm0 16v-7"/></svg>
                        <span class="hide-menu">Laporan</span>
                    </a>
                </li> --}}
                <li class="sidebar-item">
                    <a class="sidebar-link"
                        href="/" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 512 512"><path d="M312 372c-7.7 0-14 6.3-14 14 0 9.9-8.1 18-18 18H94c-9.9 0-18-8.1-18-18V126c0-9.9 8.1-18 18-18h186c9.9 0 18 8.1 18 18 0 7.7 6.3 14 14 14s14-6.3 14-14c0-25.4-20.6-46-46-46H94c-25.4 0-46 20.6-46 46v260c0 25.4 20.6 46 46 46h186c25.4 0 46-20.6 46-46 0-7.7-6.3-14-14-14z" fill="currentColor"/><path d="M372.9 158.1c-2.6-2.6-6.1-4.1-9.9-4.1-3.7 0-7.3 1.4-9.9 4.1-5.5 5.5-5.5 14.3 0 19.8l65.2 64.2H162c-7.7 0-14 6.3-14 14s6.3 14 14 14h256.6L355 334.2c-5.4 5.4-5.4 14.3 0 19.8l.1.1c2.7 2.5 6.2 3.9 9.8 3.9 3.8 0 7.3-1.4 9.9-4.1l82.6-82.4c4.3-4.3 6.5-9.3 6.5-14.7 0-5.3-2.3-10.3-6.5-14.5l-84.5-84.2z" fill="currentColor"/></svg>
                        <span class="hide-menu">Kembali</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

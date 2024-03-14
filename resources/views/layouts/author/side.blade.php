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

                <li class="sidebar-item">
                    <a class="sidebar-link  {{ request()->routeIs('profile.index') || request()->routeIs('profile.user') ? 'active' : '' }}"
                        @role('author')
                        href="{{route('profile.index')}}"
                        @else
                        href="javascript:void(0)"
                        @endrole
                        aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 256 256"><path fill="currentColor" d="m218.83 103.77l-80-75.48a1.14 1.14 0 0 1-.11-.11a16 16 0 0 0-21.53 0l-.11.11l-79.91 75.48A16 16 0 0 0 32 115.55V208a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16v-48h32v48a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16v-92.45a16 16 0 0 0-5.17-11.78M208 208h-48v-48a16 16 0 0 0-16-16h-32a16 16 0 0 0-16 16v48H48v-92.45l.11-.1L128 40l79.9 75.43l.11.1Z"/></svg>
                        <span class="hide-menu">General</span>
                    </a>
                </li>
                @role('author')
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('author.inbox' ? 'active' : '') }}"
                        href="{{route('author.inbox')}}" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2zm-2 0l-8 5l-8-5zm0 12H4V8l8 5l8-5z"/></svg>
                        <span class="hide-menu">Inbox</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('statistic.author' ? 'active' : '') }}"
                        href="{{route('statistic.author')}}" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 9l3.75 3a2 2 0 0 0 2.5 0L17 9m4 8V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2"/></svg>
                        <span class="hide-menu">Statistik</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('profile.berita.create' ? 'active' : '') }}"
                        href="{{route('profile.berita.create')}}" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M11 13H5v-2h6V5h2v6h6v2h-6v6h-2z"/></svg>
                        <span class="hide-menu">Upload Berita</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('pages' ? 'active' : '') }}"
                        href="{{route('profile-status.author')}}" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 512 512"><path fill="currentColor" d="M256 48C141.31 48 48 141.31 48 256s93.31 208 208 208s208-93.31 208-208S370.69 48 256 48m0 319.91a20 20 0 1 1 20-20a20 20 0 0 1-20 20m21.72-201.15l-5.74 122a16 16 0 0 1-32 0l-5.74-121.94v-.05a21.74 21.74 0 1 1 43.44 0Z"/></svg>
                        <span class="hide-menu">Status Berita</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('logout' ? 'active' : '') }}"
                        href="{{ route('logout') }}/login" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 512 512"><path d="M312 372c-7.7 0-14 6.3-14 14 0 9.9-8.1 18-18 18H94c-9.9 0-18-8.1-18-18V126c0-9.9 8.1-18 18-18h186c9.9 0 18 8.1 18 18 0 7.7 6.3 14 14 14s14-6.3 14-14c0-25.4-20.6-46-46-46H94c-25.4 0-46 20.6-46 46v260c0 25.4 20.6 46 46 46h186c25.4 0 46-20.6 46-46 0-7.7-6.3-14-14-14z" fill="currentColor"/><path d="M372.9 158.1c-2.6-2.6-6.1-4.1-9.9-4.1-3.7 0-7.3 1.4-9.9 4.1-5.5 5.5-5.5 14.3 0 19.8l65.2 64.2H162c-7.7 0-14 6.3-14 14s6.3 14 14 14h256.6L355 334.2c-5.4 5.4-5.4 14.3 0 19.8l.1.1c2.7 2.5 6.2 3.9 9.8 3.9 3.8 0 7.3-1.4 9.9-4.1l82.6-82.4c4.3-4.3 6.5-9.3 6.5-14.7 0-5.3-2.3-10.3-6.5-14.5l-84.5-84.2z" fill="currentColor"/></svg>
                        <span class="hide-menu">Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                    class="d-none">
                    @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>

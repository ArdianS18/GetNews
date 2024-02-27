<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="Javascript:void(0)" class="text-nowrap logo-img">
                <img src="{{ env('APP_LOGO_SIDEBAR') }}" class="dark-logo" width="180" alt="" />
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
                    <a class="sidebar-link {{ request()->routeIs('home' ? 'active' : '') }}"
                        href="{{ route('home') }}" aria-expanded="false">
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
                <!-- =================== -->
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('faq.index' ? 'active' : '') }}"
                        href="{{ route('faq.index') }}" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 14 14"><circle cx="7" cy="7" r="6.5" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M5.5 5.5A1.5 1.5 0 1 1 7 7v1"/><path fill="currentColor" d="M7 9.5a.75.75 0 1 0 .75.75A.76.76 0 0 0 7 9.5Z"/></svg>
                        <span class="hide-menu">Faq</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

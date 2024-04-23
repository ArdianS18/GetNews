<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div style="background-color: #183249;">
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="Javascript:void(0)" class="text-nowrap logo-img">
                <img src="{{ asset('assets/img/logo-get-media.png') }}" class="dark-logo" width="180" alt="" />
            </a>
            <div class="close-btn d-lg-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8 text-muted"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar>
            <ul id="sidebarnav">
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                <span class="hide-menu text-white">Home</span>
              </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('profile.user' ? 'active' : '') }}"
                        href="{{ route('profile.user') }}" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 256 256"><path fill="currentColor" d="m218.83 103.77l-80-75.48a1.14 1.14 0 0 1-.11-.11a16 16 0 0 0-21.53 0l-.11.11l-79.91 75.48A16 16 0 0 0 32 115.55V208a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16v-48h32v48a16 16 0 0 0 16 16h48a16 16 0 0 0 16-16v-92.45a16 16 0 0 0-5.17-11.78M208 208h-48v-48a16 16 0 0 0-16-16h-32a16 16 0 0 0-16 16v48H48v-92.45l.11-.1L128 40l79.9 75.43l.11.1Z"/></svg>
                        <span class="hide-menu">Beranda</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('user.inbox' ? 'active' : '') }}"
                        href="{{route('user.inbox')}}" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2zm-2 0l-8 5l-8-5zm0 12H4V8l8 5l8-5z"/></svg>
                        <span class="hide-menu">Inbox</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link {{ request()->routeIs('tukar.coin' ? 'active' : '') }}"
                        href="{{route('tukar.coin')}}" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M12 22c3.976 0 8-1.374 8-4V6c0-2.626-4.024-4-8-4S4 3.374 4 6v12c0 2.626 4.024 4 8 4m0-2c-3.722 0-6-1.295-6-2v-1.268C7.541 17.57 9.777 18 12 18s4.459-.43 6-1.268V18c0 .705-2.278 2-6 2m0-16c3.722 0 6 1.295 6 2s-2.278 2-6 2s-6-1.295-6-2s2.278-2 6-2M6 8.732C7.541 9.57 9.777 10 12 10s4.459-.43 6-1.268V10c0 .705-2.278 2-6 2s-6-1.295-6-2zm0 4C7.541 13.57 9.777 14 12 14s4.459-.43 6-1.268V14c0 .705-2.278 2-6 2s-6-1.295-6-2z"/></svg>
                        <span class="hide-menu">Tukarkan Koin</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M18.75 20H5.25a3.25 3.25 0 0 1-3.245-3.066L2 16.75V6.25a2.25 2.25 0 0 1 2.096-2.245L4.25 4h12.5a2.25 2.25 0 0 1 2.245 2.096L19 6.25V7h.75a2.25 2.25 0 0 1 2.245 2.096L22 9.25v7.5a3.25 3.25 0 0 1-3.066 3.245zH5.25zm-13.5-1.5h13.5a1.75 1.75 0 0 0 1.744-1.607l.006-.143v-7.5a.75.75 0 0 0-.648-.743L19.75 8.5H19v7.75a.75.75 0 0 1-.648.743L18.25 17a.75.75 0 0 1-.743-.648l-.007-.102v-10a.75.75 0 0 0-.648-.743L16.75 5.5H4.25a.75.75 0 0 0-.743.648L3.5 6.25v10.5a1.75 1.75 0 0 0 1.606 1.744zh13.5zm6.996-4h3.006a.75.75 0 0 1 .102 1.493l-.102.007h-3.006a.75.75 0 0 1-.102-1.493zh3.006zm-3.003-3.495a.75.75 0 0 1 .75.75v3.495a.75.75 0 0 1-.75.75H5.748a.75.75 0 0 1-.75-.75v-3.495a.75.75 0 0 1 .75-.75zm-.75 1.5H6.498V14.5h1.995zm3.753-1.5h3.006a.75.75 0 0 1 .102 1.493l-.102.007h-3.006a.75.75 0 0 1-.102-1.494zh3.006zM5.748 7.502h9.504a.75.75 0 0 1 .102 1.494l-.102.006H5.748a.75.75 0 0 1-.102-1.493zh9.504z"/></svg>
                      <span class="hide-menu">Berita</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level">
                      <li class="sidebar-item">
                        <a href="{{route('berita.upload')}}" class="sidebar-link">
                          <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="ti ti-circle"></i>
                          </div>
                          <span class="hide-menu">Unggah Berita</span>
                        </a>
                      </li>
                      <li class="sidebar-item">
                        <a href="{{route('status.berita')}}" class="sidebar-link">
                          <div class="round-16 d-flex align-items-center justify-content-center">
                            <i class="ti ti-circle"></i>
                          </div>
                          <span class="hide-menu">Status Berita</span>
                        </a>
                      </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                  <a class="sidebar-link has-arrow" href="#" aria-expanded="false">
                      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M18.75 20H5.25a3.25 3.25 0 0 1-3.245-3.066L2 16.75V6.25a2.25 2.25 0 0 1 2.096-2.245L4.25 4h12.5a2.25 2.25 0 0 1 2.245 2.096L19 6.25V7h.75a2.25 2.25 0 0 1 2.245 2.096L22 9.25v7.5a3.25 3.25 0 0 1-3.066 3.245zH5.25zm-13.5-1.5h13.5a1.75 1.75 0 0 0 1.744-1.607l.006-.143v-7.5a.75.75 0 0 0-.648-.743L19.75 8.5H19v7.75a.75.75 0 0 1-.648.743L18.25 17a.75.75 0 0 1-.743-.648l-.007-.102v-10a.75.75 0 0 0-.648-.743L16.75 5.5H4.25a.75.75 0 0 0-.743.648L3.5 6.25v10.5a1.75 1.75 0 0 0 1.606 1.744zh13.5zm6.996-4h3.006a.75.75 0 0 1 .102 1.493l-.102.007h-3.006a.75.75 0 0 1-.102-1.493zh3.006zm-3.003-3.495a.75.75 0 0 1 .75.75v3.495a.75.75 0 0 1-.75.75H5.748a.75.75 0 0 1-.75-.75v-3.495a.75.75 0 0 1 .75-.75zm-.75 1.5H6.498V14.5h1.995zm3.753-1.5h3.006a.75.75 0 0 1 .102 1.493l-.102.007h-3.006a.75.75 0 0 1-.102-1.494zh3.006zM5.748 7.502h9.504a.75.75 0 0 1 .102 1.494l-.102.006H5.748a.75.75 0 0 1-.102-1.493zh9.504z"/></svg>
                    <span class="hide-menu">Iklan</span>
                  </a>
                  <ul aria-expanded="false" class="collapse first-level">
                    <li class="sidebar-item">
                      <a href="{{route('iklan.biodata')}}" class="sidebar-link">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                          <i class="ti ti-circle"></i>
                        </div>
                        <span class="hide-menu">Unggah Iklan</span>
                      </a>
                    </li>
                    <li class="sidebar-item">
                      <a href="{{route('iklan.status')}}" class="sidebar-link">
                        <div class="round-16 d-flex align-items-center justify-content-center">
                          <i class="ti ti-circle"></i>
                        </div>
                        <span class="hide-menu">Status Iklan</span>
                      </a>
                    </li>
                  </ul>
                </li>
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

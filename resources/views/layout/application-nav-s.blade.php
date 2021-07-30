<li class="nav-item" data-menu-parent="global">
    <a class="nav-link" href="{{ url('stdashboard') }}">
        <span class="nav-link-icon d-md-none d-lg-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <polyline points="5 12 3 12 12 3 21 12 19 12" />
                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
        </span>
        <span class="nav-link-title">
            Beranda
        </span>
    </a>
</li>
<li class="nav-item dropdown" data-menu-parent="attitude">
    <a class="nav-link dropdown-toggle" href="#navbar-base" data-toggle="dropdown"
        role="button" aria-expanded="false">
        <span class="nav-link-icon d-md-none d-lg-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path
                    d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                <rect x="9" y="3" width="6" height="4" rx="2" />
                <line x1="9" y1="12" x2="9.01" y2="12" />
                <line x1="13" y1="12" x2="15" y2="12" />
                <line x1="9" y1="16" x2="9.01" y2="16" />
                <line x1="13" y1="16" x2="15" y2="16" /></svg>
        </span>
        <span class="nav-link-title">
            Evaluasi Perilaku
        </span>
    </a>
    <div class="dropdown-menu">
        <div class="dropdown-menu-columns">
            <div class="dropdown-menu-column">
                <a class="dropdown-item" href="{{ url('stattitude/trophy') }}">
                    Catatan Prestasi
                </a>
                <a class="dropdown-item" href="{{ url('stattitude/violation') }}">
                    Pelanggaran Tata Tertib
                </a>
                <a class="dropdown-item" href="{{ url('stattitude/counseling') }}">
                    Bimbingan Konseling
                </a>
            </div>
        </div>
    </div>
</li>
<li class="nav-item dropdown" data-menu-parent="learning">
    <a class="nav-link dropdown-toggle" href="#navbar-base" data-toggle="dropdown"
        role="button" aria-expanded="false">
        <span class="nav-link-icon d-md-none d-lg-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <rect x="4" y="4" width="6" height="5" rx="2" />
                <rect x="4" y="13" width="6" height="7" rx="2" />
                <rect x="14" y="4" width="6" height="7" rx="2" />
                <rect x="14" y="15" width="6" height="5" rx="2" /></svg>
        </span>
        <span class="nav-link-title">
            Informasi dan KBM
        </span>
    </a>
    <div class="dropdown-menu">
        <div class="dropdown-menu-columns">
            <div class="dropdown-menu-column">
                <a class="dropdown-item" href="{{ url('stlearning/announcement') }}">
                    Pengumuman
                </a>
                <a class="dropdown-item" href="{{ url('stlearning/report') }}">
                    Laporan Belajar
                </a>
            </div>
        </div>
    </div>
</li>
<li class="nav-item">
    <a class="nav-link" href="https://revolution-of-school.gitbook.io/sobat-siswa/">
        <span class="nav-link-icon d-md-none d-lg-inline-block">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <circle cx="12" cy="12" r="9" />
                <line x1="12" y1="8" x2="12.01" y2="8" />
                <polyline points="11 12 12 12 12 16 13 16" /></svg>
        </span>
        <span class="nav-link-title">
            Bantuan
        </span>
    </a>
</li>
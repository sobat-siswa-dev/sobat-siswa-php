<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Sobat Siswa | @yield("title")</title>
    @include("assets/header")
</head>

<body class="antialiased">
    <div class="page">
        <header class="navbar navbar-expand-md navbar-dark navbar-overlap d-print-none">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a href="{{ url('dashboard') }}" class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pr-0 pr-md-3">
                    <img src="{{ asset('./staticRes/logo-white-ss.svg') }}" width="110" height="32" alt="Tabler" class="navbar-brand-image">
                </a>
                <div class="navbar-nav flex-row order-md-last">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-toggle="dropdown">
                            @if (session()->get("admTeacher"))
                                <span class="avatar avatar-sm" style="background-image: url({{ asset('./distRes/img/teacher-placeholder.png') }})"></span>
                                <div class="d-none d-xl-block ps-2 ml-3">
                                    <div class="text-white">{{ session()->get("admTeacher")->name }}</div>
                                    <div class="mt-1 small text-muted">Guru</div>
                                </div>
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            @if (session()->get("admTeacher"))
                                <a href="#" class="dropdown-item font-weight-bold bg-white d-block d-xl-none">
                                    {{ session()->get("admTeacher")->name }} <span class="font-weight-normal">(Guru)</span>
                                </a>
                                <hr class="my-1 d-block d-xl-none">
                                <a href="{{ url('/changePassword') }}" class="dropdown-item">Ubah Kata Sandi</a>
                            @endif
                            <a href="{{ url('/logout') }}" class="dropdown-item">Keluar</a>
                        </div>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                        <ul class="navbar-nav">
                            <li class="nav-item" data-menu-parent="global">
                                <a class="nav-link" href="{{ url('dashboard') }}">
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
                            <li class="nav-item dropdown" data-menu-parent="master">
                                <a class="nav-link dropdown-toggle" href="#navbar-base" data-toggle="dropdown"
                                    role="button" aria-expanded="false">
                                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8" /><line x1="13" y1="7" x2="13" y2="7.01" /><line x1="17" y1="7" x2="17" y2="7.01" /><line x1="17" y1="11" x2="17" y2="11.01" /><line x1="17" y1="15" x2="17" y2="15.01" /></svg>
                                    </span>
                                    <span class="nav-link-title">
                                        Data Dasar
                                    </span>
                                </a>
                                <div class="dropdown-menu">
                                    <div class="dropdown-menu-columns">
                                        <div class="dropdown-menu-column">
                                            <a class="dropdown-item" href="{{ url('master/school') }}">
                                                Sekolah
                                            </a>
                                            <a class="dropdown-item" href="{{ url('master/classGroup') }}">
                                                Grup Kelas / Jurusan
                                            </a>
                                            <a class="dropdown-item" href="{{ url('master/class') }}">
                                                Kelas
                                            </a>
                                            <a class="dropdown-item" href="{{ url('master/student') }}">
                                                Siswa
                                            </a>
                                            <a class="dropdown-item" href="{{ url('master/teacher') }}">
                                                Guru
                                            </a>
                                            <a class="dropdown-item" href="{{ url('master/alumn') }}">
                                                Alumni
                                            </a>
                                            <a class="dropdown-item" href="{{ url('master/rule') }}">
                                                Tata Tertib
                                            </a>
                                        </div>
                                    </div>
                                </div>
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
                                            <a class="dropdown-item" href="{{ url('attitude/trophy') }}">
                                                Catatan Prestasi
                                            </a>
                                            <a class="dropdown-item" href="{{ url('attitude/violation') }}">
                                                Pelanggaran Tata Tertib
                                            </a>
                                            <a class="dropdown-item" href="{{ url('attitude/counseling') }}">
                                                Bimbingan Konseling
                                            </a>
                                            <a class="dropdown-item" href="{{ url('attitude/violationStatistic') }}">
                                                Statistik Pelanggaran
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
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
                                            <a class="dropdown-item" href="#">
                                                Raport
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                Pengumuman
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                Majalah Dinding
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./index.html">
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
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        @yield('content')
        @include("assets/footer")
    </div>
    <div class="modal modal-blur fade" id="modal-alert" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div id="modal-alert-title" class="modal-title">Apakah anda yakin ?</div>
                    <div id="modal-alert-description">Jika anda yakin, maka akan terjadi suatu hal.</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Tidak</button>
                    <button type="button" id="modal-alert-trigger" class="btn btn-danger" data-dismiss="modal">Iya</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $(`[data-menu-parent='@yield("menu-parent")']`).addClass("active");
        });
    </script>
</body>

</html>
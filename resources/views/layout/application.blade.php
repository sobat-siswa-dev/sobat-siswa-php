<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ session()->get("admSchool") ? session()->get("admSchool")->name : 'Sobat Siswa' }} | @yield("title")</title>
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
                    <span class="avatar avatar-sm" style="margin-right: 15px; background-size: 75% 75%; background-image: url({{ asset(session()->get('admSchool')->logo ? session()->get('admSchool')->logo : './distRes/img/school-placeholder.png') }})"></span>
                    {{ session()->get("admSchool")->name }}
                </a>
                <div class="navbar-nav flex-row order-md-last">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-toggle="dropdown">
                            @if (session()->get("admTeacher"))
                                <span class="avatar avatar-sm" style="background-image: url({{ asset('./distRes/img/teacher-placeholder.png') }})"></span>
                                <div class="d-none d-xl-block ps-2 ml-3">
                                    <div class="text-white">{{ session()->get("admTeacher")->name }}</div>
                                    <div class="mt-1 small text-muted">
                                        @if (session()->get("admTeacher")->role >= 0 || session()->get("admTeacher")->role <= 3)
                                            {{ (["Pengelola", "Tata Usaha", "Kesiswaan / Bimbingan Konseling", "Guru Umum"])[session()->get("admTeacher")->role] }}
                                        @endif
                                    </div>
                                </div>
                            @elseif (session()->get("admStudent"))
                                <span class="avatar avatar-sm" style="background-image: url({{ asset('./distRes/img/student-placeholder.png') }})"></span>
                                <div class="d-none d-xl-block ps-2 ml-3">
                                    <div class="text-white">{{ session()->get("admStudent")->name }}</div>
                                    <div class="mt-1 small text-muted">Siswa</div>
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
                            @elseif (session()->get("admStudent"))
                                <a href="#" class="dropdown-item font-weight-bold bg-white d-block d-xl-none">
                                    {{ session()->get("admStudent")->name }} <span class="font-weight-normal">(Siswa)</span>
                                </a>
                                <hr class="my-1 d-block d-xl-none">
                                <a href="{{ url('/stbiodata') }}" class="dropdown-item">Biodata</a>
                                <a href="{{ url('/stchangePassword') }}" class="dropdown-item">Ubah Kata Sandi</a>
                            @endif
                            <a href="{{ url('/logout') }}" class="dropdown-item">Keluar</a>
                        </div>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                        <ul class="navbar-nav">
                            @if (session()->get("admTeacher"))
                                @include("layout/application-nav-t")
                            @elseif (session()->get("admStudent"))
                                @include("layout/application-nav-s")
                            @endif
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
    @if (session()->has("admTeacher"))
        @if (in_array(session()->get("admTeacher")->role, [3, 2]))
            <script>
                if (window.location.href.includes("/master")) {
                    $('[data-btn-function="form"]').remove();
                }
                if (window.location.href.includes("/learning/report")) {
                    $('[data-btn-function="form"]').remove();
                }
            </script>
        @endif
        @if (in_array(session()->get("admTeacher")->role, [3, 1]))
            <script>
                if (window.location.href.includes("/attitude")) {
                    $('[data-btn-function="form"]').remove();
                }
            </script>
        @endif
    @endif
</body>

</html>
@extends('layout.application')
@section('title', 'Dashboard')
@section('menu-parent', 'global')
@section('content')
    <div class="content">
        <div class="container-xl">
            <div class="page-header text-white d-print-none">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="page-pretitle">
                            Beranda
                        </div>
                        <h2 class="page-title">
                            Selamat Datang
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row row-deck row-cards">
                <div class="col-md-12 mb-md-0 mb-3">
                    <div class="row row-cards">
                        <div class="col-md-3 col-12">
                            <div class="card card-sm">
                                <div class="card-body d-flex align-items-center">
                                    <span class="bg-blue text-white avatar mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="9" cy="7" r="4" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M21 21v-2a4 4 0 0 0 -3 -3.85" /></svg>
                                    </span>
                                    <div class="mr-3">
                                        <div class="font-weight-medium">
                                            Jumlah Siswa
                                        </div>
                                        <div class="text-muted">{{ $admStudentCount + 0 }} Siswa</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="card card-sm">
                                <div class="card-body d-flex align-items-center">
                                    <span class="bg-green text-white avatar mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="3" y1="21" x2="21" y2="21" /><line x1="9" y1="8" x2="10" y2="8" /><line x1="9" y1="12" x2="10" y2="12" /><line x1="9" y1="16" x2="10" y2="16" /><line x1="14" y1="8" x2="15" y2="8" /><line x1="14" y1="12" x2="15" y2="12" /><line x1="14" y1="16" x2="15" y2="16" /><path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16" /></svg>
                                    </span>
                                    <div class="mr-3">
                                        <div class="font-weight-medium">
                                            Jumlah Kelas
                                        </div>
                                        <div class="text-muted">{{ $admClassCount + 0 }} Kelas</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="card card-sm">
                                <div class="card-body d-flex align-items-center">
                                    <span class="bg-yellow text-white avatar mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none" /> <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" /> <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" /></svg>
                                    </span>
                                    <div class="mr-3">
                                        <div class="font-weight-medium">
                                            Jumlah Guru
                                        </div>
                                        <div class="text-muted">{{ $admTeacherCount + 0 }} Guru</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="card card-sm">
                                <div class="card-body d-flex align-items-center">
                                    <span class="bg-twitter text-white avatar avatar-dashboard mr-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="9" cy="7" r="4" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 11l2 2l4 -4" /></svg>
                                    </span>
                                    <div class="mr-3">
                                        <div class="font-weight-medium">
                                            Jumlah Alumni
                                        </div>
                                        <div class="text-muted">{{ $admStudentAlumnCount + 0 }} Alumni</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 d-block">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h4 class="card-title">
                                <span class="text-white card-icon p-1 mr-2 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="10" height="10" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16 6h3a1 1 0 0 1 1 1v11a2 2 0 0 1 -4 0v-13a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1v12a3 3 0 0 0 3 3h11" /><line x1="8" y1="8" x2="12" y2="8" /><line x1="8" y1="12" x2="12" y2="12" /><line x1="8" y1="16" x2="12" y2="16" /></svg>
                                </span>
                                Pengumuman
                            </h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter">
                                <thead>
                                    <tr>
                                        <th class="w-1">
                                            Tanggal
                                        </th>
                                        <th>
                                            Informasi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kbmAnnouncementRecent as $recent)
                                        <tr>
                                            <td class="text-nowrap">
                                                <a href="{{ url('/learning/announcement/' . $recent->id) }}" class="text-muted">
                                                    <small>
                                                        {{ date("d F Y", strtotime($recent->created_at)) }}
                                                    </small>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ url('/learning/announcement/' . $recent->id) }}" class="text-black">
                                                    {{ $recent->title }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if (count($kbmAnnouncementRecent) == 0)
                                        <tr>
                                            <td colspan="3">
                                                <div class="my-3 mt-2">
                                                    <img class="d-block m-auto" style="width: 200px; max-width: 100%;" src="{{ asset('./staticRes/empty.png') }}" alt="">
                                                    <h3 class="text-center" style="color: #2e576d; font-weight: bolder;">
                                                        Tidak ada data
                                                    </h3>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <a href="{{ url('/learning/announcement') }}"><small>Lihat Semuanya</small></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 d-block">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <span class="text-white card-icon p-1 mr-2 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="10" height="10" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" /><rect x="9" y="3" width="6" height="4" rx="2" /><path d="M10 12l4 4m0 -4l-4 4" /></svg>
                                </span>
                                Pelanggaran Terkini
                            </h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter">
                                <thead>
                                    <tr>
                                        <th class="w-1">
                                            Tanggal
                                        </th>
                                        <th>
                                            Nama
                                        </th>
                                        <th>
                                            Poin
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($behViolationRecent as $recent)
                                        <tr>
                                            <td class="text-nowrap">
                                                <a href="{{ url('/attitude/violation/' . $recent->student_id) }}" class="text-muted">
                                                    <small>
                                                        {{ date("d F Y", strtotime($recent->created_at)) }}
                                                    </small>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ url('/attitude/violation/' . $recent->student_id) }}" class="text-black">
                                                    {{ $recent->name }}
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ url('/attitude/violation/' . $recent->student_id) }}" class="text-black">
                                                    {{ $recent->description }}
                                                    <small class="d-block">
                                                        {{ $recent->poin + 0 }} Poin
                                                    </small>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if (count($behViolationRecent) == 0)
                                        <tr>
                                            <td colspan="3">
                                                <div class="my-3 mt-2">
                                                    <img class="d-block m-auto" style="width: 200px; max-width: 100%;" src="{{ asset('./staticRes/empty.png') }}" alt="">
                                                    <h3 class="text-center" style="color: #2e576d; font-weight: bolder;">
                                                        Tidak ada data
                                                    </h3>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <a href="{{ url('attitude/violation') }}"><small>Lihat Semuanya</small></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 d-block">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <span class="text-white card-icon p-1 mr-2 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="10" height="10" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="8" y1="21" x2="16" y2="21" /><line x1="12" y1="17" x2="12" y2="21" /><line x1="7" y1="4" x2="17" y2="4" /><path d="M17 4v8a5 5 0 0 1 -10 0v-8" /><circle cx="5" cy="9" r="2" /><circle cx="19" cy="9" r="2" /></svg>    
                                </span>
                                Prestasi Terkini
                            </h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter">
                                <thead>
                                    <tr>
                                        <th class="w-1">
                                            Tanggal
                                        </th>
                                        <th>
                                            Nama
                                        </th>
                                        <th>
                                            Deskripsi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($behTrophyRecent as $recent)
                                        <tr>
                                            <td class="text-nowrap">
                                                <a href="{{ url('/attitude/trophy/' . $recent->student_id) }}" class="text-muted">
                                                    <small>
                                                        {{ date("d F Y", strtotime($recent->created_at)) }}
                                                    </small>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ url('/attitude/trophy/' . $recent->student_id) }}" class="text-black">
                                                    {{ $recent->name }}
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ url('/attitude/trophy/' . $recent->student_id) }}" class="text-black">
                                                    {{ $recent->description }}
                                                    <small class="d-block">
                                                        {{ $recent->level }}
                                                    </small>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if (count($behTrophyRecent) == 0)
                                        <tr>
                                            <td colspan="3">
                                                <div class="my-3 mt-2">
                                                    <img class="d-block m-auto" style="width: 200px; max-width: 100%;" src="{{ asset('./staticRes/empty.png') }}" alt="">
                                                    <h3 class="text-center" style="color: #2e576d; font-weight: bolder;">
                                                        Tidak ada data
                                                    </h3>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <a href="{{ url('attitude/trophy') }}"><small>Lihat Semuanya</small></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include("assets.copyright")
    </div>
@stop
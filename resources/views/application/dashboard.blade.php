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
                <div class="col-md-12 col-lg-6 d-block">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Pelanggaran Tata Tertib Terkini</h4>
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
                                            <td class="text-nowrap text-muted">
                                                <small>
                                                    {{ date("d F Y", strtotime($recent->created_at)) }}
                                                </small>
                                            </td>
                                            <td>
                                                {{ $recent->name }}
                                            </td>
                                            <td>
                                                {{ $recent->description }}
                                                <small class="d-block">
                                                    {{ $recent->poin + 0 }} Poin
                                                </small>
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
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 d-block">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Prestasi Terkini</h4>
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
                                    @foreach ($behTrophyRecent as $recent)
                                        <tr>
                                            <td class="text-nowrap text-muted">
                                                <small>
                                                    {{ date("d F Y", strtotime($recent->created_at)) }}
                                                </small>
                                            </td>
                                            <td>
                                                {{ $recent->name }}
                                            </td>
                                            <td>
                                                {{ $recent->description }}
                                                <small class="d-block">
                                                    {{ $recent->level }}
                                                </small>
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
                    </div>
                </div>
            </div>
        </div>
        @include("assets.copyright")
    </div>
@stop
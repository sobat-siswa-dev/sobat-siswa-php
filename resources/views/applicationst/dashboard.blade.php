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
                                                <a href="{{ url('/stlearning/announcement/' . $recent->id) }}" class="text-muted">
                                                    <small>
                                                        {{ date("d F Y", strtotime($recent->created_at)) }}
                                                    </small>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ url('/stlearning/announcement/' . $recent->id) }}" class="text-black">
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
                            <a href="{{ url('/stlearning/announcement/') }}"><small>Lihat Semuanya</small></a>
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
                                            Tata Tertib dan Poin
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($behViolationRecent as $behViolation)
                                        <tr>
                                            <td class="text-nowrap text-muted">
                                                <small>
                                                    {{ date("d F Y", strtotime($behViolation->created_at)) }}
                                                </small>
                                            </td>
                                            <td>
                                                {{ $behViolation->description }}
                                                <small class="d-block">
                                                    {{ $behViolation->poin + 0 }} Poin
                                                </small>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if (count($behViolationRecent) == 0)
                                        <tr>
                                            <td colspan="2">
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
                            <a href="{{ url('stattitude/violation') }}"><small>Lihat Semuanya</small></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 d-block">
                    <div class="card mb-3">
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
                                            Deskripsi
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
                        <div class="card-footer">
                            <a href="{{ url('stattitude/trophy') }}"><small>Lihat Semuanya</small></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include("assets.copyright")
    </div>
@stop
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
                            <h4 class="card-title">Pengumuman</h4>
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
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <a href="#"><small>Lihat Semuanya</small></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4 d-block">
                    <div class="card mb-3">
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
                <div class="col-md-12 col-lg-4 d-block">
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
                                            Pelanggaran dan Poin
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
            </div>
        </div>
        @include("assets.copyright")
    </div>
@stop
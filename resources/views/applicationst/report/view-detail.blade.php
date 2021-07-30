@extends('layout.application')
@section('title', 'Laporan Belajar')
@section('menu-parent', 'learning')
@section('content')
    <div class="content">
        <div class="container-xl">
            <div class="page-header text-white d-print-none">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="page-pretitle">
                            Informasi dan KBM
                        </div>
                        <h2 class="page-title">
                            Laporan Belajar
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row row-deck row-cards">
                <div class="col-lg-4 d-block">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="mb-0">
                                Data Rapor
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label class="form-label">
                                    Nama
                                </label>
                                <div class="form-control">
                                    {{ $kbmReport->student_name }}
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">
                                    Kelas
                                </label>
                                <div class="form-control">
                                    {{ $kbmReport->class_name }}
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">
                                    Semester
                                </label>
                                <div class="form-control">
                                    Semester {{ $kbmReport->semester }}
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">
                                    Tahun Ajaran
                                </label>
                                <div class="form-control">
                                    {{ $kbmReport->year_learn }}
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">
                                    Tanggal Ditetapkan
                                </label>
                                <div class="form-control">
                                    {{ date("d F Y", strtotime($kbmReport->get_at)) }}
                                </div>
                            </div>
                            @if ($kbmReport->attch)
                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        Lampiran
                                    </label>
                                    <div class="form-control">
                                        <a href="{{ asset($kbmReport->attch) }}" download>Unduh Lampiran</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 d-block">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="mb-0">
                                Data Mata Pelajaran
                            </h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter">
                                <thead>
                                    <th>
                                        Mata Pelajaran
                                    </th>
                                    <th>
                                        Pengetahuan
                                    </th>
                                    <th>
                                        Keterampilan
                                    </th>
                                    <th class="text-muted">
                                        KKM / Batas
                                    </th>
                                    <th>
                                        Nilai Akhir
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($kbmReportDetList as $kbmReportDet)
                                        <tr>
                                            <td>
                                                {{ $kbmReportDet->admSubject()->code ? "(" . $kbmReportDet->admSubject()->code . ") " : '' }} 
                                                {{ $kbmReportDet->admSubject()->name }}
                                            </td>
                                            <td>
                                                {{ $kbmReportDet->mark_knowledge ? $kbmReportDet->mark_knowledge : '-' }}
                                                @if ($kbmReportDet->mark_knowledge && $kbmReportDet->mark_knowledge_be)
                                                    @if ($kbmReportDet->mark_knowledge > $kbmReportDet->mark_knowledge_be)
                                                        <sup class="text-success" title="Lebih tinggi dibanding semester sebelumnya.">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="5" height="5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="18" y1="11" x2="12" y2="5" /><line x1="6" y1="11" x2="12" y2="5" /></svg>
                                                        </sup>
                                                    @elseif ($kbmReportDet->mark_knowledge < $kbmReportDet->mark_knowledge_be)
                                                        <sup class="text-danger" title="Lebih rendah dibanding semester sebelumnya.">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="5" height="5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="18" y1="13" x2="12" y2="19" /><line x1="6" y1="13" x2="12" y2="19" /></svg>
                                                        </sup>
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                {{ $kbmReportDet->mark_practice ? $kbmReportDet->mark_practice : '-' }}
                                                @if ($kbmReportDet->mark_practice && $kbmReportDet->mark_practice_be)
                                                    @if ($kbmReportDet->mark_practice > $kbmReportDet->mark_practice_be)
                                                        <sup class="text-success" title="Lebih tinggi dibanding semester sebelumnya.">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="5" height="5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="18" y1="11" x2="12" y2="5" /><line x1="6" y1="11" x2="12" y2="5" /></svg>
                                                        </sup>
                                                    @elseif ($kbmReportDet->mark_practice < $kbmReportDet->mark_practice_be)
                                                        <sup class="text-danger" title="Lebih rendah dibanding semester sebelumnya.">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="5" height="5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="18" y1="13" x2="12" y2="19" /><line x1="6" y1="13" x2="12" y2="19" /></svg>
                                                        </sup>
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                {{ $kbmReportDet->mark_limit }}
                                            </td>
                                            <td>
                                                @if ($kbmReportDet->mark_total < $kbmReportDet->mark_limit)
                                                    <b class="text-danger">
                                                        {{ $kbmReportDet->mark_total }}
                                                    </b>
                                                @else
                                                    <b class="text-primary">
                                                        {{ $kbmReportDet->mark_total }}
                                                    </b>
                                                @endif
                                                @if ($kbmReportDet->mark_total && $kbmReportDet->mark_total_be)
                                                    @if ($kbmReportDet->mark_total > $kbmReportDet->mark_total_be)
                                                        <sup class="text-success" title="Lebih tinggi dibanding semester sebelumnya.">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="5" height="5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="18" y1="11" x2="12" y2="5" /><line x1="6" y1="11" x2="12" y2="5" /></svg>
                                                        </sup>
                                                    @elseif ($kbmReportDet->mark_total < $kbmReportDet->mark_total_be)
                                                        <sup class="text-danger" title="Lebih rendah dibanding semester sebelumnya.">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="5" height="5" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="18" y1="13" x2="12" y2="19" /><line x1="6" y1="13" x2="12" y2="19" /></svg>
                                                        </sup>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if (count($kbmReportDetList) == false)
                                        <tr>
                                            <td colspan="7">
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
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3 class="mb-0">
                                Data Nilai
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group mb-3 mb-lg-0">
                                        <label class="form-label">
                                            Jumlah Mata Pelajaran
                                        </label>
                                        <div class="form-control">
                                            {{ $kbmReport->total_subject }} Mata Pelajaran
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group mb-3 mb-lg-0">
                                        <label class="form-label">
                                            Total Nilai
                                        </label>
                                        <div class="form-control">
                                            {{ $kbmReport->mark_total }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group mb-0">
                                        <label class="form-label">
                                            Rata-rata Nilai
                                        </label>
                                        <div class="form-control">
                                            {{ $kbmReport->mark_rate }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-2">
                        <div class="card-header">
                            <h3 class="mb-0">
                                Data Ekstrakurikuler
                            </h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter">
                                <thead>
                                    <tr>
                                        <th>
                                            Ekstrakurikuler
                                        </th>
                                        <th>
                                            Nilai Akhir
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kbmReportDetExList as $kbmReportDetEx)
                                        <tr>
                                            <td>
                                                {{ $kbmReportDetEx->admSubjectEx()->code ? "(" . $kbmReportDetEx->admSubjectEx()->code . ") " : '' }} 
                                                {{ $kbmReportDetEx->admSubjectEx()->name }}
                                            </td>
                                            <td>
                                                {{ $kbmReportDetEx->mark }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if (count($kbmReportDetExList) == false)
                                        <tr>
                                            <td colspan="7">
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
                <div class="col-6">
                    <a href="">
                        <button type="button" class="btn btn-md btn-secondary mr-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 13l-4 -4l4 -4m-4 4h11a4 4 0 0 1 0 8h-1" /></svg> Kembali
                        </button>  
                    </a>
                </div>
            </div>
        </div>
        @include("assets.copyright")
    </div>
@stop
@extends('layout.application')
@section('title', 'Pelanggaran Tata Tertib')
@section('menu-parent', 'attitude')
@section('content')
    <div class="content">
        <div class="container-xl">
            <div class="page-header text-white d-print-none">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="page-pretitle">
                            Evaluasi Perilaku
                        </div>
                        <h2 class="page-title">
                            Pelanggaran Tata Tertib
                        </h2>
                    </div>
                    <div class="col-auto ms-auto d-print-none">
                        <a href=".">
                            <button class="btn btn-default p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon m-0" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 13l-4 -4l4 -4m-4 4h11a4 4 0 0 1 0 8h-1" /></svg>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row row-deck row-cards">
                <div class="col-md-4 d-block">
                    @include("application.shortcut")
                </div>
                <div class="col-md-8 d-block">
                    <div class="card">
                        <div class="card-header">
                            <form method="POST" action="">
                                {{ csrf_field() }}
                                <button name="submit-form" class="btn btn-sm btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg> Tambah
                                </button>  
                                &nbsp;
                                <button name="submit-export" class="btn btn-sm btn-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M11.5 20h-5.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v7.5m-16 -3.5h16m-10 -6v16m4 -1h7m-3 -3l3 3l-3 3" /></svg> Export
                                </button>  
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter">
                                <thead>
                                    <tr>
                                        <th style="width: 150px;">
                                            Tanggal
                                        </th>
                                        <th>
                                            Poin
                                        </th>
                                        <th>
                                            Deskripsi
                                        </th>
                                        <th style="width: 230px;">
                                            Opsi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($behViolationList as $behViolation)
                                        <tr>
                                            <td>
                                                {{ date("d M Y", strtotime($behViolation->get_at)) }}
                                            </td>
                                            <td>
                                                {{ $behViolation->poin + 0 }} Poin
                                            </td>
                                            <td>
                                                {{ $behViolation->code }}. {{ $behViolation->description }}
                                            </td>
                                            <td>
                                                @if ($behViolation->attch)
                                                    <a style="text-decoration: none;" href="{{ asset($behViolation->attch) }}" download>
                                                        <button type="button" class="btn-table btn btn-sm btn-default">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon m-0" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><polyline points="7 11 12 16 17 11" /><line x1="12" y1="4" x2="12" y2="16" /></svg>
                                                            &nbsp;Lampiran
                                                        </button>
                                                    </a>
                                                    &nbsp;
                                                @endif
                                                <form method="POST" action="" class="d-inline-block">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value="{{ $behViolation->id }}"/>
                                                    <button name="submit-form" class="btn-table btn btn-sm btn-default">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon m-0" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" /><line x1="13.5" y1="6.5" x2="17.5" y2="10.5" /></svg>
                                                    </button>  
                                                    &nbsp;
                                                    <button type="button" onclick="modalAlertDom($(this).parent().find('.trigger-delete'), 'Apakah anda yakin ?' , '')" class="btn-table btn btn-sm btn-danger">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon m-0" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="7" x2="20" y2="7" /><line x1="10" y1="11" x2="10" y2="17" /><line x1="14" y1="11" x2="14" y2="17" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                                    </button>  
                                                    <button type="submit" class="d-none trigger-delete" name="submit-delete"></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if (count($behViolationList) == false)
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
            </div>
        </div>
        @include("assets.copyright")
    </div>
    <script>
        $('#shortcut-info').html(`
            <div class="form-group mb-3 mt-3">
                <label class="form-label">
                    Poin Pelanggaran
                </label>
                <div class="form-control">
                    <?php
                        $behViolationPoin = 0;
                        foreach ($behViolationList as $behViolation) {
                            $behViolationPoin += $behViolation->poin;
                        }
                        echo ($behViolationPoin + 0) . " Poin";
                    ?>
                </div>
            </div>
            <div class="form-group mb-0">
                <label class="form-label">
                    Jumlah Pelanggaran
                </label>
                <div class="form-control">
                    {{ count($behViolationList) + 0 }} Pelanggaran
                </div>
            </div>
        `);
        $('[data-shortcut="violation"]').addClass("active");
    </script>
@stop
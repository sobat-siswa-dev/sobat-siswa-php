@extends('layout.application')
@section('title', 'Guru')
@section('menu-parent', 'master')
@section('content')
    <div class="content">
        <div class="container-xl">
            <div class="page-header text-white d-print-none">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="page-pretitle">
                            Data Dasar
                        </div>
                        <h2 class="page-title">
                            Guru
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row row-deck row-cards">
                <div class="col-12 d-block">
                    <div class="card">
                        <div class="card-header" data-btn-function="form">
                            <form method="POST" action="">
                                {{ csrf_field() }}
                                <button data-btn-function="form" name="submit-form" class="btn btn-sm btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg> Tambah
                                </button>  
                                &nbsp;
                                <button data-btn-function="export" class="btn btn-sm btn-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M11.5 20h-5.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v7.5m-16 -3.5h16m-10 -6v16m4 -1h7m-3 -3l3 3l-3 3" /></svg> Export
                                </button>  
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter">
                                <thead>
                                    <tr>
                                        <th>
                                            Nomor Induk
                                        </th>
                                        <th>
                                            Nama
                                        </th>
                                        <th>
                                            Jabatan Struktural
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Telp
                                        </th>
                                        <th>
                                            Role Aplikasi
                                        </th>
                                        <th data-btn-function="form">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admTeacherList as $admTeacher)
                                        <tr>
                                            <td class="text-nowrap text-muted">
                                                {{ $admTeacher->nip }}
                                            </td>
                                            <td>
                                                {{ $admTeacher->name }}
                                            </td>
                                            <td>
                                                {{ $admTeacher->structural_pos }}
                                            </td>
                                            <td>
                                                {{ $admTeacher->email }}
                                            </td>
                                            <td>
                                                {{ $admTeacher->phone }}
                                            </td>
                                            <td>
                                                @if ($admTeacher->role >= 0 || $admTeacher->role <= 3)
                                                    {{ (["Pengelola", "Tata Usaha", "Kesiswaan / Bimbingan Konseling", "Guru Umum"])[$admTeacher->role] }}
                                                @endif
                                            </td>
                                            <td data-btn-function="form">
                                                <form method="POST" action="">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value="{{ $admTeacher->id }}"/>
                                                    <!-- <button class="btn-table btn btn-sm btn-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="5" cy="18" r="2" /><circle cx="19" cy="6" r="2" /><path d="M19 8v5a5 5 0 0 1 -5 5h-3l3 -3m0 6l-3 -3" /><path d="M5 16v-5a5 5 0 0 1 5 -5h3l-3 -3m0 6l3 -3" /></svg> Pindahkan Siswa
                                                    </button>    
                                                    &nbsp; -->
                                                    <button name="submit-form" class="btn-table btn btn-sm btn-default">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" /><line x1="13.5" y1="6.5" x2="17.5" y2="10.5" /></svg> Ubah
                                                    </button>  
                                                    @if ($admTeacher->role != 0)
                                                        &nbsp;
                                                        <button type="button" onclick="modalAlertDom($(this).parent().find('.trigger-delete'), 'Apakah anda yakin ?' , '')" class="btn-table btn btn-sm btn-danger">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="7" x2="20" y2="7" /><line x1="10" y1="11" x2="10" y2="17" /><line x1="14" y1="11" x2="14" y2="17" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg> Hapus
                                                        </button>  
                                                        <button type="submit" class="d-none trigger-delete" name="submit-delete"></button>
                                                    @endif
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if (count($admTeacherList) == false)
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
                        <div class="card-footer">
                            {{ $admTeacherList->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include("assets.copyright")
    </div>
@stop

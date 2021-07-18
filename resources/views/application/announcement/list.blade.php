@extends('layout.application')
@section('title', 'Pengumuman')
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
                            Pengumuman
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row row-deck row-cards">
                <div class="col-12 d-block">
                    <div class="card">
                        <div class="card-header">
                            <form method="POST" action="">
                                {{ csrf_field() }}
                                <button name="submit-form" class="btn btn-sm btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg> Tambah
                                </button>  
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter">
                                <thead>
                                    <tr>
                                        <th>
                                            Tanggal
                                        </th>
                                        <th>
                                            Judul
                                        </th>
                                        <th>
                                            Penulis
                                        </th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kbmAnnouncementList as $kbmAnnouncement)
                                        <tr>
                                            <td>
                                                {{ date("d F Y, H:i", strtotime($kbmAnnouncement->created_at)) }}
                                            </td>
                                            <td>
                                                {{ $kbmAnnouncement->title }}
                                            </td>
                                            <td>
                                                {{ $kbmAnnouncement->created_by }}
                                            </td>
                                            <td>
                                                <a href="{{ url('learning/announcement/' . $kbmAnnouncement->id) }}" style="text-decoration: none;">
                                                    <button type="button" class="btn-table btn btn-sm btn-default">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg> Lihat
                                                    </button> 
                                                </a>
                                                &nbsp;
                                                <form method="POST" action="" class="d-inline-block">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value="{{ $kbmAnnouncement->id }}"/>
                                                    <button name="submit-form" class="btn-table btn btn-sm btn-default">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" /><line x1="13.5" y1="6.5" x2="17.5" y2="10.5" /></svg> Ubah
                                                    </button>  
                                                    &nbsp;
                                                    <button type="button" onclick="modalAlertDom($(this).parent().find('.trigger-delete'), 'Apakah anda yakin ?' , '')" class="btn-table btn btn-sm btn-danger">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="7" x2="20" y2="7" /><line x1="10" y1="11" x2="10" y2="17" /><line x1="14" y1="11" x2="14" y2="17" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg> Hapus
                                                    </button> 
                                                    <button type="submit" class="d-none trigger-delete" name="submit-delete"></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if (count($kbmAnnouncementList) == false)
                                        <tr>
                                            <td colspan="4">
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
                            {{ $kbmAnnouncementList->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include("assets.copyright")
    </div>
@stop
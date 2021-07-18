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
                                                <a href="{{ url('stlearning/announcement/' . $kbmAnnouncement->id) }}" style="text-decoration: none;">
                                                    <button type="button" class="btn-table btn btn-sm btn-default">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg> Lihat
                                                    </button> 
                                                </a>
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
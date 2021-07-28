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
                            <table class="table table-wrap-cus card-table table-vcenter">
                                <thead>
                                    <tr>
                                        <th>
                                            Informasi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kbmAnnouncementList as $kbmAnnouncement)
                                        <tr>
                                            <td>
                                                <a href="{{ url('stlearning/announcement/' . $kbmAnnouncement->id) }}" style="text-decoration: none; color: rgb(35, 46, 60);">
                                                    {{ $kbmAnnouncement->title }}
                                                    <small class="d-block text-muted mt-1">
                                                        {{ date("d F Y, H:i", strtotime($kbmAnnouncement->created_at)) }} Oleh <span class="text-primary" style="font-weight: 600">{{ $kbmAnnouncement->created_by }}</span>
                                                    </small>
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
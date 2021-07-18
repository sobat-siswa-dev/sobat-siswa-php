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
                            <h2 class="mb-0">
                                <b>{{ $kbmAnnouncement->title }}</b>
                                <small class="d-block mt-1 text-muted" style="font-size: .75em;">
                                    Oleh <b>{{ $kbmAnnouncement->created_by }}</b> Pada {{ date("d F Y, H:i", strtotime($kbmAnnouncement->created_at)) }}
                                </small>
                            </h2>
                        </div>
                        <div class="card-body">
                            <?php echo $kbmAnnouncement->description ?>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <a href="{{ url('/stlearning/announcement') }}">
                        <button type="button" class="btn btn-md btn-secondary mr-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 13l-4 -4l4 -4m-4 4h11a4 4 0 0 1 0 8h-1" /></svg> Kembali
                        </button>  
                    </a>
                </div>
                @if ($kbmAnnouncement->attch)
                    <div class="col-6">
                        <a class="ml-auto" href="{{ asset($kbmAnnouncement->attch) }}" style="text-decoration: none;">
                            <button type="button" class="btn btn-md btn-default">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon m-0" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><polyline points="7 11 12 16 17 11" /><line x1="12" y1="4" x2="12" y2="16" /></svg>
                                &nbsp;Lampiran
                            </button>  
                        </a>
                    </div>
                @endif
            </div>
        </div>
        @include("assets.copyright")
    </div>
@stop
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
            </div>
        </div>
        @include("assets.copyright")
    </div>
@stop
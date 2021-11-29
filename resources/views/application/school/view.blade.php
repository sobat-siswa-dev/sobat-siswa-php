@extends('layout.application')
@section('title', 'Sekolah')
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
                            Sekolah
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row row-deck row-cards">
                <div class="col-12 col-lg-12 d-block">
                    <div class="card">
                        <div class="card-header" data-btn-function="form">
                            <form method="POST" action="">
                                {{ csrf_field() }}
                                <button name="submit-form" class="btn btn-sm btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" /><line x1="13.5" y1="6.5" x2="17.5" y2="10.5" /></svg> Ubah
                                </button>  
                            </form>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-lg-10">
                                            <div class="form-group mb-3">
                                                <label class="form-label">
                                                    Nama
                                                </label>
                                                <div class="form-control">
                                                    {{ $admSchool->name }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group mb-3">
                                                <label class="form-label">
                                                    Warna
                                                </label>
                                                <div class="form-control">
                                                    <div style="background: {{ $admSchool->color ? $admSchool->color : '#3955a4' }}">
                                                        &nbsp;
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label class="form-label">
                                                    Email
                                                </label>
                                                <div class="form-control">
                                                    {{ $admSchool->email }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label class="form-label">
                                                    Telp
                                                </label>
                                                <div class="form-control">
                                                    {{ $admSchool->telp }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group mb-3">
                                                <label class="form-label">
                                                    Fax
                                                </label>
                                                <div class="form-control">
                                                    {{ $admSchool->fax }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label class="form-label">
                                                    Alamat
                                                </label>
                                                <div class="form-control">
                                                    {{ $admSchool->address }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group mb-3">
                                        <label class="form-label">
                                            Logo
                                        </label>
                                        <img src="{{ asset($admSchool->logo ? $admSchool->logo : './distRes/img/school-placeholder.png') }}" alt="Logo Sekolah" class="form-control p-0">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include("assets.copyright")
    </div>
@stop
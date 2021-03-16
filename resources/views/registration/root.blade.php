@extends('layout.registration')

@section('content')
<div class="flex-fill d-flex flex-column justify-content-center py-4">
    <div class="container-tight py-6">
        <div class="text-center mb-4">
            <a href="."><img src="{{ asset('staticRes/monogram-logo.svg') }}" height="25" alt=""></a>
        </div>
        <form action="{{ url('registration/step-1') }}" method="POST">
            {{ csrf_field() }}
            <div class="card card-md">
                <div class="card-body text-center py-4 p-sm-4">
                    <img src="{{ asset('staticRes/main-section-illustration.svg') }}" height="250" class="mb-n2" 
                        alt="">
                    <h1 class="mt-2">
                        Selamat Datang
                        <br>Sobat Siswa
                    </h1>
                    <p class="text-muted">
                        Sistem informasi terintegrasi untuk mewujudkan sekolah pintar dan pendidikan yang lebih baik lagi 
                    </p>
                </div>
                <div class="hr-text hr-text-center hr-text-spaceless">Data Awal</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Sekolah</label>
                        <div class="input-group input-group-flat">
                            <input type="text" name="name" class="form-control" required="" value="{{ session()->get('admSchool')->name }}" autocomplete="off">
                        </div>
                        <div class="form-hint">
                            Pastikan nama sekolah yang anda berikan sesuai dengan yang ingin didaftarkan.
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-4">
                    <div class="progress">
                        <div class="progress-bar" style="width: 25%" role="progressbar" aria-valuenow="25" aria-valuemin="0"
                            aria-valuemax="100">
                            <span class="visually-hidden">25% Selesai</span>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="btn-list justify-content-end">
                        <!-- <a href="#" class="btn btn-link link-secondary"></a> -->
                        <button type="submit" class="btn btn-primary">
                            Lanjut
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@stop
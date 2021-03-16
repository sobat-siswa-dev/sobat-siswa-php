@extends('layout.registration')

@section('content')
<div class="flex-fill d-flex flex-column justify-content-center py-4">
    <div class="container-tight py-6">
        <div class="text-center mb-4">
            <a href="."><img src="{{ asset('staticRes/monogram-logo.svg') }}" height="25" alt=""></a>
        </div>
        <form action="{{ url('registration/finish') }}" method="POST" spellcheck="false">
            {{ csrf_field() }}
            <div class="card card-md">
                <div class="card-body text-center py-3 p-sm-4">
                    <h2 class="mb-1">
                        Selangkah Lagi Untuk Terdaftar
                    </h2>
                    <p class="text-muted">
                        Pastikan informasi yang diberikan telah sesuai
                    </p>
                </div>
                <div class="hr-text hr-text-center hr-text-spaceless">Data Utama</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Sekolah</label>
                        <div class="input-group input-group-flat">
                            <p class="form-control" style="background: #f4f6fa;">
                                {{ session()->get("admSchool")->name }}
                            </p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Alamat
                        </label>
                        <div class="input-group input-group-flat">
                            <p class="form-control" style="background: #f4f6fa;">
                                {{ session()->get("admSchool")->address }}
                            </p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            E-mail
                        </label>
                        <div class="input-group input-group-flat">
                            <p class="form-control" style="background: #f4f6fa;">
                                {{ session()->get("admSchool")->email }}
                            </p>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Telp
                        </label>
                        <div class="input-group input-group-flat">
                            <p class="form-control" style="background: #f4f6fa;">
                                {{ session()->get("admSchool")->telp }}
                            </p>
                        </div>
                    </div>
                    <div class="mb-0">
                        <label class="form-label">
                            Fax
                        </label>
                        <div class="input-group input-group-flat">
                            <p class="form-control" style="background: #f4f6fa;">
                                {{ session()->get("admSchool")->fax }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="hr-text hr-text-center hr-text-spaceless">Data Pengelola</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">
                            Nama Guru
                        </label>
                        <div class="input-group input-group-flat">
                            <p class="form-control" style="background: #f4f6fa;">
                                {{ session()->get("admSchool")->admin_name }}
                            </p>
                        </div>
                    </div>
                    <div class="mb-0">
                        <label class="form-label">
                            E-mail
                        </label>
                        <div class="input-group input-group-flat">
                            <p class="form-control" style="background: #f4f6fa;">
                                {{ session()->get("admSchool")->admin_email }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-4">
                    <div class="progress">
                        <div class="progress-bar" style="width: 75%" role="progressbar" aria-valuenow="75" aria-valuemin="0"
                            aria-valuemax="100">
                            <span class="visually-hidden">75% Selesai</span>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="btn-list justify-content-end">
                        <a href="{{ url('step-2') }}" class="btn btn-link link-secondary">
                            Kembali
                        </a>
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
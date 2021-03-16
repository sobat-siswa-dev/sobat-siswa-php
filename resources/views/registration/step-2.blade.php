@extends('layout.registration')

@section('content')
<div class="flex-fill d-flex flex-column justify-content-center py-4">
    <div class="container-tight py-6">
        <div class="text-center mb-4">
            <a href="."><img src="{{ asset('staticRes/monogram-logo.svg') }}" height="25" alt=""></a>
        </div>
        <form action="{{ url('registration/final') }}" method="POST" spellcheck="false">
            {{ csrf_field() }}
            <div class="card card-md">
                <div class="card-body">
                    <div class="mb-0">
                        <label class="form-label">Nama Sekolah</label>
                        <div class="input-group input-group-flat">
                            <input type="text" class="form-control" value="{{ session()->get('admSchool')->name }}" readonly="" autocomplete="off">
                        </div>
                        <div class="form-hint">
                            Pastikan nama sekolah yang anda berikan sesuai dengan yang ingin didaftarkan.
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
                            <input name="admin_name" required="" type="text" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            E-mail
                        </label>
                        <div class="input-group input-group-flat">
                            <input name="admin_email" required="" type="text" class="form-control" autocomplete="off">
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
                        <a href="{{ url('registration/step-1') }}" class="btn btn-link link-secondary">
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
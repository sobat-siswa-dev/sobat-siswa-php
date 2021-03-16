@extends('layout.registration')

@section('content')
<div class="flex-fill d-flex flex-column justify-content-center py-4">
    <div class="container-tight py-6">
        <div class="text-center mb-4">
            <a href="."><img src="{{ asset('staticRes/monogram-logo.svg') }}" height="25" alt=""></a>
        </div>
        <form action="{{ url('registration/step-2') }}" method="POST" spellcheck="false">
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
                <div class="hr-text hr-text-center hr-text-spaceless">Data Lanjutan</div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">
                            Alamat
                        </label>
                        <div class="input-group input-group-flat">
                            <textarea spellcheck="false" name="address" required="" spellcheck="false" class="form-control">{{ session()->get('admSchool')->address }}</textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            E-mail
                        </label>
                        <div class="input-group input-group-flat">
                            <input type="text" name="email" value="{{ session()->get('admSchool')->email }}" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Telp
                        </label>
                        <div class="input-group input-group-flat">
                            <input type="text" name="telp" value="{{ session()->get('admSchool')->telp }}" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Fax
                        </label>
                        <div class="input-group input-group-flat">
                            <input type="text" name="fax" value="{{ session()->get('admSchool')->fax }}" class="form-control" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center mt-3">
                <div class="col-4">
                    <div class="progress">
                        <div class="progress-bar" style="width: 50%" role="progressbar" aria-valuenow="50" aria-valuemin="0"
                            aria-valuemax="100">
                            <span class="visually-hidden">50% Selesai</span>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="btn-list justify-content-end">
                        <a href="{{ url('registration') }}" class="btn btn-link link-secondary">
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
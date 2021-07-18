@extends('layout.login')
<style>
    .container-tight {
        max-width: 410px !important;
    }

</style>
@section('content')
<div class="flex-fill d-flex flex-column justify-content-center py-4">
    <div class="container-tight py-6">
        <div class="text-center mb-4">
            <a href="."><img src="{{ asset('staticRes/monogram-logo.svg') }}" height="25" alt=""></a>
        </div>
        <form action="" method="POST">
            {{ csrf_field() }}
            <div class="card card-md">
                <div class="card-body text-center py-3">
                    <h3 class="mb-3">
                        Masuk Sebagai
                    </h3>
                    <div class="row">
                        <div class="col">
                            <a href="{{ url('/login-student') }}" class="btn btn-switcher btn-primary w-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <circle cx="12" cy="7" r="4" />
                                    <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                                Siswa
                            </a>
                        </div>
                        <div class="col">
                            <a href="{{ url('/login-teacher') }}" class="btn btn-switcher btn-white w-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M22 9l-10 -4l-10 4l10 4l10 -4v6" />
                                    <path d="M6 10.6v5.4a6 3 0 0 0 12 0v-5.4" /></svg>
                                Guru
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Kode Sekolah</label>
                        <input required="" name="code" type="text" maxlength="100" class="form-control" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nomor Induk Siswa</label>
                        <input type="text" name="student_nis" class="form-control" autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Kata Sandi
                        </label>
                        <div class="input-group input-group-flat">
                            <input type="password" name="student_password" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <button type="submit" name="submit" value="submit" class="btn btn-primary w-100">
                        Masuk
                    </button>
                </div>
            </div>
            <div class="text-center text-muted mt-3">
                <b>Sobat Siswa</b> . v1.0.0.a
            </div>
        </form>
    </div>
</div>
@stop

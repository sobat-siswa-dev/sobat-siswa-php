@extends('layout.registration')

@section('content')
<div class="flex-fill d-flex flex-column justify-content-center py-4">
    <div class="container-tight py-6">
        <div class="text-center mb-4">
            <a href="."><img src="{{ asset('staticRes/monogram-logo.svg') }}" height="25" alt=""></a>
        </div>
        <div class="card card-md">
            <img src="{{ asset('staticRes/registration-finish.svg') }}" height="200" class="mb-0 mt-4" 
                alt="">
            <div class="card-body text-center py-3 p-sm-4">
                <h2 class="mb-1">
                    Pendaftaran Berhasil
                </h2>
                <p class="text-muted mb-0">
                    Terimakasih telah menggunakan Sobat Siswa untuk sekolah anda. Anda dapat masuk kedalam halaman pengelola dengan :
                </p>
                <table class="table text-justify my-3">
                    <tbody>
                        <tr>
                            <td style="text-align:right;">
                                Nama Pengguna
                            </td>
                            <th style="color: #374897; text-align:left;">
                                {{ $email }}
                            </th>
                        </tr>
                        <tr>
                            <td style="border-bottom: 0px; text-align:right;">
                                Kata Sandi
                            </td>
                            <th style="color: #374897; border-bottom: 0px; text-align:left;">
                                {{ $password }}
                            </th>
                        </tr>
                    </tbody>
                </table>
                <p class="text-muted">
                    <span class="d-inline-block pt-1">Semoga fitur yang kami sediakan bermanfaat ya !</span>
                </p>
            </div>
        </div>
        <div class="row align-items-center mt-3">
            <div class="col-4">
                <div class="progress">
                    <div class="progress-bar" style="width: 100%" role="progressbar" aria-valuenow="100" aria-valuemin="0"
                        aria-valuemax="100">
                        <span class="visually-hidden">100% Selesai</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
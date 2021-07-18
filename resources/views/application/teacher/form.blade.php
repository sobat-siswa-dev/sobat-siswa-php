@extends('layout.application')
@section('title', 'Guru')
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
                            Form Guru
                        </h2>
                    </div>
                </div>
            </div>
            <form method="POST" action="">
                {{ csrf_field() }}
                @if ($admTeacher->id)
                    <input type="hidden" name="id" value="{{ $admTeacher->id }}" />
                @endif
                <div class="row row-deck row-cards">
                    <div class="col-12 col-lg-8 d-block">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="mb-0">
                                    Data Pribadi dan Akun
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3">
                                            <label class="form-label">
                                                NIP <sup class="font-bold text-red">*</sup>
                                            </label>
                                            <input name="nip" required="" value="{{ $admTeacher->nip }}" type="text" maxlength="100" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="form-group mb-3">
                                            <label class="form-label">
                                                Nama <sup class="font-bold text-red">*</sup>
                                            </label>
                                            <input name="name" required="" value="{{ $admTeacher->name }}" type="text" maxlength="100" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label class="form-label">
                                                Jabatan Struktural
                                            </label>
                                            <input name="structural_pos" value="{{ $admTeacher->structural_pos }}" type="text" maxlength="100" class="form-control">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label">
                                                Email <sup class="font-bold text-red">*</sup>
                                            </label>
                                            <input autocomplete="off" name="email" required="" value="{{ $admTeacher->email }}" type="email" maxlength="100" class="form-control">
                                            <div class="d-none d-md-block mt-2">
                                                <small class="form-hint mb-3">Email akan digunakan untuk masuk sebagai guru.</small>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label class="form-label">
                                                {{ $admTeacher->id ? "Ubah" : "" }} Kata Sandi 
                                                @if (!$admTeacher->id)
                                                    <sup class="font-bold text-red">*</sup>
                                                @endif
                                            </label>
                                            <input autocomplete="off" name="password" value="" type="password" maxlength="100" class="form-control" {{ $admTeacher->id ? "" : "required=''" }}>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 d-block">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="mb-0">
                                    Data Kontak
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        Telp <sup class="font-bold text-red">*</sup>
                                    </label>
                                    <input name="phone" required="" value="{{ $admTeacher->phone }}" type="text" maxlength="100" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        Whatsapp
                                    </label>
                                    <input name="whatsapp" value="{{ $admTeacher->whatsapp }}" type="text" maxlength="100" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        Alamat <sup class="font-bold text-red">*</sup>
                                    </label>
                                    <textarea name="address" required="" class="form-control" maxlength="255" name="address">{{ $admTeacher->address }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <a href="">
                            <button type="button" class="btn btn-md btn-secondary mr-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 13l-4 -4l4 -4m-4 4h11a4 4 0 0 1 0 8h-1" /></svg> Kembali
                            </button>  
                        </a>
                    </div>
                    <div class="col-6">
                        <button name="submit-save" class="btn btn-md btn-primary ml-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="10" y1="14" x2="21" y2="3" /><path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5" /></svg> Simpan
                        </button>  
                    </div>
                </div>
            </form>
        </div>
        @include("assets.copyright")
    </div>
@stop
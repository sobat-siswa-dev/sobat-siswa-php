@extends('layout.application')
@section('title', 'Kelas')
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
                            Ganti Kata Sandi
                        </h2>
                    </div>
                </div>
            </div>
            <form method="POST" action="">
                {{ csrf_field() }}
                <div class="row row-deck row-cards">
                    <div class="col-12 d-block">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        Kata Sandi Lama <sup class="font-bold text-red">*</sup>
                                    </label>
                                    <input name="old_password" autocomplete="off" required="" type="password" maxlength="100" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        Kata Sandi Baru <sup class="font-bold text-red">*</sup>
                                    </label>
                                    <input name="new_password" autocomplete="off" required="" type="password" maxlength="100" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
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
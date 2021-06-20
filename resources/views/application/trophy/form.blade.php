@extends('layout.application')
@section('title', 'Catatan Prestasi')
@section('menu-parent', 'attitude')
@section('content')
    <div class="content">
        <div class="container-xl">
            <div class="page-header text-white d-print-none">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="page-pretitle">
                            Evaluasi Perilaku
                        </div>
                        <h2 class="page-title">
                            Catatan Prestasi
                        </h2>
                    </div>
                </div>
            </div>
            <form method="POST" enctype="multipart/form-data" action="">
                {{ csrf_field() }}
                @if ($behTrophy->id)
                    <input type="hidden" name="id" value="{{ $behTrophy->id }}" />
                @endif
                <div class="row row-deck row-cards">
                    <div class="col-12 d-block">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        Nama <sup class="font-bold text-red">*</sup>
                                    </label>
                                    <input name="name" required="" value="{{ $behTrophy->name }}" type="text" maxlength="100" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        Tanggal <sup class="font-bold text-red">*</sup>
                                    </label>
                                    <input name="get_at" required="" value="{{ $behTrophy->get_at }}" type="date" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        Tingkat
                                    </label>
                                    <select class="form-control" name="level">
                                        <option value="">
                                            Pilih Tingkat
                                        </option>
                                        <option value="Sekolah">
                                            Sekolah
                                        </option>
                                        <option value="Kota">
                                            Kota
                                        </option>
                                        <option value="Provinsi">
                                            Provinsi
                                        </option>
                                        <option value="Nasional">
                                            Nasional
                                        </option>
                                        <option value="Regional">
                                            Regional
                                        </option>
                                        <option value="Internasional">
                                            Internasional
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        Deskripsi
                                    </label>
                                    <textarea name="description" class="form-control" maxlength="255">{{ $behTrophy->description }}</textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        {{ $behTrophy->attch ? "Ganti" : "" }} Lampiran
                                    </label>
                                    <div class="form-control">
                                        <input type="file" name="attch">
                                    </div>
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
    <script>
        $('[name="level"]').val('{{ $behTrophy->level }}');
    </script>
@stop
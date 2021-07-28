@extends('layout.application')
@section('title', 'Kelas')
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
                            Form Pemindahan Siswa
                        </h2>
                    </div>
                </div>
            </div>
            <form method="POST" action="">
                {{ csrf_field() }}
                <input type="hidden" name="class_from" value="{{ $admClass->id }}" >
                <div class="row row-deck row-cards">
                    <div class="col-12 d-block">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        Kelas Asal
                                    </label>
                                    <p class="form-control">
                                     {{ $admClass->name }}
                                    </p>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        Kelas Tujuan <sup class="font-bold text-red">*</sup>
                                    </label>
                                    <select onchange="changeClassTo(this)" required="" class="form-control select-search" name="class_to">
                                        <option value="">
                                            Pilih Kelas
                                        </option>
                                        <option value="-99">
                                            Alumni
                                        </option>
                                        @foreach ($admClassList as $admClass2)
                                            @if ($admClass->id != $admClass2->id)
                                                <option value="{{ $admClass2->id }}">
                                                    {{ $admClass2->name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group d-none alumn-field">
                                    <label class="form-label">
                                        Angkatan Alumni <sup class="font-bold text-red">*</sup>
                                    </label>
                                    <select onchange="changeAlumn(this)" name="alumn_id" class="form-control select-search">
                                        <option value="">
                                            Pilih Angkatan Alumni
                                        </option>
                                        <option value="-99">
                                            Buat Baru
                                        </option>
                                        @foreach ($admAlumnList as $admAlumn)
                                            <option value="{{ $admAlumn->id }}">
                                                Angkatan Tahun {{ $admAlumn->year }} 
                                                @if ($admAlumn) 
                                                    ({{ $admAlumn->name }})
                                                @endif
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="mt-3 d-none alumn-new">
                                        <div class="row mb-0">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">
                                                        Tahun <sup class="font-bold text-red">*</sup>
                                                    </label>
                                                    <input class="form-control alumn-year mt-2" name="alumn_year"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">
                                                        Deskripsi Tambahan <span style="font-weight: normal">(Jurusan)</span>
                                                    </label>
                                                    <input class="form-control mt-2" name="alumn_name" value="{{ $admClass->admClassGroup() ? $admClass->admClassGroup()->name : '' }}"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter">
                                    <thead>
                                        <tr>
                                            <th width="15%">
                                                Ikut DIpindahkan
                                            </th>
                                            <th>
                                                Nomor Induk
                                            </th>
                                            <th>
                                                Nama
                                            </th>
                                            <th>
                                                L/P
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admStudentList as $admStudent)
                                            <tr>
                                                <td>
                                                    <label class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="admStudentArray[]" value="{{ $admStudent->id }}" checked="">
                                                        <span class="form-check-label"><span style="opacity: 0;">Iya</span></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    {{ $admStudent->nis }}
                                                </td>
                                                <td>
                                                    {{ $admStudent->name }}
                                                </td>
                                                <td>
                                                    @if ($admStudent->gender == 'L')
                                                        Laki-laki
                                                    @elseif ($admStudent == 'P') 
                                                        Perempuan
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        @if (count($admStudentList) == false)
                                            <tr>
                                                <td colspan="4">
                                                    <div class="my-3 mt-2">
                                                        <img class="d-block m-auto" style="width: 200px; max-width: 100%;" src="{{ asset('./staticRes/empty.png') }}" alt="">
                                                        <h3 class="text-center" style="color: #2e576d; font-weight: bolder;">
                                                            Tidak ada data
                                                        </h3>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
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
                        @if (count($admStudentList))
                            <button name="submit-save-move" class="btn btn-md btn-primary ml-auto">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="10" y1="14" x2="21" y2="3" /><path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5" /></svg> Simpan
                            </button>  
                        @endif
                    </div>
                </div>
            </form>
        </div>
        @include("assets.copyright")
        <script>
            function changeClassTo (e) {
                if ($(e).val() == '-99') {
                    $(".alumn-field").removeClass("d-none");
                    $(".alumn-field").addClass("d-block");
                    $(".alumn-field select").attr("required", true);
                } else {
                    $(".alumn-field").removeClass("d-block");
                    $(".alumn-field").addClass("d-none");
                    $(".alumn-field select").removeAttr("required");
                }
            }
            function changeAlumn (e) {
                if ($(e).val() == '-99') {
                    $(".alumn-new").removeClass("d-none");
                    $(".alumn-new").addClass("d-block");
                    $(".alumn-field .alumn-year").attr("required", true);
                } else {
                    $(".alumn-new").removeClass("d-block");
                    $(".alumn-new").addClass("d-none");
                    $(".alumn-field .alumn-year").removeAttr("required");
                }
            }
        </script>
    </div>
@stop
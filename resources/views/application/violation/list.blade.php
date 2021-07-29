@extends('layout.application')
@section('title', 'Pelanggaran Tata Tertib')
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
                            Pelanggaran Tata Tertib
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row row-deck row-cards">
                <div class="col-md-4 d-block">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="form-label">
                                    Kelas <sup class="font-bold text-red">*</sup>
                                </label>
                                <select required="" class="form-control select-search" name="class_id">
                                    <option value="">
                                        Pilih Kelas
                                    </option>
                                    @foreach ($admClassList as $admClass)
                                        <option value="{{ $admClass->id }}">
                                            {{ $admClass->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button onclick="openStudentList()" type="button" class="btn btn-sm btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7" /><line x1="21" y1="21" x2="15" y2="15" /></svg> Buka Daftar Siswa
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 d-block">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter">
                                <thead>
                                    <tr>
                                        <th style="width: 200px">
                                            Nomor Induk
                                        </th>
                                        <th>
                                            Nama
                                        </th>
                                        <th>
                                            Jumlah Poin
                                        </th>
                                        <th style="width: 100px;"></th>
                                    </tr>
                                </thead>
                                <tbody id="result">
                                    <tr>
                                        <td colspan="3">
                                            <div class="my-3 mt-2">
                                                <img class="d-block m-auto" style="width: 200px; max-width: 100%;" src="{{ asset('./staticRes/empty.png') }}" alt="">
                                                <h3 class="text-center" style="color: #2e576d; font-weight: bolder;">
                                                    Pilih Kelas Terlebih Dahulu
                                                </h3>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include("assets.copyright")
    </div>
@stop

<script>
    function openStudentList () {
        $("#result").html(`
            <tr>
                <td colspan="3">
                    <div class="my-3 mt-2">
                        <img class="d-block m-auto" style="width: 120px; max-width: 100%;" src="{{ asset('./staticRes/preloader.gif') }}" alt="">
                    </div>
                </td>
            </tr>
        `);
        $.ajax({
            url: "{{ url('master/studentSelector') }}",
            data: {
                request_url: "{{ url('attitude/violation') }}/",
                class_id: $('[name="class_id"]').val()
            },
            success: function (result) {
                $("#result").html(result);
            }
        })
    }
</script>
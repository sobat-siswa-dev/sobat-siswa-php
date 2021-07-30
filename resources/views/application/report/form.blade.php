@extends('layout.application')
@section('title', 'Laporan Belajar')
@section('menu-parent', 'learning')
@section('content')
    <div class="content">
        <div class="container-xl">
            <div class="page-header text-white d-print-none">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="page-pretitle">
                            Informasi dan KBM
                        </div>
                        <h2 class="page-title">
                            Laporan Belajar
                        </h2>
                    </div>
                </div>
            </div>
            <form method="POST" enctype="multipart/form-data" action="">
                {{ csrf_field() }}
                <div class="row row-deck row-cards">
                    <div class="col-lg-4 d-block">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="mb-0">
                                    Data Rapor
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        Nama <sup class="font-bold text-red">*</sup>
                                    </label>
                                    <div class="form-control">
                                        {{ $admStudent->name }}
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        Kelas <sup class="font-bold text-red">*</sup>
                                    </label>
                                    <div class="form-control">
                                        {{ $admStudent->admClass()->name }}
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        Semester <sup class="font-bold text-red">*</sup>
                                    </label>
                                    <input name="semester" required="" type="num" min="1" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        Tahun Ajaran <sup class="font-bold text-red">*</sup>
                                    </label>
                                    <div class="row">
                                        <div class="col-4">
                                            <input name="period_from" required="" type="num" min="1" class="form-control">
                                        </div>
                                        <div class="col-1 text-center" style="line-height: 35px;">
                                            /
                                        </div>
                                        <div class="col-4">
                                            <input name="period_to" required="" type="num" min="1" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        Tanggal Ditetapkan <sup class="font-bold text-red">*</sup>
                                    </label>
                                    <input name="get_at" required="" type="date" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="form-label">
                                        Lampiran
                                    </label>
                                    <div class="form-control">
                                        <input type="file" name="attch">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 d-block">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3 class="mb-0">
                                    Data Mata Pelajaran
                                </h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter">
                                    <thead>
                                        <tr>
                                            <th>
                                                Mata Pelajaran
                                            </th>
                                            <th style="width: 100px;">
                                                Pengetahuan
                                            </th>
                                            <th style="width: 100px;">
                                                Keterampilan
                                            </th>
                                            <th style="width: 100px;">
                                                KKM / Batas
                                            </th>
                                            <th style="width: 100px;">
                                                Nilai Akhir
                                            </th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="subject-table">
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td colspan="6" style="border-top: 1px solid rgba(101,109,119,.16);">
                                                <button class="btn btn-sm btn-primary" type="button" onclick="addSubjectRow()">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg> Tambah Mata Pelajaran
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <small class="d-block">* Isi jika ingin menjabarkan nilai pada laporan</small>
                                <small class="d-block">* Nilai pengetahuan dan keterampilan bersifat opsional</small>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3 class="mb-0">
                                    Data Nilai
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3 mb-lg-0">
                                            <label class="form-label">
                                                Jumlah Mata Pelajaran <sup class="font-bold text-red">*</sup>
                                            </label>
                                            <input name="total_subject" required="" type="text" min="1" class="form-control form-control-numeric">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-3 mb-lg-0">
                                            <label class="form-label">
                                                Total Nilai <sup class="font-bold text-red">*</sup>
                                            </label>
                                            <input name="mark_total" required="" type="text" min="1" class="form-control form-control-numeric">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group mb-0">
                                            <label class="form-label">
                                                Rata-rata Nilai <sup class="font-bold text-red">*</sup>
                                            </label>
                                            <input name="mark_rate" required="" type="text" min="1" class="form-control form-control-numeric-mark">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3 class="mb-0">
                                    Data Ekstrakurikuler
                                </h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter">
                                    <thead>
                                        <tr>
                                            <th>
                                                Ekstrakurikuler
                                            </th>
                                            <th>
                                                Nilai Akhir
                                            </th>
                                            <th>
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="subject-ex-table">
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td colspan="3" style="border-top: 1px solid rgba(101,109,119,.16);">
                                                <button class="btn btn-sm btn-primary" type="button" onclick="addSubjectExRow()">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg> Tambah Ekstrakurikuler
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <small>* Isi jika ingin menjabarkan nilai pada laporan</small>
                            </div>
                        </div>
                        <div class="alert alert-danger" role="alert">
                            <small>
                                Mohon <b>periksa kembali</b> seluruh informasi yang anda berikan sebelum anda simpan ! Laporan yang telah dibuat <b>tidak dapat diubah</b> !
                            </small>
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
        let subjectExHtmlListOption = `
            @foreach ($admSubjectExList as $admSubjectEx)
                <option value="{{ $admSubjectEx->id }}">
                    {{ ($admSubjectEx->code ? "(" . $admSubjectEx->code . ") " : "") . $admSubjectEx->name }}
                </option>
            @endforeach
        `;
        let subjectHtmlListOption = `
            @foreach ($admSubjectList as $admSubject)
                <option value="{{ $admSubject->id }}">
                    {{ ($admSubject->code ? "(" . $admSubject->code . ") " : "") . $admSubject->name }}
                </option>
            @endforeach
        `;
        let subjectExTotal = 0;
        let subjectTotal = 0;
        let markTotal = 0;

        $(document).ready(function () {
            $('.form-control-numeric-mark').autoNumeric('init', {aPad: false, aDec: ',', aSep: '', vMax:'100'});
        });

        function addSubjectRow () {
            $("#subject-table").append(`
                <tr>
                    <td>
                        <select name="kbmReportDet[${subjectTotal}][subject_id]" required="" class="form-control select-search" style="width: 340px;">
                            ${subjectHtmlListOption}
                        </select>
                    </td>
                    <td>
                        <input name="kbmReportDet[${subjectTotal}][mark_knowledge]" type="text" class="form-control form-control-numeric-mark" style="width: 80px;">
                    </td>
                    <td>
                        <input name="kbmReportDet[${subjectTotal}][mark_practice]" type="text" class="form-control form-control-numeric-mark" style="width: 80px;">
                    </td>
                    <td>
                        <input name="kbmReportDet[${subjectTotal}][mark_limit]" type="text" required="" class="form-control form-control-numeric-mark" style="width: 80px;">
                    </td>
                    <td>
                        <input name="kbmReportDet[${subjectTotal}][mark_total]" onkeyup="refreshCalculation()" type="text" required="" class="form-control form-control-mark-total form-control-numeric-mark" style="width: 80px;">
                    </td>
                    <td>
                        <button class="btn btn-sm btn-danger" type="button" onclick="deleteSubjectRow(this)">
                            <b>X</b>
                        </button>
                    </td>
                </tr>
            `)
            $('.select-search').select2();
            $('.form-control-numeric-mark').autoNumeric('init', {aPad: false, aDec: ',', aSep: '', vMax:'100'});
            subjectTotal++;
            refreshCalculation();
        }

        function deleteSubjectRow (e) {
            $(e).parent().parent().remove();
            subjectTotal--;
            refreshCalculation();
        }

        function addSubjectExRow () {
            $("#subject-ex-table").append(`
                <tr>
                    <td>
                        <select name="kbmReportDetEx[${subjectExTotal}][subject_ex_id]" required="" class="form-control select-search" style="width: 340px;">
                            ${subjectExHtmlListOption}
                        </select>
                    </td>
                    <td>
                        <input name="kbmReportDetEx[${subjectExTotal}][mark]" required="" type="text" class="form-control" style="width: 80px;">
                    </td>
                    <td>
                        <button class="btn btn-sm btn-danger" type="button" onclick="deleteSubjectExRow(this)">
                            <b>X</b>
                        </button>
                    </td>
                </tr>
            `)
            $('.select-search').select2();
            subjectExTotal++;
        }

        function deleteSubjectExRow (e) {
            $(e).parent().parent().remove();
            subjectExTotal--;
        }

        function refreshCalculation () {
            markTotal = 0;
            $('#subject-table .form-control-mark-total').each(function () {
                let valObj = parseFloat($(this).val().replace(",", "."));
                if (!isNaN(valObj)) {
                    markTotal += valObj;
                }
            });
            $('[name="total_subject"]').val(subjectTotal);
            $('[name="mark_total"]').val(markTotal);
            $('[name="mark_rate"]').val(((markTotal / parseFloat(subjectTotal)).toFixed(2) + "").replace(".", ","));
        }
    </script>
    <style>
        #subject-table tr .btn-danger,
        #subject-ex-table tr .btn-danger {
            display: none;
        }

        #subject-table tr:last-child .btn-danger,
        #subject-ex-table tr:last-child .btn-danger {
            display: block;
        }
    </style>
@stop
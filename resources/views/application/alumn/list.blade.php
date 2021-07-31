@extends('layout.application')
@section('title', 'Alumni')
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
                            Alumni
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row row-deck row-cards">
                <div class="col-12 d-block">
                    <div class="card">
                        <div class="card-header">
                            <button data-btn-function="export" class="btn btn-sm btn-success">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M11.5 20h-5.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v7.5m-16 -3.5h16m-10 -6v16m4 -1h7m-3 -3l3 3l-3 3" /></svg> Export
                            </button>  
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter">
                                <thead>
                                    <tr>
                                        <th>
                                            Nomor Induk
                                        </th>
                                        <th>
                                            Nama
                                        </th>
                                        <th>
                                            Angkatan
                                        </th>
                                        <th>
                                            L/P 
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            No. Telp
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admStudentAlumnList as $admStudentAlumn)
                                        <tr>
                                            <td class="text-nowrap text-muted">
                                                {{ $admStudentAlumn->nis }}
                                            </td>
                                            <td>
                                                {{ $admStudentAlumn->name }}
                                            </td>
                                            <td>
                                                @if ($admStudentAlumn->admAlumn())
                                                    Angkatan Tahun {{ $admStudentAlumn->admAlumn()->year }} 
                                                    @if ($admStudentAlumn->admAlumn()->name) 
                                                        ({{ $admStudentAlumn->admAlumn()->name }})
                                                    @endif
                                                @endif
                                            </td>
                                            <td>
                                                @if ($admStudentAlumn->gender == 'L')
                                                    Laki-laki
                                                @elseif ($admStudentAlumn == 'P') 
                                                    Perempuan
                                                @endif
                                            </td>
                                            <td>
                                                {{ $admStudentAlumn->email }}
                                            </td>
                                            <td>
                                                {{ $admStudentAlumn->phone }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if (count($admStudentAlumnList) == false)
                                        <tr>
                                            <td colspan="6">
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
                        <div class="card-footer">
                            {{ $admStudentAlumnList->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include("assets.copyright")
    </div>
@stop

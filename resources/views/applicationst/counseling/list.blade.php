@extends('layout.application')
@section('title', 'Bimbingan Konseling')
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
                            Bimbingan Konseling
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row row-deck row-cards">
                <div class="col-md-4 d-block">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label class="form-label">
                                    Jumlah Konseling
                                </label>
                                <div class="form-control">
                                    {{ count($behCounselingList) + 0 }} Kali
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 d-block">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter">
                                <thead>
                                    <tr>
                                        <th style="width: 150px;">
                                            Tanggal / Tempat
                                        </th>
                                        <th>
                                            Konseling
                                        </th>
                                        <th style="width: 100px;">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($behCounselingList as $behCounseling)
                                        <tr>
                                            <td>
                                                {{ date("d F Y", strtotime($behCounseling->held_date)) }}
                                                <small class="d-block">{{ $behCounseling->place }}</small>
                                            </td>
                                            <td>
                                                <p class="text-justify ">
                                                    <b>
                                                        Permasalahan :
                                                    </b>
                                                    <br>{{ $behCounseling->problem }}
                                                </p>
                                                <p class="text-justify mb-0">
                                                    <b>
                                                        Solusi :
                                                    </b>
                                                    <br>{{ $behCounseling->solution }}
                                                </p>
                                            </td>
                                            <td>
                                                @if ($behCounseling->attch)
                                                    <a style="text-decoration: none;" href="{{ asset($behCounseling->attch) }}" download>
                                                        <button type="button" class="btn-table btn btn-sm btn-default">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon m-0" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2" /><polyline points="7 11 12 16 17 11" /><line x1="12" y1="4" x2="12" y2="16" /></svg>
                                                            &nbsp;Lampiran
                                                        </button>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if (count($behCounselingList) == false)
                                        <tr>
                                            <td colspan="7">
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
            </div>
        </div>
        @include("assets.copyright")
    </div>
@stop
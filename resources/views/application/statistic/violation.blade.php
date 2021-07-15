@extends('layout.application')
@section('title', 'Statistik Pelanggaran')
@section('menu-parent', 'attitude')
@section('content')
    <?php
        $_UTILITY["month-indo"] = [
            "Januari",
            "Februari",
            "Maret",
            "April",
            "Mei",
            "Juni",
            "Juli",
            "Agustus",
            "September",
            "Oktober",
            "November",
            "Desember"
        ]
    ?>
    <div class="content">
        <div class="container-xl">
            <div class="page-header text-white d-print-none">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="page-pretitle">
                            Evaluasi Perilaku
                        </div>
                        <h2 class="page-title">
                            Statistik Pelanggaran
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row row-deck row-cards">
                <div class="col-md-7 d-block">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Grafik Pelanggaran 6 Bulan Terkini</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart" width="100%" height="50"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 d-block">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Trend Pelanggaran {{ $_UTILITY["month-indo"][date("m") - 1] . " " . date("Y") }}</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter">
                                <thead>
                                    <tr>
                                        <th>
                                            Tata Tertib Yang Dilanggar
                                        </th>
                                        <th>
                                            Jumlah
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trend as $trendSingle)
                                        <tr>
                                            <td>
                                                {{ $trendSingle->code }}. {{ $trendSingle->description }}
                                            </td>
                                            <td>
                                                {{ $trendSingle->total + 0 }} Kasus
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if (count($trend) == false)
                                        <tr>
                                            <td colspan="2">
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
    
<script>
    $(document).ready(function () {
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    @foreach(array_reverse($graph) as $graphSingle)
                        "{{ $graphSingle->monthlabel }} {{ $graphSingle->yearlabel }}",
                    @endforeach
                ],
                datasets: [{
                    label: ' Jumlah Pelanggaran',
                    data: [
                        @foreach(array_reverse($graph) as $graphSingle)
                        {{ $graphSingle->total }},
                        @endforeach
                    ],
                    backgroundColor: [
                        @foreach(array_reverse($graph) as $graphSingle)
                        'red',
                        @endforeach
                    ],
                    borderColor: [
                        @foreach(array_reverse($graph) as $graphSingle)
                        'red',
                        @endforeach
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@stop

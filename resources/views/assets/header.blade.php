
<link href="{{ asset('distRes/libs/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet" />
<link href="{{ asset('distRes/libs/select2/dist/css/select2.css') }}" rel="stylesheet" />
<link href="{{ asset('distRes/css/tabler.min.css') }}" rel="stylesheet" />
<link href="{{ asset('distRes/css/tabler-flags.min.css') }}" rel="stylesheet" />
<link href="{{ asset('distRes/css/tabler-payments.min.css') }}" rel="stylesheet" />
<link href="{{ asset('distRes/css/tabler-vendors.min.css') }}" rel="stylesheet" />
<link href="{{ asset('distRes/css/demo.min.css') }}" rel="stylesheet" />
<link href="{{ asset('distRes/css/custom.css') }}" rel="stylesheet" />
<link href="{{ asset('distRes/css/toastr.min.css') }}" rel="stylesheet" />
<link href="{{ asset('staticRes/favicon.png') }}" rel="icon" />
<script src="{{ asset('distRes/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('distRes/libs/jquery/dist/jquery.min.js') }}"></script>
<style>
    body{
        display: none;
        overflow-x: hidden;
        background-image: url("{{ asset('staticRes/edu.png') }}");
        background-size: 75em;
    }

    .navbar-overlap:after {
        background-image: url("{{ asset('staticRes/edu-2.png') }}");
        background-color: {{ session()->has("admSchool") ? (session()->get("admSchool")->color ? session()->get("admSchool")->color : '#3955a4') : '#3955a4' }};
        background-position: center;
        background-size: cover;
    }

    .table-wrap-cus .btn-table {
        margin-right: 10px;
    }

    @media (min-width: 768px) {
        .navbar-dark {
            background-color: transparent;
        }

        .navbar-overlap:after {
            top: 0;
            height: 12rem;
        }
    }
    
    @media (max-width: 768px) {
        .navbar-dark {
            background-color: {{ session()->has("admSchool") ? (session()->get("admSchool")->color ? session()->get("admSchool")->color : '#3955a4') : '#3955a4' }};
        }

        .navbar .navbar-nav .nav-link {
            justify-content: start;
        }

        .table.card-table {
            white-space: nowrap;
        }

        .navbar-overlap:after {
            background-size: contain;
            background-position: top right;
        }

        .table-wrap-cus * {
            white-space: normal;
        }

        .table-wrap-cus .btn-table {
            margin-right: 0px;
            margin-bottom: 10px;
            margin-top: 0px;
            display: block;
        }
    }

    .card-icon {
        width: 30px;
        height: 30px;
        display: inline-block;
        color: #656d77 !important;
        border: 1px solid #ddd;
        box-sizing: border-box;
    }

    .text-black {
        color: rgb(35, 46, 60);
    }

    .select2 {
    width: 100% !important;
    }
</style>
<script src="{{ asset('distRes/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ asset('distRes/libs/chartjs/dist/chart.js') }}"></script>
<script src="{{ asset('distRes/libs/jqvmap/dist/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('distRes/libs/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('distRes/js/tabler.min.js') }}"></script>
<script src="{{ asset('distRes/js/toastr.min.js') }}"></script>
<script src="{{ asset('distRes/js/script.js') }}"></script>
@if(Session::has('actionError'))
<script>
    toastr["error"]("{{ Session::get('actionError') }}", "Kesalahan")

</script>
@endif
@if(Session::has('actionSuccess'))
<script>
    toastr["success"]("{{ Session::get('actionSuccess') }}", "Pemberitahuan")

</script>
@endif
@if(isset($actionError))
<script>
    toastr["error"]("{{ $actionError }}", "Kesalahan")
</script>
@endif
@if(isset($actionSuccess))
<script>
    toastr["success"]("{{ $actionSuccess }}", "Pemberitahuan")

</script>
@endif

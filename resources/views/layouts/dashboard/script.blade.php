<!-- Tabler Core -->
<script src="{{ asset('dashboard/dist/js/tabler.min.js') }}" defer></script>
<script src="{{ asset('dashboard/dist/js/demo.min.js') }}" defer></script>

<!-- Libs JS -->
<script src="{{ asset('dashboard/dist/libs/apexcharts/dist/apexcharts.min.js') }}" defer></script>
<script src="{{ asset('dashboard/dist/libs/jsvectormap/dist/js/jsvectormap.min.js') }}" defer></script>
<script src="{{ asset('dashboard/dist/libs/jsvectormap/dist/maps/world.js') }}" defer></script>
<script src="{{ asset('dashboard/dist/libs/jsvectormap/dist/maps/world-merc.js') }}" defer></script>

{{-- @mido_shriks use btn animation by sweetalert2 --}}
{{-- Jquery --}}
<script src="{{ asset('dashboard/src/js/sweet-alert/jquery.min.js') }}"></script>
<!-- sweet alerts -->
<script src="{{ asset('dashboard/src/js/sweet-alert/sweet-alert.min.js') }}"></script>
<script src="{{ asset('dashboard/src/js/sweet-alert/sweet-alert.init.js') }}"></script>
{{-- @mido_shriks use btn animation by sweetalert2 --}}

{{-- @mido_shriks script data table --}}

<script type="text/javascript" src="{{ asset('dashboard/datatables/datatables.min.js') }}"></script>
{{-- // cdn --}}
{{-- <script type="text/javascript" src="https://cdn.datatables.net/v/bm/jq-3.6.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/sl-1.4.0/datatables.min.js"></script> --}}




<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
{{-- @mido_shriks script data table --}}

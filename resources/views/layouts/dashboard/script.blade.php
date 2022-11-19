<!-- Tabler Core -->
<script src="{{ asset('dashboard/dist/js/tabler.min.js') }}" defer></script>
<script src="{{ asset('dashboard/dist/js/demo.min.js') }}" defer></script>

<!-- Libs JS -->
<script src="{{ asset('dashboard/dist/libs/apexcharts/dist/apexcharts.min.js') }}" defer></script>
<script src="{{ asset('dashboard/dist/libs/jsvectormap/dist/js/jsvectormap.min.js') }}" defer></script>
<script src="{{ asset('dashboard/dist/libs/jsvectormap/dist/maps/world.js') }}" defer></script>
<script src="{{ asset('dashboard/dist/libs/jsvectormap/dist/maps/world-merc.js') }}" defer></script>

<script src="{{ asset('dashboard/dist/libs/tinymce/tinymce.min.js')}}" defer></script>

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

{{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/ju/jq-3.6.0/dt-1.12.1/af-2.4.0/b-2.2.3/b-html5-2.2.3/cr-1.5.6/date-1.1.2/fc-4.1.0/fh-3.2.4/kt-2.7.0/sp-2.0.2/sl-1.4.0/datatables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script> --}}


<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>

<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
        let options = {
            selector: '#tinymce-mytextarea',
            height: 300,
            menubar: false,
            statusbar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat',
            content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; }'
        }
        if (localStorage.getItem("tablerTheme") === 'dark') {
            options.skin = 'oxide-dark';
            options.content_css = 'dark';
        }
        tinyMCE.init(options);
    })
    // @formatter:on
</script>
{{-- @mido_shriks script data table --}}

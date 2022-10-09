<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{-- @include('layouts.app') --}}

    {{-- @mido_shriks script data table --}}

    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('dashboard/datatables/datatables.min.css') }}" /> --}}

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/sl-1.4.0/datatables.min.css"/>


</head>

<body>





    <div class="container">
        <div class="row">
            <table id="dataTable">
                <thead>
                    <tr>
                        <th>Column 1</th>
                        <th>Column 2</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Row</td>
                        <td>code </td>
                    </tr>
                    <tr>
                        <td>Row</td>
                        <td>code </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{--

    <script type="text/javascript" src="{{ asset('dashboard/datatables/datatables.min.js') }}"></script> --}}
    {{-- @include('layouts.dashboard.script') --}}


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/b-2.2.3/b-html5-2.2.3/sl-1.4.0/datatables.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable();
            });
        </script>
</body>

</html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="{{asset('lib/bootstrap/css/bootstrap.min.css')}}" type="text/css">
        {{-- <link rel="stylesheet" href="{{asset('lib/bootstrap3/bootstrap3.min.css')}}" type="text/css"> --}}
        <link rel="stylesheet" href="{{asset('css/build_pdf/eeac_2022.css')}}" type="text/css">
        <style>
            @page { margin: 40px 40px 40px; }

            /* #map { height: 200px;  width: 200px; position: fixed } */
        </style>
        {{-- <link href='https://api.mapbox.com/mapbox.js/v3.3.1/mapbox.css' rel='stylesheet' /> --}}
    </head>
    <body>
        <main>
            @include('build_pdf.templates.eeac_2022.pages.page_1')
        </main>
    </body>

    <script src="{{ asset('lib/jq.min.js')}}"></script>
   {{--  <script src='https://api.mapbox.com/mapbox.js/v3.3.1/mapbox.js'></script> --}}

    {{-- <script>
        $(document).ready(function () {
            var map;
            L.mapbox.accessToken = 'pk.eyJ1IjoiY2lzcG1hcHMiLCJhIjoiY2p2Zjh4ZTh5MnJ6dzN6bzVxM2sxcWpwcSJ9.vncPMwbySTcaY6ay2nn_gQ';
            var map = L.mapbox.map('map')
                .setView([40, -74.50], 9)
                .addLayer(L.mapbox.styleLayer('mapbox://styles/mapbox/streets-v11'));
        });
    </script> --}}
</html>